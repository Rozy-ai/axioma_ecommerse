<?php ?>

<div class="vacancy row">
    <div class="col-sm-6">
        <div class="h2"><?= $model->name ?></div>
        <div class="address">
            <i class="fa fa-map-marker-alt" aria-hidden="true"></i> г. 
            <?= \app\modules\region_templates\models\RegionTemplates::getVal('city') ?>
            <?= \app\modules\region_templates\models\RegionTemplates::getVal('address') ?></div>
    </div>
    <div class="col-sm-6">

        <div class="text-right pay">
            <?= $model->pay ?>
        </div>

    </div>
    <div class="col-xs-12">
        <?= $model->description ?>
    </div>
</div>

<?php if (!$model->is_close): ?>
    <button class="row">
        <button class="btn btn-primary send-doc">
            Отправить резюме
        </button>
    </button>
<?php endif; ?>


