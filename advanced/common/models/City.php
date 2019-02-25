<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "City".
 *
 * @property int $c_id
 * @property string $c_name
 *
 * @property Poster[] $posters
 * @property Profile[] $profiles
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'City';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_name'], 'required'],
            [['c_name'], 'string', 'max' => 255],
            [['c_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_name' => 'C Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosters()
    {
        return $this->hasMany(Poster::className(), ['po_id_city' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['p_id_city' => 'c_id']);
    }
}
