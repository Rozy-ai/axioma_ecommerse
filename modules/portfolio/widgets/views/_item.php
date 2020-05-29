<?php

use yii\helpers\Html;
?>

<div class="row">

    <?php foreach ($items as $item): ?>
        <div class="col-xs-6 grid-item">

            <?= Html::img('/image/logos/' . basename($item),
                    ['class' => 'img', 'height' => '100px', 'alt' => 'portfolio']);
            ?>
        </div>

<?php endforeach; ?>

</div>