<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
use common\models\City;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'p_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_phone')->widget(MaskedInput::className(), [
        'mask' => '8-999-999-99-99',
//        'options'=>['placeholder'=>'Без 8'],
    ]) ?>
    <?= $form->field($model, 'p_description')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'p_id_city')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(City::find()->all(),'c_id','c_name'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите город'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?=  $form->field($model, 'p_image')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Загрузить фотографию'
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
