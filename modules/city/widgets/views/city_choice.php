<?php

use yii\helpers\Html;
use kartik\popover\PopoverX;

echo PopoverX::widget([
    'header' => 'Выбрать город',
    'placement' => PopoverX::ALIGN_BOTTOM,
    'content' => $links,
//    'footer' => Html::button('Выбрать', ['class' => 'btn btn-sm btn-primary']),
    'toggleButton' => ['label' => $current_city, 'class' => 'btn btn-link'],
]);
?>


