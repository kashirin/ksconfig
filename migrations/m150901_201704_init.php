<?php

use yii\db\Schema;
use yii\db\Migration;

class m150901_201704_init extends Migration
{
    public function up()
    {
        $this->createTable('ksconfig', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL', // config keys
            'data' => Schema::TYPE_STRING . ' NOT NULL', // serialized values
        ]);
    }

    public function down()
    {
        echo "m150901_201704_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
