<?php

namespace kasser\ksconfig\controllers;

use Yii;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index',[
        	'var1'=>$this->module->variables->getVariables(),
        	'var2'=>$this->module->getVariable('var1')
        	]);
    }

    public function actionUpdate()
    {
   
        return $this->render('uptade');
    }
}
