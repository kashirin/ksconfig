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