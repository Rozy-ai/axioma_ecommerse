<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'preview',
            'content:ntext',
            'seo_title',
            'seo_description',
            'seo_keywords',
            [
                'attribute' => 'created_at',
                'value' => function($row) {
                    return Yii::$app->formatter->asDatetime($row->created_at, 'medium');
                },
            ],
            [
                'attribute' => 'updated_at',
                'value' => function($row) {
                    return Yii::$app->formatter->asDatetime($row->updated_at, 'medium');
                },
            ],
            [
                'attribute' => 'publish_at',
                'value' => function($row) {
                    return Yii::$app->formatter->asDatetime($row->publish_at, 'medium');
                },
            ],
        ],
    ])
    ?>

</div>
