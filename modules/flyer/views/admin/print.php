<?php

use yii\bootstrap\Html;
?>

<!--<div class="slider" style="background: url('') top center no-repeat; height: 250px; width: 100%">
    <div class="container-fluid">-->
<?php echo Html::img($flyer->image, ['class' => 'img img-responsive']) ?>
<!--</div>-->
<!--</div>-->

<div class="advantages">
    <div class="container-fluid">
        <div class="row">
<!--            <div class="col-xs-12">

                <p class="h3 text-center uppercase bold">
                    <strong>специальные цены предоставляются в случаях:</strong>
                </p>
                <br/>
            </div>-->

            <div class="col-xs-3 col-xs-offset-1 text-center ">
                <?= Html::img('/image/advantages/world.png', ['class' => 'img  center-block', 'height' => '70px']) ?>
                <br/>
                <p>
                    <br/>
                    <strong class="uppercase">
                        Контроль качества <br/> в Китае
                    </strong>
                </p>
            </div>
            <div class="col-xs-3 text-center">
                <?= Html::img('/image/advantages/ingeener.png', ['class' => 'img center-block', 'height' => '70px']) ?>
                <br/>
                <p>
                    <br/>
                    <strong class="uppercase">
                        Весь спектр <br/> монтажных услуг
                    </strong>
                </p>
            </div>
            <div class="col-xs-3 text-center">
                <?= Html::img('/image/advantages/place.png', ['class' => 'img center-block', 'height' => '70px']) ?>
                <br/>
                <p>
                    <br/>
                    <strong class="uppercase">
                        Офис и склад <br/> в одном месте
                    </strong>
                </p>
            </div>
        </div>
    </div>
</div>


<div class="products">
    <div class="row">

        <?php foreach ($models as $k => $model): ?>
            <div class="product <?= (($k % 2) == 0) ? 'odd' : 'even' ?>">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-2 col-xs-offset-1">
                            <p></p>
                        </div>
                        <div class="col-xs-7">
                            <br/>
                            <a href="https://axioma.pro/">
                                <strong><?= $model->name ?></strong>
                            </a>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-2 col-xs-offset-1">
                            <a href="https://axioma.pro/">
                                <!--<div class="image" style="background: url('<?= $model->name ?>') top center no-repeat"></div>-->
                                <?= Html::img($model->img, ['class' => 'img img-responsive']) ?>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <p>
                                    <?= $model->custom_text ?>
                                </p>
                            </div>

                            <div class="col-xs-3 pull-right">

                                <?php if ($model->price_new): ?>
                                    <strong><?= Yii::$app->formatter->asCurrency($model->price_new) ?></strong>
                                    <p class="old-price">
                                    <strike>
                                        <?= Yii::$app->formatter->asCurrency($model->price) ?>
                                    </strike>
                                    </p>
                                <?php else: ?>
                                    <strong><?= Yii::$app->formatter->asCurrency($model->price) ?></strong>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        <?php endforeach;
        ?>

    </div>
</div>