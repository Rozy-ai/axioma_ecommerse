<?php
use yii\helpers\Html;   

//'@app/modules/category/assets/css/category-search.css'

$this->registerCss($this->render('./../../assets/css/category-search.css'));
?>



<a href="#" class="pull-right compare-click" onclick="Cart.CompareDelete()"><?= Html::img('/image/ico/Удалить.svg', ['class' => 'delete-img']) ?> Удалить все товары</a>


<?php
$this->registerJs($this->render('./../../assets/js/category_filter.js'));
