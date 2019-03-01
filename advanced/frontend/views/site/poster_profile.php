<?php
/**
 * Created by PhpStorm.
 * User: user14
 * Date: 01.03.19
 * Time: 14:46
 */
use yii\bootstrap\Html;

?>

<div class="jumbotron">
        <h1>Мои объявления</h1>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <?php foreach ($posters as $one):?>
                    <div class="col-lg-4">
                        <button>Закрыть</button>
                        <?= Html::img('../uploads/images/'.$one->po_image) ?>
                        <h3><?= yii\bootstrap\Html::a($one->po_title,['poster/one','po_id'=>$one->po_id])?></h3>
                        <p>Цена: <?=$one->po_price?> Руб </p>
                        <p>Дата публикации: <?=$one->po_data_create?></p>
                    </div>
                <?php endforeach?>

            </div>
        </div>
    </div>