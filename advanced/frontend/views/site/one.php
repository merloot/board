<?php
/**
 * Created by PhpStorm.
 * User: merloot
 * Date: 24.02.2019
 * Time: 15:44
 */
use yii\bootstrap\Html;
?>
<?=$poster->po_title?>
<?=$poster->po_image?>
<?= Html::img('uploads/images/'.$one->po_image) ?>
<h3><?= yii\bootstrap\Html::a($one->po_title,['poster/one','po_id'=>$one->po_id])?></h3>
<p>Цена <?=$one->po_price?> Рублей </p>
<p>Дата публикации: <?=$one->po_data_create?></p>