<?php

namespace app\modules\content\controllers;

use Yii;
use yii\web\Controller;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

/**
 * ServicesController implements the CRUD actions for Content model.
 */
class ContentController extends \app\controllers\AdminController {

    public function actions() {
        return [
            'upload-image' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/content',
//                'url' => '/image/content/',
                'uploadOnlyImage' => false,
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => '/image/content/', // URL адрес папки где хранятся изображения.
                'path' => '@webroot/image/content', // Или абсолютный путь к папке с изображениями.
//                'options' => [
//                    'only' => [],
//                ]
//                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
            ],
//
//            'image-upload' => [
//                'class' => 'vova07\imperavi\actions\UploadFileAction',
//                'url' => '/uploads/', // Directory URL address, where files are stored.
//                'path' => '@webroot/uploads/' // Or absolute path to directory where files are stored.
//            ],
//            'images-get' => [
//                'class' => 'vova07\imperavi\actions\GetImagesAction',
//                'url' => '/uploads/', // URL адрес папки где хранятся изображения.
//                'path' => '@webroot/uploads/', // Или абсолютный путь к папке с изображениями.
////                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
//            ],
        ];
    }

}
