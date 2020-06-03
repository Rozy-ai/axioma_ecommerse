<?php

use yii\bootstrap\Html;

$this->registerCssFile('/css/modules/advantages.css');

$list = [
    ['name' => 'О компании', 'url' => '/o_kompanii', 'image' => '/image/advantages/Аксиома.svg'],
    ['name' => 'Контроль качества <br/>в Китае ', 'url' => '/kontrol-kachestva-v-kitae', 'image' => '/image/advantages/Контроль качества.svg'],
    ['name' => 'Бесплатная доставка', 'url' => '/besplatnaya-dostavka', 'image' => '/image/advantages/Доставка.svg'],
    ['name' => 'Сервис и гарантия', 'url' => '/garantiya-12-mesyacev', 'image' => '/image/advantages/гарантия.png'],
    ['name' => 'Оборудование <br/>в рассрочку', 'url' => '/oborudovanie-v-rassrochku', 'image' => '/image/advantages/Рассрочка.svg'],
    ['name' => 'Весь спектр <br/>монтажных услуг', 'url' => '/ves-spekt-montazhnyh-uslug', 'image' => '/image/advantages/Спектр услуг.svg'],
    ['name' => 'Офис и склад <br/>в одном месте', 'url' => '/ofis-i-sklad-v-odnom-meste', 'image' => '/image/advantages/Офис и склад.svg'],
    ['name' => 'Программа<br/>Trade In', 'url' => '/trade-in', 'image' => '/image/advantages/Trade-in.svg'],
];
?>
<div class="advantages-menu">
    <div class="advantages-wrap">
        <div class="row">
            <?php foreach (array_chunk($list, 4) as $k => $_item): ?>
                <div class="row row-<?= $k ?>">
                    <?php foreach ($_item as $item): ?>
                        <div class="col-xs-6 col-sm-6 col-md-3 item">
                            <a href=<?= $item['url'] != Yii::$app->request->url ? $item['url'] : 'javascript:void(0)' ?>>

                                <?=
                                Html::tag('div', '', [
                                    'class' => 'item-image center-block',
                                    'style' => "background: url('" . $item['image'] . "') center center no-repeat",
                                ])
                                ?>
                                <p class="text-center title">
                                    <?= $item['name'] ?>
                                </p>
                            </a>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <?php
            endforeach;
            ?>

        </div>
    </div>
</div>