<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $categories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categories'], 'required'],
            [['categories'], 'string', 'max' => 255],
            [['categories'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categories' => 'Categories',
        ];
    }
    public function getPoster()
    {
        return $this->hasOne(Poster::className(),['po_id_categories'=>'id']);
    }
}
