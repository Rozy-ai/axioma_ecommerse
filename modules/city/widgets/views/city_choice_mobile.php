<?php

use yii\helpers\Html;

foreach ($links as $k => $link):

    if (isset($link['is_active']))
        echo $link['link'] . '<br/>';

endforeach;

foreach ($links as $k => $link):

    if (isset($link['is_active']))
        ;
    else
        echo $link['link'];

endforeach;
?>


