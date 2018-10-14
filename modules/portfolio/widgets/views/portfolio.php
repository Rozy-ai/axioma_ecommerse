<?php

use yii\bootstrap\Html;
?>

<div class="home-portfolio">

    <div class="container-fluid">
        <p class="h2">Готовые проекты</p>
    </div>

    <div class="gallery-wrap">
        <div class="container-fluid">
            <?php
            $elements = [];

            foreach ($model as $item):

                $elements[] = '<div class="item-wrap">' . Html::img(null, ['class' => 'owl-lazy',
                            'data' => [
                                'src' => '/image/portfolio/' . $item->mainImage,
                                'header' => $item->name,
                                'anons' => $item->anons,
                    ]]) .
                        '<div class="content-wrap">' .
                        Html::tag('div', $item->name, ['class' => 'p-header h2']) .
                        Html::tag('div', $item->anons, ['class' => 'p-anons']) .
                        '</div>' .
                        '</div>';

            endforeach;

            echo \Gevman\OwlCarousel\OwlCarousel::widget([
                'elements' => $elements,
                'config' => [
                    'items' => 2,
                    'lazyLoad' => true,
                    'loop' => true,
                    'dots' => true,
                    'nav' => true,
                    'autoplay' => true,
                    'navText' => [
                        "<img src='/image/_left.png'>",
                        "<img src='/image/_right.png'>"
                    ]
                ,
                ]
            ]);
            ?>

        </div>
    </div>
</div>