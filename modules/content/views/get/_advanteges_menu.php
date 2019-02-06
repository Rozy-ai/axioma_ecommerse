<?php

use yii\bootstrap\Html;
?>
<div class="home-advantages">
    <div class="advantages-wrap">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-6">
                <a href="/o_kompanii">
                    <?= Html::img('/image/advantages/about.svg', [
                        'class' => 'img center-block', 'height' => '120px',
                        'onerror' => "this.src='about.png'"]) ?>
                    <p class="text-center">
                        О компании
                    </p>
                </a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <a href="/kontrol-kachestva-v-kitae">
                    <?= Html::img('/image/advantages/world.svg', [
                        'class' => 'img center-block', 'height' => '120px',
                        'onerror' => "this.src='world.png'"]) ?>
                    <p class="text-center">
                        Контроль качества
                        <br/> в Китае
                    </p>
                </a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <a href="/besplatnaya-dostavka">
                    <?= Html::img('/image/advantages/delivery.svg', [
                        'class' => 'img center-block', 'height' => '120px',
                        'onerror' => "this.src='delivery.png'"
                        ]) ?>
                    <p class="text-center">
                        Бесплатная<br/>  доставка
                    </p>
                </a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <a href="/oborudovanie-v-rassrochku">
                    <?= Html::img('/image/advantages/pay.svg', [
                        'class' => 'img center-block', 'height' => '120px',
                        'onerror' => "this.src='pay.png'"
                        ]) ?>
                    <p class="text-center">
                        Оборудование в<br/>  рассрочку

                    </p>
                </a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <a href="/ves-spekt-montazhnyh-uslug">
                    <?= Html::img('/image/advantages/ingeener.svg', [
                        'class' => 'img center-block', 'height' => '120px',
                        'onerror' => "this.src='ingeener.png'"]) ?>
                    <p class="text-center">
                        Весь спектр<br/>  монтажных услуг
                    </p>
                </a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <a href="/ofis-i-sklad-v-odnom-meste">
                    <?= Html::img('/image/advantages/place.svg', [
                        'class' => 'img center-block', 'height' => '120px',
                        'onerror' => "this.src='place.png'"]) ?>
                    <p class="text-center">
                        Офис и склад<br/>  в одном месте
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>