<?php 
use app\modules\menu\models\Menu;
use yii\helpers\FileHelper;

$items = Menu::getBottomMenu();

// $files = FileHelper::findFiles('image/fast-cat',['only'=>['*.svg']]);

?>

<ul class="top-line-nav nav new_fast_cat">
    <?php foreach($items as $item): ?>
            <li><a href="<?= $item['url'][0] ?>"><img src="<?='/image/fast-cat/'.$item['label'].'.svg'; ?>" alt=""> <?= $item['label'] ?></a></li>
    <?php endforeach; ?>
</ul>