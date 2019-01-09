<?php

/* @var $this yii\web\View */
use yii\bootstrap\Html;

/* @var $posters common\models\Poster */
//$poster= $dataProvider->getModels();
$this->title = '';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Актуальные объявления</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <?php foreach ($posters as $one):?>
                    <div class="col-lg-4">
                        <?= Html::img('/uploads/images/'.$one->po_image) ?>
                        <h3><?= yii\bootstrap\Html::a($one->po_title,['poster/one','po_id'=>$one->po_id])?></h3>
                        <p>Цена <?=$one->po_price?> Рублей </p>
                        <p>Дата публикации: <?=$one->po_data_create?></p>
                    </div>
                <?php endforeach?>

        </div>
    </div>
</div>
