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
				if(isset($item['default'])){
					$this->_keyValuesPairs[$key] = [
						'type' => $item['type'],
						'value' => $item['default'],
						'label' => $item['label'],
						'values'=> (isset($item['values'])) ? $item['values'] : false
					];
				}else{
					$this->_keyValuesPairs[$key] = [
						'type' => $item['type'],
						'value' => false,
						'label' => $item['label'],
						'values'=> (isset($item['values'])) ? $item['values'] : false
					];
				}
			}

			$rows = KsconfigRecord::find()->all();

			if(count($rows)>0){
				foreach($rows as $model){
					if(isset($this->_keyValuesPairs[$model->name])){
						$this->_keyValuesPairs[$model->name]['value'] = $model->data;
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

		$res = false;

		foreach($this->_keyValuesPairs as $nm => $item){
			if($nm == $name){
				$item['name'] = $name;
				$res = $item;
				break;
			}
		}

		return $res;
	}

	public function getValue($name){
		if(!$this->_keyValuesPairs){
			$this->getVariables();
		}


		if(isset($this->_keyValuesPairs[$name])){
			return $this->_keyValuesPairs[$name]['value'];
		}else{
			return false;
		}

	}
}
