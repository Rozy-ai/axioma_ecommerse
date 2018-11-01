<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use ZipArchive;
use app\models\Category2;
use yii\helpers\Inflector;

class ImportCatalogController extends Controller {

    public function actionIndex() {



        echo 'start import';
        Yii::$app->db->createCommand()->checkIntegrity(false)->execute();
        Yii::$app->db->createCommand()->truncateTable('product')->execute();
        Yii::$app->db->createCommand()->truncateTable('category2')->execute();
        Yii::$app->db->createCommand()->checkIntegrity(true)->execute();


        $row = 1;

        $data = \moonland\phpexcel\Excel::widget([
                    'mode' => 'import',
//                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.xlsx',
                    'fileName' => Yii::getAlias('@app') . '/commands/catalog.ods',
                    'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                    'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
//                    'getOnlySheet' => 'Sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        foreach ($data as $n => $cat):

            $cat_ = new Category2();
            $cat_->header = $n;
            $cat_->ord = $row;
            echo $n . PHP_EOL;
            $cat_->url = \app\components\Translite::str2url($n);
            $cat_->is_enable = 1;
            if ($cat_->save())
                ;
            else
//                ;
                print_r($cat_->errors);

            foreach ($cat as $k => $item):

//                print_r($item) . PHP_EOL;
//                print_r($k) . PHP_EOL;
//                exit();

                if (isset($item['Артикул']) && $item['Артикул']) {
                    echo $item['Наименование'] . PHP_EOL;

                    $model = new \app\modules\products\models\Product;
                    $model->category_id = $cat_->id;
                    $model->article = isset($item['Артикул']) ? $item['Артикул'] : '';
//                    $model->header = isset($item['Наименование']) ? $item['Наименование'] : '';
                    $model->header = isset($item['name']) ? $item['name'] : '';
                    $model->url = \app\components\Translite::str2url($model->header);
                    $model->content_info = isset($item['Продукция']) ? $item['Продукция'] : '';
                    $model->content_description = isset($item['Описание']) ? $item['Описание'] : '';
                    $model->content_characteristics = isset($item['Техн. характеристики']) ? $item['Техн. характеристики'] : '';
                    $model->price = isset($item['Цена']) ? $item['Цена'] : '';
                    $model->content_install = isset($item['Схема расстановки']) ? $item['Схема расстановки'] : '';
                    $model->product_type = isset($item['Расходники']) ? $item['Расходники'] : 0;

                    if ($model->save())
                        ;
                    else
                        ;
//                        print_r($model->errors);
                }

            endforeach;


//            var_dump($item);
////            exit();
////            echo $item['№ всего'] . PHP_EOL;
//            if ($item['№']) {
//                $model = new \app\modules\place\models\Place;
//                $model->id = (int) str_replace('.', '', (string) $item['ID']);
//                $model->project_id = $this->getProjectId($item['Проект']);
////                $model->place_name = $item['Пункт'];
//                $model->district = $item['Субъект'];
//                $model->address = $model->place_name = $item['Адрес'];
////                $model->square = $item['площадь зу'];
//                $model->height = (int) $item['высота'];
//                $model->building_type = $item['Вид сооружения'];
//                $model->owner = $item['Собственник'];
////                $model->lat = $item['Е (запад)'];
////                $model->long = $item['N (север)'];
////                $model->cadastr = $item['кадастровый квартал'];
////                $model->in_date = (int) strtotime($item['дата строительства по договору']);
//
//                if (!$model->save())
//                    print_r($model->errors);
//
////                exit();
//            }
            $row++;
        endforeach;
    }

    public function actionTest() {

        echo \app\components\Translite::Generate('Тест');
        echo \app\components\Translite::str2url('Тест');
    }

    public function actionUpdateImage() {

        Yii::$app->db->createCommand()->truncateTable('product_image')->execute();

        $model = \app\modules\products\models\Product::find()->all();

        foreach ($model as $item):

            echo $item->article . PHP_EOL;

//            echo '___' . Yii::getAlias('@app') . PHP_EOL;
            echo '___' . Yii::getAlias('@app') . "/web/image/catalog/" . $item->article . "*" . PHP_EOL;

            foreach (glob(Yii::getAlias('@app') . "/web/image/catalog/" . $item->article . "*") as $k => $filename) {

                echo basename($filename) . PHP_EOL;

                $image = new \app\models\ProductImage();
                $image->image = basename($filename);
                $image->product_id = $item->id;
                $image->order = $k;
                $image->is_main = ($k == 0) ? 1 : 0;

                if ($image->save())
                    ;
                else
                    print_r($image->errors);
            }

            if (!glob(Yii::getAlias('@app') . "/web/image/catalog/" . $item->article . "*"))
                echo $item->article . PHP_EOL;

        endforeach;
    }

}
