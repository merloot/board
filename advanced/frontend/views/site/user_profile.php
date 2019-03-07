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
    <h1>Личный кабинет</h1>
</div>

<div class="body-content">
    <div class="row">
        <div class="col-lg-4">
                <div class="col-lg-4">
                    <?=$profile->p_name?>
                    <?=$profile->pIdCity->c_name?>
                    <?=$profile->p_phone?>
                    <?=$profile->p_image?>
                    <?=$profile->p_description?>
                    <?=Html::img('../../uploads/avatar/'.$profile->p_image)?>
                    <?=Html::beginForm(['/profile/update'.'?'.'id'.'='.$profile->p_id],'post')
                    . Html::submitButton(
                        'Изменение личного кабинета',
                        ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm();?>
                </div>
        </div>
    </div>
</div>