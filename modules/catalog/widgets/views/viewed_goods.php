<?php

use yii\helpers\Html;

if ($model):
    ?>
    <p class="h3">Последние просмотренные товары</p>
    <div class="row">
        <?php
        for ($i = (count($model) - 1 ); $i >= 0; $i--):
            if ((count($model) - $i) > 4)
                continue;
            ?>
            <div class="col-xs-12 col-sm-4 col-md-3 item">
                <?=
                Html::a(Html::img(
                                $model[$i]->image, [
                            'class' => 'img img-responsive img-thumbnail'
                        ])
                        , ['/catalog/' . $model[$i]->url]
                        , ['class' => 'block-link'])
                ?>
                <span class="category"><?= $model[$i]->categoryLink ?> /</span>
                <br/>
                <?= Html::a($model[$i]->header, ['/catalog/' . $model[$i]->url]) ?>
            </div>
            <?php
        endfor;
        ?>

    </div>

<?php endif; ?>