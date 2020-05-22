<?php

use yii\helpers\Html;
?>

<section class="menu-services">

    <li class="list-group-item header">Статьи</li>

    <?php
    foreach ($model as $item):

        $active = ($item->id == $current_id) ? ' active' : '';

        echo Html::a($item->header, ['/' . $item->url]
                , ['class' => 'list-group-item' . $active]);
    endforeach;
    ?>

</section>