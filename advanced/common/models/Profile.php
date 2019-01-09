<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Profile".
 *
 * @property int $p_id
 * @property int $p_id_user
 * @property string $p_name
 * @property string $p_phone
 * @property string $p_description
 * @property int $p_id_city
 * @property string $p_image
 */
class Profile extends ActiveRecord
{
    public $baseName;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_name','p_id_city','p_phone'], 'required'],
            [['p_id', 'p_id_user', 'p_id_city'], 'integer'],
            [['p_name', 'p_phone', 'p_image'], 'string', 'max' => 50],
            [['p_description'], 'string', 'max' => 100],
            [['p_id'], 'unique'],
            [['p_image'], 'safe'],
            [['p_image'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'P ID',
            'p_id_user' => 'P Id User',
            'p_name' => 'Имя',
            'p_phone' => 'Телефон',
            'p_description' => 'О себе',
            'p_id_city' => 'Город',
            'p_image' => 'Фотография',
        ];
    }
    public function getAuthor()
    {
        return $this->hasOne(User::className(),['id'=>'p_id_user']);
    }
    public function getCity()
    {
        return $this->hasOne(City::className(),['c_id'=>'p_id_city']);
    }

    public function behaviors()
    {
        return
            [
                [
                    'class' => BlameableBehavior::className(),
                    'createdByAttribute' => 'p_id_user',
                    'updatedByAttribute' => 'p_id_user',
                ],

            ];
    }
//    public function beforeSave($insert)
//    {
//        if(!parent::beforeSave($insert)) {
//            return false;
//        }
//        if (UploadedFile::getInstance($this, 'p_image')) {
//            if (!$insert) {
//                @unlink(Yii::getAlias('@images') . '' . $this->getOldAttribute('p_image'));
//            }
//            $image = UploadedFile::getInstance($this, 'p_image');
//            $imageName = md5(date("Y-m-d H:i:s"));
//            $pathImage = Yii::getAlias('@images') . ''
//                . '/'
//                . $imageName
//                . '.'
//                . $image->getExtension();
//            $this->p_image =  $imageName .  '.' . $image->getExtension();
//            $image->saveAs($pathImage);
//        } else {
//            $this->p_image = $this->getOldAttribute('p_image');
//        }
//        return true;
//    }

}

