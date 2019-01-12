<?php

use yii\bootstrap\Html;
?>
<!--<h2>Test</h2>-->

<div class="products">
    <div class="row">

        <?php foreach ($models as $k => $model): ?>
            <div class="product <?= (($k % 2) == 0) ? 'odd' : 'even' ?>">
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-1">
                        <a href="https://axioma.pro/">
                            <!--<div class="image" style="background: url('<?= $model->name ?>') top center no-repeat"></div>-->
                            <?= Html::img($model->img, ['class' => 'img img-responsive']) ?>
                        </a>
                    </div>
                    <div class="col-xs-8">
                        <div class="row">

                            <div class="col-xs-10">

                                <p class="h4 uppercase">
                                    <a href="https://axioma.pro/">
                                        <?= $model->name ?>
                                    </a>
                                </p>

                                <br/>
                            </div>
                            <div class="col-xs-7">
                                <p>
                                    <?= $model->custom_text ? $model->custom_text : $model->product->content_description ?>
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