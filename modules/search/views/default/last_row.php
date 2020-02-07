<?php

use yii\bootstrap\Html;
?>

<li>
    <?= Html::a('Ещё ' . $count . ' результатов по запросу ' . $q, ['/search?q=' . $q]) ?>
</li>