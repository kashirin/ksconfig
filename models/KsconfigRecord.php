<?php

namespace kasser\ksconfig\models;

use Yii;
use yii\db\ActiveRecord;

class KsconfigRecord extends ActiveRecord
{
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ksconfig}}';
    }

	
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
		
			//check unique seourl
			
			if($insert){
				$struct = self::find()->where(['seourl' => $this->seourl])->one();
			}else{
				$struct = self::find()->where(['seourl' => $this->seourl])->andWhere('id != '.$this->id)->one();
			}
			
			
			$base_seourl = $this->seourl;
			if($struct){
				$cnt = 1;
				$new_seourl = $base_seourl . '-(' . $cnt.')';
				while(self::find()->where(['seourl' => $new_seourl])->one()){
					$cnt++;
					$new_seourl = $base_seourl . '-(' . $cnt.')';
				}
				$this->seourl = $new_seourl;
			}
			
			
			if($insert){
				// calculate sort prop

				if((int)$this->parent_id!=0){
					$command = static::getDb()->createCommand("SELECT MAX(sort) as srt from ".$this->tableName()." where parent_id = ".$this->parent_id)->queryOne();
				}else{
					$command = static::getDb()->createCommand("SELECT MAX(sort) as srt from ".$this->tableName()."")->queryOne();
				}

				
				$this->sort = $command['srt'] + 5;
				// calculate level
				$this->level = 1;
				if((int)$this->parent_id!=0){
					//start searching
					$pid = (int)$this->parent_id;
					
					$cnt = 0;
					while($command = static::getDb()->createCommand("SELECT * from ".$this->tableName()." WHERE id=:pid")
					->bindValue(':pid', $pid)->queryOne()){
						$this->level++;
						$cnt++;
						$pid = $command['parent_id'];
						if($cnt>10){
							$this->level = 1;
							break;
						}
					}
				}


				
				
				return true;
			}
			
			return true;
		} else {
			return false;
		}
	}
	
	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);
		if($this->purpose == self::ITEM_TYPE_PAGE){
			
			$this->url = Url::to('/structure/update');
			$this->params = 'id='.$this->id;
			$this->updateAttributes(['url','params']);
		}elseif($this->purpose == self::ITEM_TYPE_ARTICLES){
			$this->url = Url::to('/article/list-for');
			$this->params = 'id='.$this->id;
			$this->updateAttributes(['url','params']);
		}elseif($this->purpose == self::ITEM_TYPE_URL){
			if(strpos($this->url, '{model:')!==false){
				$model_name = str_replace('{model:', '', trim($this->url));
				$model_name = str_replace('}', '', $model_name);
				$this->url = Url::to('/'.$model_name.'/list-for');
				$this->params = 'id='.$this->id;
				$this->updateAttributes(['url','params']);
			}
		}


		if($insert && empty($this->code)){
					$this->code = 'code_'.$this->id;
					$this->updateAttributes(['code']);
		}

	}
	
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['name','data'],'string'],
        ];
    }
	
	public function attributeLabels()
    {
        return [
            'name' => 'Символьный код переменной',
            'data' => 'Сериализованные данные значения',
        ];
    }

    

}