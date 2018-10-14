
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

            <?php
            foreach ($model as $item):

                echo $this->render('_section', ['model' => $item]);

            endforeach;
            ?>


        </div>
    </div>
</div>
