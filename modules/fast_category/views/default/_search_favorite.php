<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use webtoolsnz\widgets\RadioButtonGroup;
use kartik\checkbox\CheckboxX;
//use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;

//'@app/modules/category/assets/css/category-search.css'

$this->registerCss($this->render('./../../assets/css/category-search.css'));
?>






<div class="category-search">



    <div class="row">

        <!-- <div class="col-xs-12 col-lg-9">
            </div> -->
            
            <div class="col-xs-12 text-right hidden-xs">
            <a href="#" class="compare-click" onclick="Cart.FavoriteDelete()"><?= Html::img('/image/ico/Удалить.svg', ['class' => 'delete-img']) ?> Удалить все товары</a>
            <a href="#" onclick="changeGrid()">
                <?= Html::img('/image/ico/Подробный список.svg', ['class' => 'list-img']) ?>
            </a>
            <a href="#" onclick="changeList()">
                <?= Html::img('/image/ico/Краткий список.svg', ['class' => 'list-img']) ?>
            </a>
        </div>
    </div>



</div>


<?php
$this->registerJs($this->render('./../../assets/js/category_filter.js'));
