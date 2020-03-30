<?php

use yii\bootstrap\Html;

//echo app\modules\robots\models\Robots::findOne(['city_id' => Yii::$app->city->getId()])->content;
?>
<div class="site-index">

    <div class="home-slide-show">
        <?= app\modules\slider\widgets\MainSlider::widget(); ?>
        <div class="container">

            <div class="home-advantages">
                <div class="container">
                    <div class="advantages-wrap">

                        <?php echo $this->render('@app/modules/content/views/get/_advanteges_menu'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-list-category">
        <div class="container">
            <?= \app\modules\category\widgets\HomeCategory::widget() ?>
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

    <div class="home-about">
        <div class="container">
            <p class="h2">Возможности антикражного оборудования</p>

            <div class="row">
                <div class="col-xs-12 col-sm-6 left">

                    <p class="text-black">Противокражные системы для магазинов помогают решить следующие задачи:</p>
                    <ul class="list-unstyled">
                        <li>Отпугнуть воров. Само наличие антикражной системы снижает количество хищений. Больше воруют в тех магазинах, где товары не защищены.</li>
                        <li>Поймать преступника. Современные системы работают с точностью до 95%. В результате почти все случаи несанкционированного выноса товара пресекаются.</li>
                        <li>Уменьшить штат охраны. Противокражное оборудование позволяет меньше следить за покупателями в торговом зале. Уменьшить число охранников помогают и грамотно установленные зеркала, которые заметно увеличивают обзор.</li>
                        <li>Упростить работу персонала. Наличие эффективной антикражной системы облегчает труд не только охранников, но и кассиров. Даже если сотрудник не заметит случайно или намеренно оставленный в корзине товар, он получит сигнал об этом.</li>
                    </ul>

                    <p>Все перечисленные возможности противокражного оборудования обеспечивают снижение финансовых потерь магазина. Затраты на установку системы всегда компенсируются увеличением общей прибыли торговой точки.</p>

                </div>
                <div class="col-xs-12 col-sm-6 right">

                    <p>Современное антикражное оборудование защищает магазины от воровства. Антикражные системы не позволят украсть товар и оповестят персонал торговой точки звуковым или световым сигналом. Купить противокражные системы в Екатеринбурге, Челябинске, Сургуте, Тюмени и Перми предлагает компания «Аксиома».</p>
                    <p class="h4">Стандартный набор оборудования для торговой точки состоит из:</p>
                    <ul class="list-unstyled">
                        <li>антенн, которые фиксируют вынос неоплаченного товара и оповещают об этом. В небольших магазинах антенны устанавливаются на выходе, в супермаркетах – на кассовых проходах;</li>
                        <li>защитных меток для многоразового или одноразового использования. Они прикрепляются к товару и срабатывают при попытке его выноса без оплаты;</li>
                        <li>блок электроники (выносной или встроенный);</li>
                        <li>деактиваторы защитных наклеек, съемники и другие аксессуары.</li>
                    </ul>
                    <p>В системы защиты от краж входят и обзорные зеркала. Они обеспечивают просматриваемость труднодоступных зон и облегчают работу охранников.</p>

                </div>
            </div>
        </div>
    </div>


    <div class="thanks-contact-form">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 thanks">
                    <?= app\modules\thanks\widgets\ThanksList::widget(); ?>
                </div>
                <div class="col-xs-12 col-sm-4 contact-form">
                    <?= app\modules\forms\widgets\Contact::widget(); ?>
                </div>

            </div>
        </div>
    </div>

</div>
