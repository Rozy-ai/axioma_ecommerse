<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
//use ZipArchive;
use app\models\Category2;
use yii\helpers\Inflector;

class ShortNamesController extends Controller {

    public function actionIndex() {

        echo 'start import';


        $row = 1;

        $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
//                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.xlsx',
                    'fileName' => Yii::getAlias('@app') . '/commands/_short_names.ods',
                    'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                    'getOnlySheet' => 'Лист1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);



        foreach ($data as $k => $item):

            $model = \app\modules\products\models\Product::findOne(['article' => $item['A']]);

            if ($model) {

                echo $model->id . PHP_EOL;

                $model->header = $item['D'];
                $model->short_name = $item['C'];
                $model->save();
            }


//            print_r($item);

        endforeach;
    }

}
