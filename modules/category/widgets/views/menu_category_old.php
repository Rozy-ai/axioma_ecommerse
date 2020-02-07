<?php

use yii\helpers\Html;

$this->registerCssFile('@web/css/category_menu.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/category_menu.js', ['depends' => ['app\assets\AppAsset']]);
?>

<nav class="navbar navbar-default sidebar" role="navigation">
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

                <?= $menu ?>

                <?php foreach ($model as $item): ?>
                    <?php if ($item->childs): ?>

                        <li class="dropdown">
                            <a href="/category/<?= $item->uri ?>"><?= $item->title ?>
                                <!--<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span>-->
                            </a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <?php
                                foreach ($item->childs as $child):
                                    echo "<li>" . Html::a($child->title, [
                                        '/category/' . $item->uri . '/' . $child->uri . '/'
                                    ]) . "</li>";
                                endforeach;
                                ?>
                            </ul>
                        </li>

                    <?php else: ?>
                        <li>
                            <a href="/category/<?= $item->uri ?>"><?= $item->title ?>
                                <!--<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>-->
                            </a>
                        </li>
                    <?php endif;
                    ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>

