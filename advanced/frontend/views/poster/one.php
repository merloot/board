<?php
use yii\bootstrap\Html;
?>

<h1><?=$poster->po_title?></h1>
<?=Html::img('../../uploads/images/'.$poster->po_image)?>
<p>Цена:<?=$poster->po_price?></p>
<p>Объявление<?=$poster->po_data_create?></p>
<p>Город:<?=$poster->poIdCity->c_name?></p>
<p>Категория товара:<?=$poster->poIdCategories->cat_name?></p>
<p><?=$poster->po_description?></p>
<p>Имя:<?=$poster->poIdUser->p_name?></p>
<p>На сайте с:<?=$poster->poIdUser->pUser->data_create?></p>
<p>Объявлений: <?=$poster->poIdUser->count?></p>
<p>Телефон:<?=$poster->poIdUser->p_phone?></p>
<?=Html::img('../../uploads/avatar/'.$poster->poIdUser->p_image)?>


