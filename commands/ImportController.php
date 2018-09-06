<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\modules\stati\models\Stati;
use \app\modules\novosti\models\News;
use app\modules\uslugi\models\Uslugi;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ImportController extends Controller {

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionStati() {

        \app\modules\content\models\Content::deleteAll(['type_id' => 4]);

        $model = Stati::find()->where(['parent_id' => Stati::PARENT_ID])
                        ->orderBy(['create_time' => SORT_DESC])->all();

        foreach ($model as $item):

            echo $item->id . PHP_EOL;
            $content = new \app\modules\content\models\Content;
            $content->type_id = 4;
            $content->header = $item->h1 ? $item->h1 : $item->name;
            $content->image = $item->image;
            $content->url = $item->url;
            $content->content = $item->content;
            $content->ord = $item->ord;
            $content->title = $item->title;
            $content->description = $item->description;
            $content->keywords = $item->keywords;
            $content->is_enable = 1;
            $content->save();



        endforeach;
    }

    public function actionNews() {

        \app\modules\content\models\Content::deleteAll(['type_id' => 3]);

        $model = News::find()->where(['model' => News::MODEL])
                        ->orderBy(['news_date' => SORT_DESC])->all();

        foreach ($model as $item):

            echo $item->id . PHP_EOL;
            $content = new \app\modules\content\models\Content;
            $content->type_id = 3;
            $content->header = $item->h1 ? $item->h1 : $item->name;
            $content->image = $item->image;
            $content->url = $item->url;
            $content->content = $item->content;
            $content->ord = $item->ord;
            $content->title = $item->title;
            $content->description = $item->description;
            $content->keywords = $item->keywords;
            $content->is_enable = 1;
            $content->save();



        endforeach;
    }

    public function actionUslugi() {

        \app\modules\content\models\Content::deleteAll(['type_id' => 2]);

        $model = Uslugi::find()->where(['parent_id' => Uslugi::PARENT_ID])
                        ->orderBy(['news_date' => SORT_DESC])->all();

        foreach ($model as $item):

            echo $item->id . PHP_EOL;
            $content = new \app\modules\content\models\Content;
            $content->type_id = 2;
            $content->header = $item->h1 ? $item->h1 : $item->name;
            $content->image = $item->image;
            $content->url = $item->url;
            $content->content = $item->content;
            $content->ord = $item->ord;
            $content->title = $item->title;
            $content->description = $item->description;
            $content->keywords = $item->keywords;
            $content->is_enable = 1;
            $content->save();



        endforeach;
    }

}
