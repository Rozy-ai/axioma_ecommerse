<?php
use app\modules\menu\models\Menu;
use yii\helpers\FileHelper;

$items = Menu::getBottomMenu();

// $files = FileHelper::findFiles('image/fast-cat',['only'=>['*.svg']]);

?>
<div class="middle-line fixed-header-catalog scrolled_catalog" style="display:none">
<div class="container">
    <div class="row">
    <?php foreach ($items as $item): ?>
        <a href="<?= $item['url'][0] ?>">
                        <?= $item['label'] ?>
            </a>
    <?php endforeach; ?>
        </div>
    </div>
</div>

<ul class="top-line-nav nav new_fast_cat">
    <?php foreach ($items as $item): ?>
        <li><a href="<?= $item['url'][0] ?>"><img src="<?= '/image/fast-cat/' . $item['label'] . '.svg'; ?>" alt="">
                <div class="new_fast_cat_lable">
                    <div class="inner">
                        <?= $item['label'] ?>
                    </div>
                </div>
            </a></li>
    <?php endforeach; ?>
</ul>
 


<?php

$script = <<<JS
const header_catalog = document.querySelector('.fixed-header-catalog');
const mainHeader = document.querySelector('.header');

window.addEventListener('scroll', () => {
    var scrollY = window.scrollY;
    //  var mt = 84 - scrollY;
  if (window.scrollY > 164) {
    header_catalog.style.display = 'block';
  } else {
    header_catalog.style.display = 'none';
  }
});
JS;
$this->registerJs($script, \yii\web\View::POS_READY, );

?>