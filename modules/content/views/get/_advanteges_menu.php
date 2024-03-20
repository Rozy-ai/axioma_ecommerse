<?php

use yii\bootstrap\Html;

$this->registerCssFile('/css/modules/advantages.css');

$list = [
    ['name' => 'Контроль качества <br/> оборудования в Китае', 'url' => '/kontrol-kachestva-v-kitae', 'image' => '/image/advantages/new/Контроль качества в Китае 100х100px.svg'],
    ['name' => 'Продуманная логистика <br/> бесплатная доставка', 'url' => '/besplatnaya-dostavka', 'image' => '/image/advantages/new/Бесплатная доставка 100х100px.svg'],
    ['name' => 'Возможность приобрести оборудование в рассрочку', 'url' => '/oborudovanie-v-rassrochku', 'image' => '/image/advantages/new/Оборудование в рассрочку 100х100px.svg'],
    ['name' => 'Программа TRAID IN', 'url' => '/trade-in', 'image' => '/image/advantages/new/Программа TradeIn 100х100px.svg'],
    ['name' => 'Мы оказываем весь  <br/> спектр монтажных услуг', 'url' => '/ves-spekt-montazhnyh-uslug', 'image' => '/image/advantages/new/Монтажные услуги 100х100px.svg'],
    ['name' => 'Офис и склад находятся в <br/> одном месте', 'url' => '/ofis-i-sklad-v-odnom-meste', 'image' => '/image/advantages/new/Офис и склад 100х100px.svg'],
    ['name' => 'Гарантийные обязательства <br/> и удобный сервис', 'url' => '/garantiya-12-mesyacev', 'image' => '/image/advantages/new/Гарантия и сервис 100х100px.svg'],
    ['name' => 'Опыт работы более 15 лет', 'url' => '/o_kompanii', 'image' => '/image/advantages/new/Опыт работы 100х100px.svg'],
   
];
?>
<div class="h2">ПОЧЕМУ С НАМИ КОМФОРТНО РАБОТАТЬ?</div>
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