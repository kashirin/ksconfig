<?php

namespace kasser\ksconfig\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
    	var_dump('create');
        //return $this->render('create');
    }
}
