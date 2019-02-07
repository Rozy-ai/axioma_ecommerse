<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<section class="menu-articles menu-services">

    <li class="list-group-item header">Статьи</li>

    <?php
    foreach ($model as $item):

        $active = ($item->id == $current_id) ? ' active' : '';
        ?>

        <a href="<?= Url::to(['/' . $item->url]) ?>" class="list-group-item <?= $active ?>">
            <div class="menu-articles-link row">

                <div class="col-xs-2 image-wrap">
                    <?=
                    $item->image ? Html::img($item->imageService, ['class' => 'img img-responsive']) :
                            Html::img('/image/advantages/about.svg', ['class' => 'img img-responsive'])
                    ?>
                </div>
                <div class="col-xs-10 link-wrap">
                    <?= $item->header ?>
                </div>

            </div>
        </a>

        <?php
        echo Html::a($item->header, ['/' . $item->url]
                , ['class' => 'list-group-item' . $active]);
    endforeach;
    ?>

</section>