<?php

namespace kasser\ksconfig;

use Yii;



class Module extends \yii\base\Module
{
	const VERSION = '0.1.0';

	public $urlPrefix = 'ksconfig';

    private $_variables;

    

    //public $controllerNamespace = 'kasser\ksconfig\controllers';

    public function getRules(){
    	return [
    		$this->urlPrefix.'/update/<name:[\w]+>' => $this->urlPrefix.'/default/update',
    	];
    }

    private function _applyConfig(){

        $this->setComponents(require(__DIR__ . '\\config.php'));

    }


    private function _applyTranslations(){

        Yii::setAlias('@ksconfig', dirname(__FILE__));

        Yii::$app->i18n->translations['ksconfig'] =  [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@ksconfig/messages',
        ];
    }

    public function init()
    {
        parent::init();
        // initialize the module with the configuration loaded from config.php

        $this->_applyConfig();

        $this->_applyTranslations();

        
    }

    public function getVariable($var_name){

        $res = false;

        $data = $this->variables->getVariable($var_name);

        if(isset($data['value'])){
            $res = $data['value'];
        }

        return $res;
    }

   
}
