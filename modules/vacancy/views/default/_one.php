<?php ?>

<div class="vacancy row">
    <div class="col-sm-6">
        <div class="h2"><?= $model->name ?></div>
        <div class="address">
            <i class="fa fa-map-marker-alt" aria-hidden="true"></i> г.
            <?= \app\modules\region_templates\models\RegionTemplates::getValOld('city') ?>
            <?= \app\modules\region_templates\models\RegionTemplates::getValOld('address') ?>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="text-right">
            <span class="posted-data">Выложено</span> <?= Yii::$app->formatter->asDate($model->created_at, 'long') ?>
        </div>
    </div>
    <div class="col-sm-3">

        <div class="text-right pay">
            <?= $model->pay ?>
        </div>

    </div>
    <div class="col-xs-12">
        <?= $model->description ?>
    </div>
</div>

<?php if (!$model->is_close) : ?>
    <div class="row text-right">
        <?= \app\modules\forms\widgets\VacancyWidget::widget(); ?>
    </div>
<?php endif; ?>