<?php
/**
 * Created by PhpStorm.
 * User: merloot
 * Date: 24.02.2019
 * Time: 15:25
 */
/* @var $this yii\web\View */
/* @var $posters common\models\Poster*/
use yii\bootstrap\Html;
use yii\widgets\LinkPager;
?>
<div class="site-index">
    <?php echo $this->render('/poster/_search', ['model' => $searchModel]) ?>

    <div class="jumbotron">
        <h1>Актуальные объявления</h1>
    </div>

    <div class="body-content container">
        <div class="row">

            <?php foreach ($posters as $one):?>
                <div class="post col-lg-4 mb-5">
                    <div class="div-img"><?= Html::img('../uploads/images/'.$one->po_image) ?></div>
                    <div class="div-img"><?= Html::img('uploads/images/'.$one->po_image) ?></div>
                    <div class="post-about">
                        <h3><?= yii\bootstrap\Html::a($one->po_title,['poster/one','po_id'=>$one->po_id])?></h3>
                        <p>Цена: <?=$one->po_price?> Руб </p>
                        <p>Дата публикации: <?=$one->po_data_create?></p>
                    </div>
                </div>
            <?php endforeach?>

        </div>
        <div>
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
    </div>

    <style>
        .show{
            display: block;
        }
        .hide{
            display: none;
        }
        .post{
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .post-about{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .div-img img{
            max-height: 150px;
            max-width: 200px;
        }
        h1{
            margin-top: -50px;
            margin-bottom: -40px;
        }
    </style>