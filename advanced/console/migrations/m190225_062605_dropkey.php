<?php

use yii\db\Migration;

/**
 * Class m190225_062605_dropkey
 */
class m190225_062605_dropkey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropForeignKey('UserProfile','user');
        $this->addForeignKey('ProfileUser','Profile','p_user_id','user','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ProfileUser','Profile');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_062605_dropkey cannot be reverted.\n";

        return false;
    }
    */
}
