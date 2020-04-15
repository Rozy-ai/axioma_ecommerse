<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use ZipArchive;
use app\models\Category2;
use yii\helpers\Inflector;

class FastCatController extends Controller {

    public function actionIndex() {

        echo 'start import';


        $row = 1;

        $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
//                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.xlsx',
                    'fileName' => Yii::getAlias('@app') . '/commands/fast_cat.ods',
                    'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                    'getOnlySheet' => 'Лист3', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);



        foreach ($data as $k => $item):

//                print_r($item) . PHP_EOL;
//                print_r($k) . PHP_EOL;
//                exit();

            if (isset($item['Артикул']) && $item['Артикул']) {
                echo $item['Артикул'] . PHP_EOL;

                $model = \app\modules\products\models\Product::findOne(['article' => $item['Артикул']]);

                echo $model->id . PHP_EOL;
                $model->fastcat_id = $item['cat'];

                if ($item['is_akust'])
                    $model->is_akustika = 1;

                if ($item['is_radio'])
                    $model->is_radio = 1;

                $model->ord = $item['order'];

//                $model->category_id = $cat_->id;
//                $model->article = isset($item['Артикул']) ? $item['Артикул'] : '';
////                    $model->header = isset($item['Наименование']) ? $item['Наименование'] : '';
//                $model->header = isset($item['name']) ? $item['name'] : '';
//                $model->url = \app\components\Translite::str2url($model->header);
//                $model->content_info = isset($item['Продукция']) ? $item['Продукция'] : '';
//                $model->content_description = isset($item['Описание']) ? $item['Описание'] : '';
//                $model->content_characteristics = isset($item['Техн. характеристики']) ? $item['Техн. характеристики'] : '';
//                $model->price = isset($item['Цена']) ? $item['Цена'] : '';
//                $model->content_install = isset($item['Схема расстановки']) ? $item['Схема расстановки'] : '';
//                $model->product_type = isset($item['Расходники']) ? $item['Расходники'] : 0;
//
                if ($model->save())
                    ;
                else
                    ;
                print_r($model->errors);
            }

        endforeach;
    }

}
