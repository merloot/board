<?php

use yii\db\Migration;

/**
 * Class m181120_103159_poster
 */
class m181120_103159_poster extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%Poster}}', [
            'po_id' => $this->primaryKey(),
            'po_id_user'=>$this->integer()->notNull(),
            'po_title' => $this->string()->notNull(),
            'po_description' => $this->string(32)->notNull(),
            'po_image'=>$this->string(),
            'po_id_city' => $this->integer()->notNull(),
            'po_id_categories' => $this->integer()->notNull(),
            'po_price' => $this->integer()->notNull(),
            'po_status' => $this->smallInteger()->notNull()->defaultValue(1),
            'po_data_create'=>$this->dateTime()->notNull(),

        ], $tableOptions);



    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%Poster}}');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181120_103159_poster cannot be reverted.\n";

        return false;
    }
    */
}
