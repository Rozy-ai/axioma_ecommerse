<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="uslugi">

    <div class="container">
        <h1>
            <?= $model->header ?>
        </h1>

        <p class="text-top">
            Компания аксиома поможет подобрать и установить оборудование любого производителя, с последующим
            сопровождением.
        </p>
    </div>
    <div class="uslugi-grid-wrap">
        <div class="container">
            <div class="row">
                <?php
                foreach ($pages as $page)
                    echo $this->render('_one_service', ['model' => $page])
                        ?>
                </div>
            </div>
        </div>

        <div class="container" style="color:#959595">
            <div class="row">
                <div class="col-xs-12 col-md-1 col-sm-1 bottom-image">
                <?= Html::img('/image/service/!.png', [
                    'class' => 'img img-responsive pull-right',
                    'alt' => '!'
                ])
                    ?>
            </div>
            <div class="col-xs-12 col-md-11 col-sm-11 bottom-text">
                <!-- С нами сотрудничают инженеры с 10-летним опытом работы в сфере безопасности. Сотрудники «Аксиомы» приедут на объект без опозданий, в аккуратной фирменной одежде, а также ответят на все ваши вопросы и уберут мусор после монтажа. -->
                Сотрудники компании "Аксиома" обладают 15-летним опытом работы в области безопасности и готовы профессионально выполнить установку и настройку антикражных систем любой сложности. <br>
            </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12">
                <p class="h4" style="margin-left: 30px">НАШИ СПЕЦИАЛИСТЫ ВЫПОЛНЯЮТ НАСТРОЙКУ И МОНТАЖ:</p><br>
                <div class="col-xs-12 col-md-4">
                    <ul>
                        <li>Антикражного оборудования</li>
                        <li>Видеонаблюдения</li>
                        <li>Систем для распознования лиц</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-4">
                    <ul>
                        <li>Оборудования для подсчета посетителей</li>
                        <li>Звукового сопровождения торгового зала</li>
                        <li>СКС (структурированные кабельные системы)</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-4">
                    <ul>
                        <li>СКУД (системы контроля доступа)</li>
                    </ul>
                </div>
                <!-- <p class="call-req">ЗВОНИТЕ: <a href="tel:+78003335483">8-800-333-54-83</a></p> -->
            </div>
        </div>
    </div>
</div>