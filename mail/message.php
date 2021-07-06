<p><?= $content; ?></p>
<br/>
<img src="<?= $message->embed($imageFileName); ?>" height="60">

<br/>
<br/>
<hr/>

<div>
    <?= Yii::$app->info::get('mos_address') ?>
    <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
        <?= Yii::$app->info::get('headTelephone') ?>
    </a>
</div>
<br/>
<br/>
<div>
    <?= Yii::$app->info::get('ekb_address') ?>
    <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
        <?= Yii::$app->info::get('headTelephone') ?>
    </a>
</div>
<br/>
<br/>
<div>
    <?= Yii::$app->info::get('kras_address') ?>
    <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
        <?= Yii::$app->info::get('headTelephone') ?>
    </a>
</div>
<br/>
<br/>
<div>
    <?= Yii::$app->info::get('nvs_address') ?>
    <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
        <?= Yii::$app->info::get('headTelephone') ?>
    </a>
</div>