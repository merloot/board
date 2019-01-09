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

        $this->createTable('{{%poster}}', [
            'id' => $this->primaryKey(),
            'id_auth'=>$this->integer()->notNull()->unique(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(32)->notNull(),
            'image'=>$this->string(),
            'id_city' => $this->string()->notNull(),
            'id_categories' => $this->integer()->unique()->notNull(),
            'price' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'data_create'=>$this->dateTime()->notNull(),

        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%poster}}');
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
