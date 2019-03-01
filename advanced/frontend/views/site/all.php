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
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\Categories;
use common\models\City;
use common\models\PosterSearch;

?>
<div class="site-index">
    <?php echo $this->render('/poster/_search', ['model' => $searchModel]) ?>



    <div class="jumbotron">
        <h1>Актуальные объявления</h1>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <?php foreach ($posters as $one):?>
                    <div class="col-lg-4">
                        <?= Html::img('../uploads/images/'.$one->po_image) ?>
                        <?= Html::img('uploads/images/'.$one->po_image) ?>
                        <h3><?= yii\bootstrap\Html::a($one->po_title,['poster/one','po_id'=>$one->po_id])?></h3>
                        <p>Цена: <?=$one->po_price?> Руб </p>
                        <p>Дата публикации: <?=$one->po_data_create?></p>
                    </div>
                <?php endforeach?>

            </div>
        </div>
    </div>