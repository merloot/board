<?php
use yii\bootstrap\Html;
?>

<h1><?=$poster->po_title?></h1>
<?=Html::img('../uploads/images/'.$poster->po_image)?>
<p>Цена:<?=$poster->po_price?></p>
<?=$poster->po_data_create?>
<p>Город:<?=$poster->poIdCity->c_name?></p>
<p>Категория товара:<?=$poster->poIdCategories->cat_name?></p>
<?=$poster->po_description?>
<?=$poster->poIdUser->p_name?>
<?=$poster->poIdUser->p_phone?>
<?=$poster->poIdUser->p_image?>
<p>На сайте с:<?=$poster->poIdUser->pUser->data_create?></p>


