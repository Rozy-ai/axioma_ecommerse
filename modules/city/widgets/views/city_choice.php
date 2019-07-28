<?php

use yii\helpers\Html;

foreach ($links as $k => $link):
    echo $link;
    echo ((count($links) - 1) != $k) ? '<span class="line"></span>' : '';
endforeach;
?>


