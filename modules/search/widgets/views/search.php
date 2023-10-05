<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('@web/js/search.js'
        , ['depends' => ['app\assets\AppAsset']]);
?>

<!--<div class="search-wrap">
    <div class="container">-->
<?php
ActiveForm::begin([
    'method' => 'get',
    'action' => '/search',
    'id' => 'popup-search'
]);
?>
<!--        <div class="row">
            <div class="col-xs-12 search">-->
<div class="input-group">
    <input name="q" type="text"
           class="form-control q" placeholder="Поиск по товарам.."> <i class="fas fa-search"></i>

</div>
<ul class="ajax-result list-unstyled">
</ul>
<!--            </div>
        </div>-->
<?php ActiveForm::end(); ?>
<!--    </div>
</div>-->