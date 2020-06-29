<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="uslugi">

    <div class="container">
        <h1><?= $model->header ?></h1>

        <p class="text-top">
            Компания аксиома поможет подобрать и установить оборудование любого производителя, с последующим сопровождением.
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

    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-1 bottom-image">
                <?= Html::img('/image/service/!.png', [
                    'class' => 'img img-responsive pull-right', 'alt' => '!'])
                ?>
            </div>
            <div class="col-xs-8 col-sm-11 bottom-text">
                С нами сотрудничают инженеры с 10-летним опытом работы в сфере безопасности. Сотрудники «Аксиомы» приедут на объект без опозданий, в аккуратно фирменной одежде, а также ответят на все ваши вопросы и уберут мусор после монтажа.

                <p class="call-req">ЗВОНИТЕ: <a href="tel:+78003335483">8-800-333-54-83</a></p>
            </div>
        </div>
    </div>
</div>