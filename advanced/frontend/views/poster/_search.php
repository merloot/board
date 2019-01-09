<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PosterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poster-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'po_id') ?>

    <?= $form->field($model, 'po_id_auth') ?>

    <?= $form->field($model, 'po_title') ?>

    <?= $form->field($model, 'po_description') ?>

    <?= $form->field($model, 'po_image') ?>

    <?php // echo $form->field($model, 'po_id_city') ?>

    <?php // echo $form->field($model, 'po_id_categories') ?>

    <?php // echo $form->field($model, 'po_price') ?>

    <?php // echo $form->field($model, 'po_status') ?>

    <?php // echo $form->field($model, 'po_data_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
