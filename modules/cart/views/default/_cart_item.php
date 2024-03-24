<?php

use yii\helpers\Html;
use kartik\popover\PopoverX;

//echo $count;
?>
<div class="row tb-col">
    <!-- <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-1 img-wrap text-center">
    <?php //echo Html::checkbox('test', ['class' => '']) ?>
    </div> -->
    <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-2 img-wrap">
        <?=
        Html::img($model->getImage()
                , ['class' => 'img img-responsive img-thumbnail'
            , 'height' => '30px'])
        ?>
    </div>
    <div class="col-xs-12 col-sm-6 name-wrap">
        <strong class="hidden-sm hidden-md hidden-lg">Наименование: </strong>
        <?=
        Html::a($model->header, ['/catalog/' . $model->url]
                , ['class' => 'cart-item-title'])
        ?>
    </div>
    <!--    <div class="col-xs-12 col-sm-2 summ-one-wrap">
            <strong class="hidden-sm hidden-md hidden-lg">Сумма за еденицу: </strong>
<?php // Yii::$app->formatter->asCurrency($model->price)   ?>
        </div>-->
    <div class="col-xs-12 col-sm-3 count-wrap">
        <div class="input-group center-block">
           <button class="btn btn-cart-checkout" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                <i class="fas fa-minus"></i>
            </button>
            <?php echo Html::textInput('product_id', $model->id, ['class' => 'hidden'])  ?>
            <?php
           echo Html::textInput('count', $count, [
               'class' => 'text-center btn-cart-checkout count-' . $model->id,
               'type' => 'number',
               "data-krat" => $model->krat,
               'onChange' => 'Cart.Set(' . $model->id . ')'
           ])
            ?>
           <button class="btn btn-cart-checkout" type="button" onclick="Cart.Plus(<?= $model->id ?>)">
                <i class="fas fa-plus"></i>
            </button>

            <?php
          //  $content = Html::input('number', 'count-helper', $count, ['class' => 'count-helper count-helper-' . $model->id, 'attr-id' => $model->id]);
            ?>

            <?php
//             PopoverX::widget([
//                'id' => 'popover-x-' . $model->id,
//                'header' => 'Укажите количество',
//                'placement' => PopoverX::ALIGN_BOTTOM,
//                'content' => $content,
//                'footer' => Html::button('OK', ['class' => 'btn btn-sm btn-primary count-helper-ok']),
//                'toggleButton' => ['label' => ' <strong class="btn-count-' . $model->id . '">' . $count . '</strong>', 'class' => 'btn btn-default btn-count-wrap'],
//            ]);
            ?>

        </div>

        <?php if ($model->krat > 1): ?>
            <p class="text-muted text-left" style="font-size: 10px;">* кратность заказа - <?= $model->krat ?> </p>
        <?php endif;
        ?>
    </div>

    <!-- <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-2 img-wrap text-center">
        <?php
        // $val = [];

        // for ($i = 1; $i < 20; $i++)
        //     $val[$i] = $i;
        // echo Html::dropdownList('count-helper', $count , $val, ['class' => 'count-helper count-helper-' . $model->id, 'attr-id' => $model->id] );
        ?>
    </div> -->

    <!--<div class = "col-xs-12 col-sm-2 summ-wrap">
    <strong class = "hidden-sm hidden-md hidden-lg">Итого: </strong>
    <?php // Yii::$app->formatter->asCurrency($model->price * $count)  
    ?>
</div>-->
       <div class="col-xs-12 col-sm-1 delete-wrap">
       <?php 
    if(isset(Yii::$app->session['favorite'])) {$data = array_unique(Yii::$app->session['favorite']);
        if(in_array($model->id, $data)) $imgPath = '/image/ico/Избранное(зеленый).svg';
         else {$imgPath = '/image/ico/Избранное.svg';}
        } else {$imgPath = '/image/ico/Избранное.svg';}
?>
<a href="#" onclick="Cart.Favorite(this, <?= $model->id ?>)"><?= Html::img($imgPath, ['class' => 'favorite-img','style' => 'height: 16px;']) ?></a> 
            <button class="cart-delete btn btn-cart-checkout"
                    onclick="Cart.Delete(<?= $model->id ?>)">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
</div>
