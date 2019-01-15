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
            <div class="col-xs-12">

                <p class="h3 text-center uppercase bold">
                    <strong>специальные цены предоставляются в случаях:</strong>
                </p>
                <br/>
            </div>

            <div class="col-xs-3 col-xs-offset-1 text-center ">
                <?= Html::img('/image/advantages/place.png', ['class' => 'img img-responsive center-block']) ?>
                <br/>
                <p>
                    <br/>
                    <strong class="uppercase">
                        Открытие нового магазина
                    </strong>
                </p>
            </div>
            <div class="col-xs-3 text-center">
                <?= Html::img('/image/advantages/delivery.png', ['class' => 'img img-responsive center-block']) ?>
                <br/>
                <p>
                    <br/>
                    <strong class="uppercase">
                        Сумма заказа более 200 тыс. рублей
                    </strong>
                </p>
            </div>
            <div class="col-xs-3 text-center">
                <?= Html::img('/image/advantages/pay.png', ['class' => 'img img-responsive center-block']) ?>
                <br/>
                <p>
                    <br/>
                    <strong class="uppercase">
                        100% предоплата
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