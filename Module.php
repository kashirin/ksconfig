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
    		$this->urlPrefix.'/update/<name:[\w]+>'                    => $this->urlPrefix.'/default/update',
    	];
    }

    private function _applyConfig(){
        $this->setComponents(require(__DIR__ . '\\config.php'));
    }

    public function init()
    {
        parent::init();
        // initialize the module with the configuration loaded from config.php

        $this->_applyConfig();

        
    }

    public function getVariable($var_name){
        return $this->variables->getVariable($var_name);
    }

   
}
