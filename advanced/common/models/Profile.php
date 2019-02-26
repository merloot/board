<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Profile".
 *
 * @property int $p_id
 * @property int $p_user_id
 * @property string $p_name
 * @property string $p_description
 * @property string $p_image
 * @property string
 * @property int $p_phone
 * @property int $p_id_city
 *
 * @property Poster[] $posters
 * @property City $pIdCity
 * @property User $pUser
 * @property User $pUser0
 */
class Profile extends \yii\db\ActiveRecord
{
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
            [['p_user_id', 'p_phone', 'p_id_city'], 'default', 'value' => null],
            [['p_user_id', 'p_id_city'], 'integer'],
            [['p_phone'],'string','max'=>15],
            [['p_name', 'p_description'], 'string', 'max' => 100],
            [['p_image'], 'string', 'max' => 255],
            [['p_user_id'], 'unique'],
            [['p_id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['p_id_city' => 'c_id']],
            [['p_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['p_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'ID',
            'p_user_id' => 'User ID',
            'p_name' => 'Имя Фамилия',
            'p_description' => 'О себе',
            'p_image' => 'Изображение',
            'p_phone' => 'Телефон',
            'p_id_city' => 'Город',
        ];
    }

    public function afterDelete()
    {
        @unlink(Yii::getAlias('@avatar') . '/images/avatar' . $this->p_image);
        parent::afterDelete();
    }
    public function beforeSave($insert)
    {
        if(!parent::beforeSave($insert)) {
            return false;
        }

        if (UploadedFile::getInstance($this, 'p_image')) {
            if (!$insert) {
                @unlink(Yii::getAlias('@avatar') . '' . $this->getOldAttribute('p_image'));
            }

            $image = UploadedFile::getInstance($this, 'p_image');
            $imageName = md5(date("Y-m-d H:i:s"));
            $pathImage = Yii::getAlias('@avatar') . ''
                . '/'
                . $imageName
                . '.'
                . $image->getExtension();

            $this->p_image =  $imageName .  '.' . $image->getExtension();
            $image->saveAs($pathImage);
//            $image = Yii::$app->image->load->$imageName($this->po_image);
//            $image->resize('50','50', Yii\image\drivers\Image::INVERSE);
//            $image->crope('50','50');
//            $image->save($pathImage.$this->po_image);
            $this->p_user_id =Yii::$app->user->getId();
        }
        else
        {
            $this->p_image = $this->getOldAttribute('p_image');
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /**
     * @return \yii\db\ActiveQuery
     *
     */

//    public function getCount()
//    {
//         Poster::find()->where(['po_id_user' => 'p_user_id'])->all();
//    }
    public function getPosters()
    {
        return $this->hasMany(Poster::className(), ['po_id_user' => 'p_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPIdCity()
    {
        return $this->hasOne(City::className(), ['c_id' => 'p_id_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPUser()
    {
        return $this->hasOne(User::className(), ['id' => 'p_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

}
