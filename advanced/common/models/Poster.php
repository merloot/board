<?php

namespace common\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;


/**
 * This is the model class for table "poster".
 *
 * @property int $po_id
 * @property int $po_id_auth
 * @property string $po_title
 * @property string $po_description
 * @property string $po_image
 * @property int $po_id_city
 * @property int $po_id_categories
 * @property int $po_price
 * @property int $po_status
 * @property string $data_create
 */
class Poster extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'po_title', 'po_description', 'po_id_city', 'po_id_categories', 'po_price'], 'required'],
            [['po_id_auth', 'po_id_city', 'po_id_categories', 'po_price', 'po_status'], 'integer'],
            [['po_data_create'], 'safe'],
            [['po_title', 'po_description', 'po_image'], 'string', 'max' => 255],
            [['po_image'], 'safe'],
            [['po_image'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'po_id' => 'ID объявления',
            'po_id_auth' => 'ID автора',
            'po_title' => 'Заголовок',
            'po_description' => 'Описание',
            'po_image' => 'Фотография',
            'po_id_city' => 'Город',
            'po_id_categories' => 'Категория',
            'po_price' => 'Цена',
            'po_status' => 'Статус',
            'po_data_create' => 'Дата создания',
        ];
    }
    public function behaviors()
    {

        return
            [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'po_id_auth',
                'updatedByAttribute' => 'po_id_auth',
            ],
            [
                'class'=>TimestampBehavior::className(),
                'createdAtAttribute'=>'po_data_create',
                'updatedAtAttribute' => 'po_data_create',
                'value'=>new Expression('NOW()'),

            ],
//
//                    'image' => [
//                    'class' => 'rico\yii2images\behaviors\ImageBehave',
//                        ]

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(),['id'=>'po_id_auth']);

    }
    public function getCity()
    {
        return $this->hasOne(City::className(),['id'=>'po_id_city']);

    }
    public function getCategories()
    {
        return $this->hasOne(Categories::className(),['id'=>'po_id_categories']);
    }

    public function afterDelete()
    {
        @unlink(Yii::getAlias('@uploads') . '/images/banner/' . $this->po_image);
        parent::afterDelete();
    }


    /**
     * @param bool $insert
     * @return bool
     */
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


        } else {
            $this->po_image = $this->getOldAttribute('po_image');
        }

        return true;

    }

}

