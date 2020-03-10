<?php

use yii\helpers\Html;
?>

<tr>
    <td height="<?= $is_first ? '240px' : '230px' ?>"  valign="top" style="margin-bottom: 10px;">
        <?= Html::img($model->img, ['class' => 'img img-responsive', 'width' => '160px']) ?>
    </td>
    <td valign="top"  height="<?= $is_first ? '240px' : '230px' ?>">
        <a href="<?= $model->url ?>">
            <strong><?= $model->name ?></strong>
        </a>
        <p>
            <?= $model->custom_text ?>
        </p>
    </td>
    <td class="text-right" valign="top">
        <?php if ($model->price_nds): ?>
            <?php if ($model->price_nds_new): ?>
                <strong><?= Yii::$app->formatter->asCurrency($model->price_nds_new) ?></strong>
                <p class="old-price">
        <strike>
            <?= Yii::$app->formatter->asCurrency($model->price_nds) ?>
        </strike>
        </p>
    <?php else: ?>
        <strong><?= $model->price_nds ? Yii::$app->formatter->asCurrency($model->price_nds) : 'по запросу' ?></strong>
    <?php endif; ?>
<?php else: ?>
    <?php if ($model->price_new): ?>
        <strong><?= Yii::$app->formatter->asCurrency($model->price_new) ?></strong>
        <p class="old-price">
        <strike>
            <?= Yii::$app->formatter->asCurrency($model->price) ?>
        </strike>
        </p>
    <?php else: ?>
        <strong><?= $model->price ? Yii::$app->formatter->asCurrency($model->price) : 'по запросу' ?></strong>
    <?php endif; ?>
<?php endif; ?>
</td>
</tr>