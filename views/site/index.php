<?php

use yii\bootstrap\Html;
?>
<div class="site-index">

    <div class="home-slide-show">
        <?= app\modules\slider\widgets\MainSlider::widget(); ?>
    </div>

    <div class="home-list-category">
        <div class="container">
            <?= app\modules\catalog\widgets\HomeCatalog::widget() ?>
        </div>
    </div>

    <div class="home-advantages">
        <div class="container">
            <div class="advantages-wrap">

                <p class="h3 text-center">Наши преимущества:</p>
                <ul class="list-unstyled list-inline">
                    <li>
                        <?= Html::img('/image/advantages/worldwide-delivery.png', ['class' => 'img img-responsive']) ?>
                        <p class="text-center">
                            Прямые поставки<br/> из Китая
                        </p>
                    </li>
                    <li>
                        <?= Html::img('/image/advantages/delivery-truck.png', ['class' => 'img img-responsive']) ?>
                        <p class="text-center">
                            Бесплатная доставка от<br/> 10 000 ₽
                        </p>
                    </li>
                    <li>
                        <?= Html::img('/image/advantages/placeholder.png', ['class' => 'img img-responsive']) ?>
                        <p class="text-center">
                            Удобное<br/> расположение
                        </p>
                    </li>
                    <li>
                        <?= Html::img('/image/advantages/money.png', ['class' => 'img img-responsive']) ?>
                        <p class="text-center">
                            Отсрочка<br/> платежа
                        </p>
                    </li>
                    <li>
                        <?= Html::img('/image/advantages/worker.png', ['class' => 'img img-responsive']) ?>
                        <p class="text-center">
                            Квалифицированые<br/> инженеры
                        </p>
                    </li>
                    <li>
                        <?= Html::img('/image/advantages/call-center.png', ['class' => 'img img-responsive']) ?>
                        <p class="text-center">
                            Поддержка<br/> клиента
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="home-about">
        <div class="container">
            <p>Современное антикражное оборудование защищает магазины от воровства. Антикражные системы не позволят украсть товар и оповестят персонал торговой точки звуковым или световым сигналом. Купить противокражные системы в Екатеринбурге, Челябинске, Сургуте, Тюмени и Перми предлагает компания «Аксиома».</p>
            <p class="h3">Стандартный набор оборудования для торговой точки состоит из:</p>
            <ul>
                <li>антенн, которые фиксируют вынос неоплаченного товара и оповещают об этом. В небольших магазинах антенны устанавливаются на выходе, в супермаркетах – на кассовых проходах;</li>
                <li>защитных меток для многоразового или одноразового использования. Они прикрепляются к товару и срабатывают при попытке его выноса без оплаты;</li>
                <li>блок электроники (выносной или встроенный);</li>
                <li>деактиваторы защитных наклеек, съемники и другие аксессуары.</li>
            </ul>
            <p>В системы защиты от краж входят и обзорные зеркала. Они обеспечивают просматриваемость труднодоступных зон и облегчают работу охранников.</p>

            <p class="h3">Возможности антикражного оборудования</p>
            <p>Противокражные системы для магазинов помогают решить следующие задачи:</p>
            <ol>
                <li>Отпугнуть воров. Само наличие антикражной системы снижает количество хищений. Больше воруют в тех магазинах, где товары не защищены.</li>
                <li>Поймать преступника. Современные системы работают с точностью до 95%. В результате почти все случаи несанкционированного выноса товара пресекаются.</li>
                <li>Уменьшить штат охраны. Противокражное оборудование позволяет меньше следить за покупателями в торговом зале. Уменьшить число охранников помогают и грамотно установленные зеркала, которые заметно увеличивают обзор.</li>
                <li>Упростить работу персонала. Наличие эффективной антикражной системы облегчает труд не только охранников, но и кассиров. Даже если сотрудник не заметит случайно или намеренно оставленный в корзине товар, он получит сигнал об этом.</li>
            </ol>

            <p>Все перечисленные возможности противокражного оборудования обеспечивают снижение финансовых потерь магазина. Затраты на установку системы всегда компенсируются увеличением общей прибыли торговой точки.</p>
            <p></p>

        </div>
    </div>

    <div class="home-clients">
        <div class="container">
            <?= \app\modules\client\widgets\ClientList::widget(); ?>
        </div>
    </div>

    <div class="home-news">
        <div class="container">
            <?= \app\modules\novosti\widgets\HomeWidget::widget(); ?>
        </div>
    </div>

</div>
