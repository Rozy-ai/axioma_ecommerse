<p><?= $content; ?></p>
<br/>
<img src="<?= $message->embed($imageFileName); ?>">

<p class="phone">
    <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
        <?= Yii::$app->info::get('headTelephone') ?>
    </a>
    <!--<br/>-->
</p>

<p>
    <?= Yii::$app->info::get('mos_address') ?>
</p>
<p>
    <?= Yii::$app->info::get('ekb_address') ?>
</p>