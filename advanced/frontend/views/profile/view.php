<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\City;
/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = $model->p_name;
//$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->p_id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->p_id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'p_name',
            'p_phone',
            'p_description',
            'p_id_city',
            'p_image',
        ],
    ]) ?>

</div>
