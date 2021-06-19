<?php

use yii\helpers\Html; ?>

<?php echo $current; ?>

<ul class="list-inline">
    <?php foreach ($links as $k => $link): ?>

        <li class="list-inline-item"> <?= $link['link'] ?></li>

    <?php endforeach;
    ?>

</ul>  




