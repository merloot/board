<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\City;
use common\models\Categories;

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
    <div class="row form-group">
        <div>
            <?=$form->field($model, 'po_id_city')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(City::find()->all(),'c_id','c_name'),
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите город'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>


            <?=$form->field($model, 'po_id_categories')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Categories::find()->all(),'cat_id','cat_name'),
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите категорию'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>


<style>
    .row div{
        margin-bottom: 0;
        display: flex;
        justify-content: center;
    }
    .row div div{
        display: flex;
        align-items: center;
    }
    .row div div label{
        margin-left: 10px;
        margin-right: 10px;
    }
    .btn-primary{
        margin-left: 10px;
        height: 35px;
    }
</style>