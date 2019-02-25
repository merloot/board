<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
//    public function up()
//    {
//        $tableOptions = null;
//        if ($this->db->driverName === 'mysql') {
//            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
//            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
//        }
//
//        $this->createTable('{{%user}}', [
//            'id' => $this->primaryKey(),
//            'auth_key' => $this->string(32)->notNull(),
//            'password_hash' => $this->string()->notNull(),
//            'password_reset_token' => $this->string()->unique(),
//            'email' => $this->string()->notNull()->unique(),
//
//            'status' => $this->smallInteger()->notNull()->defaultValue(10),
//            'created_at' => $this->integer()->notNull(),
//            'updated_at' => $this->integer()->notNull(),
//            'data_create'=>$this->dateTime()->notNull()
//        ], $tableOptions);
//
//        $this->createTable('{{%Profile}}',[
//            'p_id'=>$this->primaryKey(),
//            'p_user_id'=>$this->integer(11)->unique(),
//            'p_name'=>$this->string(100),
//            'p_description'=>$this->string(100),
//            'p_image'=>$this->string(255),
//            'p_date_create'=>$this->date(),
//            'p_phone'=>$this->integer(),
//            'p_id_city'=>$this->integer(),
//        ],$tableOptions);
//
//
//    }

    public function down()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%Profile}}');

    }
}
