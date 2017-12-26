<?php

use yii\helpers\Html; ?>

<ul class="list-unstyled list-inline">
    <?php
    foreach ($menu as $item)
        echo Html::tag('li', Html::a($item['title'], ['/'.$item['url']]));
    ?>

</ul>