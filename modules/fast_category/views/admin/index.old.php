<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\category\controllers\SearchCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile('@web/js/category.js', ['depends' => ['app\assets\AppAsset']]);

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php //var_dump($cats); ?>
    <div class="row">
        <div class="col-xs-5">
            <?php
            echo \wbraganca\fancytree\FancytreeWidget::widget([
                'options' => [
                    'source' => $cats,
                    'extensions' => ['dnd'],
                    'dnd' => [
                        'preventVoidMoves' => true,
                        'preventRecursiveMoves' => true,
                        'autoExpandMS' => 400,
                        'dragStart' => new JsExpression('function(node, data) {
                                console.log(node);
				return true;
			}'),
                        'dragEnter' => new JsExpression('function(node, data) {
				return true;
			}'),
                        'dragDrop' => new JsExpression('function(node, data) {
				data.otherNode.moveTo(node, data.hitMode);
			}'),
                    ],
                    'click' => new JsExpression('function(event, data) {
                                console.log(data);
                                var key = data.node.key;
                                $("[name=current-cat]").val(key);
                                $(".right-block").load( "/category/admin/ajax-update/" + key);
				return true;
			}'),
                ]
            ]);
            ?>
            <?= Html::hiddenInput('current-cat') ?>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a type="button" class="btn btn-primary" href="/category/admin/create">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary" onclick="Delete()">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

        </div>
        <div class="col-xs-7 right-block">

        </div>
    </div>


</div>
