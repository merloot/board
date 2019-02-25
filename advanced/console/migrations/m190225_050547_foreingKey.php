<?php

use yii\db\Migration;

/**
 * Class m190225_050547_foreingKey
 */
class m190225_050547_foreingKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('UserProfile','user','id','Profile','p_user_id','CASCADE');
        $this->addForeignKey('ProfileCity','Profile','p_id_city','City','c_id','CASCADE');
        $this->addForeignKey('PosterUser','Poster','po_id_user','Profile','p_user_id','CASCADE');
        $this->addForeignKey('PosterCity','Poster','po_id_city','City','c_id','CASCADE');
        $this->addForeignKey('PosterCategories','Poster','po_id_categories','Categories','cat_id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('UserProfile','Profile');
        $this->dropForeignKey('ProfileCity','Profile');

        $this->dropForeignKey('PosterUser','Poster');
        $this->dropForeignKey('PosterCity','Poster');
        $this->dropForeignKey('PosterCategories','Poster');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_050547_foreingKey cannot be reverted.\n";

        return false;
    }
    */
}
