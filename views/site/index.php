<?php

use yii\bootstrap\Html;

//echo app\modules\robots\models\Robots::findOne(['city_id' => Yii::$app->city->getId()])->content;
?>
<div class="site-index">

    <div class="home-slide-show">
        <?= app\modules\slider\widgets\MainSlider::widget(); ?>
        <div class="container">


        </div>
    </div>

    <div class="home-list-category">
        <div class="container">

            <h1>Антикражные системы для магазинов</h1>

            <?= \app\modules\category\widgets\HomeCategory::widget() ?>
        </div>
    </div>

    <div class="uslugi">
        <div class="uslugi-grid-wrap">
            <div class="container">

                <div class="h2">Услуги и сервисы</div>

                <div class="row">
                    <?php
                    foreach (\app\modules\content\models\Content::findAll([
                        'is_enable' => 1,
                        'type_id' => \app\modules\content\models\Content::TYPE['Услуги'],
                    ]) as $page)
                        echo $this->render('@app/modules/content/views/get/_one_service', ['model' => $page])
                        ?>
                </div>
            </div>
        </div>
    </div>

    <div class="home-advantages">
        <div class="container">
            <div class="advantages-wrap">

                <?php echo $this->render('@app/modules/content/views/get/_advanteges_menu'); ?>
            </div>
        </div>
    </div>



    <div class="home-portfolio">

        <div class="container">
            <p class="h2">Готовые проекты</p>
        </div>

        <div class="gallery-wrap">
            <?= app\modules\portfolio\widgets\PortfolioWidget::widget(); ?>
        </div>
    </div>


    <div class="home-clients hidden">
        <div class="container">
            <?= \app\modules\client\widgets\ClientList::widget(); ?>
        </div>
    </div>

    <div class="home-news">
        <div class="container">
            <?= \app\modules\novosti\widgets\HomeWidget::widget(); ?>
        </div>
    </div>

    <?= $this->render('_about') ?>
    <?= $this->render('_contact_form') ?>




</div>
