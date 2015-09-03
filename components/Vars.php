<?php
namespace kasser\ksconfig\components;

use Yii;
use yii\base\Object;
use kasser\ksconfig\models\KsconfigRecord;

class Vars extends Object
{
	
	public $config;

	private $_keyValuesPairs = false;
	

	public function getVariables(){

		if(!$this->_keyValuesPairs){

			$this->_keyValuesPairs = [];

			foreach($this->config as $key => $item){
				$this->_keyValuesPairs[$key] = (isset($item['default'])) ? $item['default'] : false;
			}

			$rows = KsconfigRecord::find()->all();

			if(count($rows)>0){
				foreach($rows as $model){
					if(isset($this->_keyValuesPairs[$model->name])){
						$this->_keyValuesPairs[$model->name] = $model->data;
					}
				}
			}



		}

		return $this->_keyValuesPairs;

	}

	public function getVariable($name){
		if(!$this->_keyValuesPairs){
			$this->getVariables();
		}


		if(isset($this->_keyValuesPairs[$name])){
			return $this->_keyValuesPairs[$name];
		}else{
			return false;
		}

	}
}
