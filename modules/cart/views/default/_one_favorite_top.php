<?php
use yii\bootstrap\Html;
?>
<?php if(isset($model)): ?>
<div class="row top-cart-item">

    <div class="col-xs-4 image-wrap">

        <?php echo Html::img($model->image, ['class' => 'img img-responsive img-thumbnail']) ?>


    </div>

    <div class="col-xs-8 header-wrap">
        <?php echo $model->header ?>
        <hr/>
    </div>

    <!--    <div class="col-xs-1">
    <?php Html::a('<i class="far fa-window-close"></i>', ['#'], ['class' => '']) ?>
        </div>-->

</div>
<?php endif; ?>