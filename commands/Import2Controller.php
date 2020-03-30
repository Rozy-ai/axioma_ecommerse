<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use ZipArchive;
use app\models\Category2;
use yii\helpers\Inflector;

class Import2Controller extends Controller {

    public function actionIndex() {



        echo 'start import';


        $row = 1;

        $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
//                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.xlsx',
                    'fileName' => Yii::getAlias('@app') . '/commands/export.ods',
                    'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                    'getOnlySheet' => 'Worksheet', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        foreach ($data as $n => $cat):

            $model = \app\modules\products\models\Product::findOne((int) $cat['ID']);

            if ($model) {

                $category = \app\models\Category::findone(['header' => $cat['Категория']]);

                if ($category)
                    $model->category_id = $category->id;

                if ($cat['Акустомагнитные'])
                    $model->type = 1;

                if ($cat['Радиочастотные'])
                    $model->type = 2;

                $model->save();
            }

            print_r($cat);


            $row++;
        endforeach;
    }

}
