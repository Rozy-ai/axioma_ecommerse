<?php

use yii\bootstrap\Html;
?>
<!--<h2>Test</h2>-->

<div class="products">
    <div class="row">

        <?php foreach ($models as $model): ?>
            <div class="col-xs-10 product">
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-1">
                        <?= Html::img($model->product->image, ['class' => 'img img-responsive']) ?>
                    </div>
                    <div class="col-xs-8">
                        <div class="row">

                            <div class="col-xs-10">
                                <p class="h4 uppercase"><?= $model->product->header ?></p>
                                <br/>
                            </div>
                            <div class="col-xs-7">
                                <p>
                                    <?= $model->product->content_description ?>
                                </p>
                            </div>

                            <div class="col-xs-3 pull-right">
                                <strong><?= Yii::$app->formatter->asCurrency($model->price) ?></strong>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>