<?php

use yii\helpers\Html;

$this->registerCssFile('@web/css/category_menu.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/category_menu.js', ['depends' => ['app\assets\AppAsset']]);
?>

<ul>
    <?= $menu ?>
</ul>

