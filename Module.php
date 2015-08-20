<?php

namespace kasser\ksconfig;

use Yii;

class Module extends \yii\base\Module
{
	const VERSION = '0.1.0';

	public $urlPrefix = 'ksconfig';

    //public $controllerNamespace = 'kasser\ksconfig\controllers';

    public function getRules(){
    	return [
    		$this->urlPrefix.'/create'                      => $this->urlPrefix.'/default/create',
    		$this->urlPrefix.'/<id:\d+>'                    => $this->urlPrefix.'/default/update',
        	
    	];
    }


    public function init()
    {
        parent::init();

    }

   
}
