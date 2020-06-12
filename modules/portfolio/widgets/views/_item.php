<?php

use yii\helpers\Html;
?>

<div class="row">

    <?php foreach ($items as $item): ?>
        <div class="col-xs-6 grid-item">

            <?= Html::img('/image/logos/' . basename($item),
                    ['class' => 'img center-block', 'height' => '120px', 'alt' => 'portfolio', 'style' => 'padding: 2.2rem;']);
            ?>
        </div>

<?php endforeach; ?>

</div>