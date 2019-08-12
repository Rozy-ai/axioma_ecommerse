<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = $this->title . ((isset($request['page'])) ? ' Страница - ' . $request['page'] . ' ,' : '');

$this->params['breadcrumbs'][] = 'Статьи';
?>

<div class="news">
    <h1>Статьи</h1>



    <?php
    echo ($models) ? '' : 'Пока статей нет';

// подключаем виджет постраничной разбивки
// проходим цикл по данным модели
    foreach ($models as $model) {
        // выводим название организации (пример)
        echo $this->render('_one_article', ['model' => $model]);
    }

// отображаем постраничную разбивку
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>

</div>