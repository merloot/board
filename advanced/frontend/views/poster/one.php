<?php
use yii\bootstrap\Html;

?>
<div class="row">
    <div class="col-lg-6">
        <h1><?=$poster->po_title?></h1>
        <?=Html::img('../../uploads/images/'.$poster->po_image)?>
        <p>Цена:<?=$poster->po_price?>руб</p>
        <p>Объявление<?=$poster->po_data_create?></p>
        <p>Город:<?=$poster->poIdCity->c_name?></p>
        <p>Категория товара:<?=$poster->poIdCategories->cat_name?></p>
        <p><?=$poster->po_description?></p>
    </div>
    <div class="about col-lg-3">
        <p>Имя:<?=$poster->poIdUser->p_name?></p>
        <p>На сайте с:<?=$poster->poIdUser->pUser->data_create?></p>
        <p>Объявлений: <?=$poster->poIdUser->count?></p>
        <p>Телефон:<?=$poster->poIdUser->p_phone?></p>
        <?=Html::img('../../uploads/avatar/'.$poster->poIdUser->p_image)?>
    </div>
</div>

<style>
    .row{
        display: flex;
        justify-content: space-between;
    }
    .about{
        margin-top: 64px;
    }
</style>

