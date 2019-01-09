<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Poster */

$this->title = 'Update Poster: ' . $model->po_id;
$this->params['breadcrumbs'][] = ['label' => 'Posters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->po_id, 'url' => ['view', 'id' => $model->po_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="poster-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
