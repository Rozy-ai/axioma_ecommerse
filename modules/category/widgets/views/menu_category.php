<?php

use yii\helpers\Html;

$this->registerCssFile('@web/css/category_menu.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/category_menu.js', ['depends' => ['app\assets\AppAsset']]);
?>

<nav class="navbar navbar-default sidebar category-menu" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!--<li class=""><a href="#">Каталог</a></li>-->
                <?= $menu ?>

            </ul>
        </div>
    </div>
</nav>

