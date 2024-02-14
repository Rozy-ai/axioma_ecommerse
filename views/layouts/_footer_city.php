<?php

use app\modules\city\models\City;
use app\modules\region_templates\models\RegionTemplates;

$cities = City::find()->where(['is_enable' => 1])->orderBy(['order' => SORT_DESC])->all();

?>
<?php foreach ($cities as $key => $city): ?>
    <?php if ($city->id != Yii::$app->city->id): ?>
        <div class="col-xs-12 col-sm-2 footer_center_<?= $key ?>">
            <div class="new_tab_address">
                <p>
                    <span style="font-weight: bold">г.
                        <?= RegionTemplates::getValNew('city', $city->id) ?>
                    </span>
                    <br>
                    <?= RegionTemplates::getValNew('address', $city->id) ?>
                </p>
            </div>
        </div>

    <?php endif; ?>
<?php endforeach; ?>
<div class="col-xs-12 col-sm-2 footer_center_last">
    <div class="new_tab_address">
        <a href="mailto: <?= Yii::$app->info::get('email') ?>"><i class="fas fa-envelope-square"
                style="color: #b8cc76;"></i>
            <?= Yii::$app->info::get('email') ?>
        </a>
    </div>
</div>