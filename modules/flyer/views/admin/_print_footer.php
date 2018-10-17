<footer class="page_footer">

    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3 col-xs-offset-1">
                    <?= Yii::$app->info::get('mos_address') ?>
                </div>
                <div class="col-xs-3">
                    <?= Yii::$app->info::get('ekb_address') ?>
                </div>
                <div class="col-xs-3">
                    <p class="email">
                        email:
                        <?= Yii::$app->info::get('email') ?>
                    </p>
                    <p class="phone">
                        <?= Yii::$app->info::get('headTelephone') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>