<?php
use yii\bootstrap\Html;
?>

<?=$poster->po_title?>
<?=$poster->po_image . Html::img('uploads/images/') ?>
<p>Цена:<?=$poster->po_price?></p>
<?=$poster->po_data_create?>
<p>Город:<?=$poster->city->c_city?></p>
<p>Категория товара:<?=$poster->categories->categories?></p>
<?=$poster->po_description?>
<?//=$poster->profile->email?>

