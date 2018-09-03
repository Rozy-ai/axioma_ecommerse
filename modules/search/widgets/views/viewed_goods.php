<?php

use yii\helpers\Html;

if ($model):
    ?>
    <p class="h3">Просмотренные товары</p>
    <div class="row">
        <?php
        for ($i = (count($model) - 1 ); $i >= 0; $i--):
            if ((count($model) - $i) > 4)
                continue;
            ?>
            <div class="col-xs-12 col-sm-4 col-md-3 item">
                <?= Html::a(Html::img($model[$i]->image, ['class' => 'img img-responsive']), ['/catalog/' . $model[$i]->url]) ?>
                <?= Html::a($model[$i]->name, ['/catalog/' . $model[$i]->url]) ?>
            </div>
            <?php
        endfor;
        ?>

    </div>

<?php endif; ?>