
<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\contacts\models\Contacts;

$this->params['breadcrumbs'][] = $this->title;
?>


<div class="search-result-wrap">

    <div class="container-fluid">
        <h1>Результаты поиска</h1>

        <div class="row">

            <div class="col-xs-12 col-sm-3">


                <ul class="list-unstyled">
                    <li>
                        <?= Html::a('В товарах', '?q=' . $q . '', ['class' => $type == 'product' ? 'btn disabled' : 'btn']) ?>
                    </li>
                    <li>
                        <?= Html::a('В категориях', '?q=' . $q . '&type=category', ['class' => $type == 'category' ? 'btn disabled' : 'btn']) ?>
                    </li>
                    <li>
                        <?= Html::a('В новостях и статьях', '?q=' . $q . '&type=news', ['class' => $type == 'news' ? 'btn disabled' : 'btn']) ?>
                    </li>
                </ul>

            </div>
            <div class="col-xs-12 col-sm-9">

                <?php
                foreach ($model as $item):

                    if ($type == 'product')
                        echo $this->render('_section_product', ['model' => $item]);

                    if ($type == 'category')
                        echo $this->render('_section_category', ['model' => $item]);

                    if ($type == 'news')
                        echo $this->render('_section_news', ['model' => $item]);

                endforeach;
                ?>

            </div>
        </div>
    </div>
</div>
