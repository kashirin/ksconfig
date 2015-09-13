<?php

namespace kasser\ksconfig;

use Yii;
use yii\authclient\Collection;
use yii\base\BootstrapInterface;
use yii\base\InvalidConfigException;
use yii\i18n\PhpMessageSource;
use yii\web\GroupUrlRule;
use yii\base\Application;


class Bootstrap implements BootstrapInterface
{
    /** @inheritdoc */
    public function bootstrap($app)
    {
        

        if ($app->hasModule('ksconfig') && ($module = $app->getModule('ksconfig')) instanceof Module) {

            $app->getUrlManager()->addRules($module->getRules(),false); 

        }


        
        
        

        

    }
}