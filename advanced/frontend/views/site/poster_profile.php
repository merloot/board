<?php
/**
 * Created by PhpStorm.
 * User: user14
 * Date: 01.03.19
 * Time: 14:46
 */
use yii\bootstrap\Html;
use common\models\PosterProfileSearch;
use yii\widgets\LinkPager;
?>

<div class="jumbotron">
        <h1>Мои объявления</h1>
    </div>
<?php echo $this->render('/poster/_search_profile', ['model' => $searchModel]) ?>


<div class="body-content container">
    <div class="row">
        <?php foreach ($posters as $one):?>
            <div class="post col-lg-4 mb-5">
                <div class="div-img"><?= Html::img('../uploads/images/'.$one->po_image) ?></div>
                <div class="post-about">
                    <p><?=$one->po_status?></p>
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
</style>