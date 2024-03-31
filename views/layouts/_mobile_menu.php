<?php

use yii\bootstrap\Html;

?>

<nav id="menu" class="">
    <ul>
        <li class="top-line m-text-top">
            <h2><strong>Каталог Товаров</strong></h2>

        </li>
        <!--<li><?= Html::img('/image/logo-mobile.png') ?></li>-->
        <!-- <li class="top-line">
            <span class="city-wrap">
                <span class="image">
                    <?php //echo Html::img('/image/ico/Arrow.svg', ['height' => '40'])  ?>
                </span>
                <span class="content">
                    <?php //echo \app\modules\city\widgets\CityChoice::widget(['mobile' => true])  ?>
                </span>    
            </span>    
        </li> -->

        <!-- <li class="top-line">
            <span class="phone-wrap">
                <span class="image">
                    <?php //echo Html::img('/image/ico/Phone.svg', ['height' => '40'])  ?>
                </span>
                <span class="phone">
                    <a href="tel:<?php //echo Yii::$app->info::get('headTelephone')  ?>">
                        <?php //echo Yii::$app->info::get('headTelephone')  ?>
                    </a>
                    <span class="free-call">Звонок бесплатный</span>

                </span>
            </span>
        </li> -->

        <!--<li class="devider"></li>-->

        <!--        <li><span> <?=
            Html::img('/image/ico/Catalog.svg', [
                'height' => '30'
                    . ''
            ])
            ?>  КАТАЛОГ</span>
            <ul>



            </ul>
        </li>-->
        <?php foreach (\app\modules\fast_category\models\FastCategory::find()->all() as $item): ?>
            <li class="catalog">
                <a href="<?= $item->link ? $item->link : $item->_url ?>">
                    <?= Html::img($item->_icon, ['height' => '26']) ?>
                    <?= $item->header ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- <li class="devider"></li>
        <li>

            <a href="/uslugi">

                <?php //echo Html::img('/image/ico/Service.svg', ['height' => '26']) ?> УСЛУГИ
            </a>
        </li>
        <li>

            <a href="/dostavka-vozvrat">
                <?= Html::img('/image/ico/Delivery.svg', ['height' => '26']) ?>
                ДОСТАВКА И ОПЛАТА
            </a>
        </li>
        <li>

            <a href="/test">
                <?php //echo Html::img('/image/ico/Delivery.svg', ['height' => '26']) ?>
                Test
            </a>
        </li>
        <li>

            <a href="/kontaktyi">

                <?php //echo Html::img('/image/ico/Locate.svg', ['height' => '26']) ?>
                КОНТАКТЫ
            </a>
        </li>
        <li class="devider"></li> -->
        <!--<li><a href="/calc">Калькулятор</a></li>-->

    </ul>
</nav>