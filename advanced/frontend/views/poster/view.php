<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Poster */

$this->title = $model->po_id;
$this->params['breadcrumbs'][] = ['label' => 'Объявление', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poster-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->po_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->po_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'po_id',
            'po_id_user',
            'po_title',
            'po_description',
            'po_image',
            'po_id_city',
            'po_id_categories',
            'po_price',
            'po_status',
            'po_data_create',
        ],
    ]) ?>

</div>
