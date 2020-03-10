<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\JsExpression;
use vova07\fileapi\Widget as FileAPI;

//use js
$this->registerJsFile(
        '@web/js/catalogInitUpload.js', ['depends' => ['app\assets\AppAsset']]
);
?>
<div class="image-upload">
    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo $form->field(new app\models\UploadFile, 'image')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/image/admin/objectimage-upload'],
//            'multiple' => true,
        ],
        'callbacks' => [
//            'Upload' => new JsExpression('alert(1)'),
//            'FileComplete' => new JsExpression('alert(2)'),
            'complete' => new JsExpression('function (evt, uiEvt){
//alert(1);
//console.log(uiEvt.file.name);
afterUpload();
}'),
//            'filecomplete' => new JsExpression('alert(4)'),
        ],
            ]
    )->label('Загрузить изображение');
    ?>
    <?php ActiveForm::end(); ?>

</div>
