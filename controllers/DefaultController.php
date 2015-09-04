<?php

namespace kasser\ksconfig\controllers;

use Yii;
use kasser\ksconfig\models\KsconfigRecord;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {

        return $this->render('index',[
        	'variables'=>$this->module->variables->getVariables()
        ]);
    }

    public function actionUpdate($name)
    {
		$post = Yii::$app->request->post();

		$item = $this->module->variables->getVariable($name);

		if(!$item){
			$this->redirect(['index']);
		}

		if(isset($post['_csrf'])){
			$model = KsconfigRecord::find()->where(['name'=>$post['name']])->one();
			
			if($model){
				$model->data = $post['val'];
				$model->save();
				return $this->redirect(['update', 'name' => $model->name]);
			}else{
				if($this->module->variables->getVariable($post['name'])){
					$model = new KsconfigRecord;
					$model->name = $post['name'];
					$model->data = $post['val'];
					$model->save();
					return $this->redirect(['update', 'name' => $model->name]);
				}else{
					return $this->redirect(['index']);
				}
			}
		}

        return $this->render('update',['item'=>$item]);
    }
}
