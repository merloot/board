<?php

namespace common\models;

use Yii;
use yii\db\Query;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Poster".
 *
 * @property int $po_id
 * @property int $po_id_user
 * @property string $po_title
 * @property string $po_description
 * @property string $po_image
 * @property int $po_id_categories
 * @property int $po_price
 * @property int $po_status
 * @property string $po_data_create
 * @property int $po_id_city
 *
 * @property Categories $poIdCategories
 * @property City $poIdCity
 * @property Profile $poIdUser
 */
class Poster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Poster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['po_title', 'po_description', 'po_id_categories', 'po_price', ], 'required'],
            [['po_id_user', 'po_id_categories', 'po_price','po_id_city'], 'default', 'value' => null],
            [['po_id_user', 'po_id_categories', 'po_price', 'po_status', 'po_id_city'], 'integer'],
            [['po_data_create'], 'safe'],
            [['po_status'],'default','value'=>1],
            [['po_title', 'po_image'], 'string', 'max' => 255],
            [['po_description'], 'string', 'max' => 32],
            [['po_id_categories'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['po_id_categories' => 'cat_id']],
            [['po_id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['po_id_city' => 'c_id']],
            [['po_id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['po_id_user' => 'p_user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'po_id' => 'Po ID',
            'po_id_user' => 'Id User',
            'po_title' => 'Заголовок',
            'po_description' => 'Описание',
            'po_image' => 'Изображение',
            'po_id_categories' => 'Категория',
            'po_price' => 'Цена',
            'po_status' => 'Статус',
            'po_data_create' => 'Дата создания',
            'po_id_city' => 'Город',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoIdCategories()
    {
        return $this->hasOne(Categories::className(), ['cat_id' => 'po_id_categories']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoIdCity()
    {
        return $this->hasOne(City::className(), ['c_id' => 'po_id_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function count()
    {
//        return Query::find()->where(['po_id_user'=>'p_user_id'])->count();
        return Poster::find()->where(['po_id_user'=>'p_user_id'])->count();
    }

    public function getPoIdUser()
    {
        return $this->hasOne(Profile::className(), ['p_user_id' => 'po_id_user']);
    }

    public function afterDelete()
    {
        @unlink(Yii::getAlias('@images') . '/images/' . $this->po_image);
        parent::afterDelete();
    }
    public function beforeSave($insert)
    {
        if(!parent::beforeSave($insert)) {
            return false;
        }

        if (UploadedFile::getInstance($this, 'po_image')) {
            if (!$insert) {
                @unlink(Yii::getAlias('@images') . '' . $this->getOldAttribute('po_image'));
            }

            $image = UploadedFile::getInstance($this, 'po_image');
            $imageName = md5(date("Y-m-d H:i:s"));
            $pathImage = Yii::getAlias('@images') . ''
                . '/'
                . $imageName
                . '.'
                . $image->getExtension();

            $this->po_image =  $imageName .  '.' . $image->getExtension();
            $image->saveAs($pathImage);
//            $image = Yii::$app->image->load->$imageName($this->po_image);
//            $image->resize('50','50', Yii\image\drivers\Image::INVERSE);
//            $image->crope('50','50');
//            $image->save($pathImage.$this->po_image);
            $this->po_id_user =Yii::$app->user->getId();
        }
    else
        {
            $this->po_image = $this->getOldAttribute('po_image');
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}

