<!--<footer class="page_footer" style="background: #3D3D3D; color: white; padding: 1rem 0; font-style: normal;">-->
<footer class="page_footer">
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3">
                    <?= Yii::$app->info::get('mos_address') ?>
                </div>
                <div class="col-xs-3">
                    <?= Yii::$app->info::get('ekb_address') ?>
                </div>
                <div class="col-xs-2">
                    <?= Yii::$app->info::get('kras_address') ?>
                </div>
                <div class="col-xs-2">
                    <?= Yii::$app->info::get('nvs_address') ?>
                </div>
            </div>
        </div>
    </div>

</footer>