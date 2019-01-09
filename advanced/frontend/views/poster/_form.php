<?php

use common\models\Categories;
use common\models\City;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Poster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poster-form">

    <?php $form = ActiveForm::begin([
            'options'=>[
                    'enctype'=>'multipart/form-data'
            ]
    ]); ?>

    <?= $form->field($model, 'po_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'po_description')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'po_image')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Загрузить фотографию'
        ],
    ]); ?>
<!--    --><?//= $form->field($model,'po_image')->fileInput();?>
<!--    <div class="form-group">-->
<!--        <div class="col-md-offset-2 col-md-10">-->
<!--            --><?//
//            $images = $model->getImages();
//            ?>
<!--            <div class="row">-->
<!--            --><?php //foreach ($images as   $image):   ?>
<!--                <div class="col-md-3">-->
<!--                    <img src="--><?//= $image->getUrl()?><!--" alt=""/>-->
<!--                </div>-->
<!---->
<!--            --><?php //endforeach ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <?=$form->field($model, 'po_id_city')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(City::find()->all(),'c_id','c_city'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите город'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?=$form->field($model, 'po_id_categories')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Categories::find()->all(),'id','categories'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите категорию'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <?= $form->field($model, 'po_price')->textInput() ?>

    <!--    --><?//= $form->field($model, 'po_status')->radioList([
    //            1=> 'Активное', 0=>'Закрытое'
    //    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
