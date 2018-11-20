<?php

use yii\helpers\Html;

//print_r($model);
?>

<div class="col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <p class="h4">
                <?= Html::a($model->header, ['/catalog/' . $model->url]) ?> 
            </p>
        </div>
        <div class="panel-body row">
            <div class="col-xs-4">
                <?= Html::a(Html::img($model->image, ['class' => 'img img-responsive']), ['/catalog/' . $model->url]) ?>
            </div>
            <div class="col-xs-8">
                <?= Html::tag('p', $model->content_info) ?>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <strong>Цена:</strong> <?= $model->price ? '' . $model->price . ' <i class="fa fa-rub" aria-hidden="true"></i>' : ' по запросу'; ?>
                </div>
                <div class="col-xs-12 col-sm-6 ">
                    <p class="pull-right">
                        <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>