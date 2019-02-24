<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "city".
 *
 * @property int $c_id
 * @property string $c_city
 */
class City extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_city'], 'required'],
            [['c_city'], 'string', 'max' => 255],
            [['c_city'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_city' => 'C City',
        ];
    }
    public function getPoster()
    {
        return $this->hasOne(Poster::className(),['po_id_city'=>'c_id']);
    }
}
