<?php

use yii\helpers\Html;

$this->registerCss($this->render('./../../assets/css/category-search.css'));
?>

    <div class="category-search">



        <div class="row">





            <div class="col-xs-12 col-lg-3">

            </div>
            <div class="col-xs-12 col-lg-3">


            </div>
            <div class="col-xs-12 col-lg-3">


</div>
            <div class="col-xs-12 col-lg-3 text-right hidden-xs">
                <a href="#" onclick="changeGrid()"><?= Html::img('/image/ico/Подробный список.svg', ['class' => 'list-img']) ?></a>
                <a href="#" onclick="changeList()"><?= Html::img('/image/ico/Краткий список.svg', ['class' => 'list-img']) ?></a>
            </div>
        </div>



    </div>



