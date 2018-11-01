<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller {

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world') {
        echo $message . "\n";
    }

    public function actionTest($message = 'Деакт') {
        $searchModel = new \app\modules\products\models\ProductSearch();
        $dataProvider = $searchModel->search(
                ['ProductSearch' => ['header' => $message]]
        );

        print_r($dataProvider);

        $models = $dataProvider->getModels();

        foreach ($models as $item):
            echo $item->header . PHP_EOL;
        endforeach;
    }

    public function actionEnableProducts() {

        \app\modules\products\models\Product::updateAll(['is_enable' => 1]);
    }

    public function actionUpdateProducts() {

        $model = \app\modules\products\models\Product::find()->all();

        foreach ($model as $item):

            $str = $item->content_characteristics;

            $str = str_replace(PHP_EOL, '<br/>', $str);
            echo $str;
            $item->content_characteristics = $str;
            $item->is_enable = 1;
            $item->save();

//            foreach ($item)

        endforeach;

//        \app\modules\products\models\Product::updateAll(['is_enable' => 1]);
    }

}
