<?php

namespace app\modules\catalog\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\products\models\Product;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class XmlController extends Controller {

    const COUNTRY = 'Россия';

    public function actionYml() {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        Yii::$app->response->formatters = [
            'xml' => [
                'class' => 'app\modules\catalog\components\XmlResponseFormatter',
                'rootTag' => 'yml_catalog',
                'itemTag' => 'shop',
            ],
        ];
//        Yii::$app->response->charset = 'Windows-1251';
//        \Yii::$app->response->;

        $models = Product::find()->where(['is_enable' => 1])->all(); // Потом добавить фильтры

        $result = [];
        foreach ($models as $model):

            $item['offers'] = [
//                ['__CUSTOM', 'attr' => ['name' => 'value']],
                'id' => $model->id, // id
                'topic' => $this->cData($model->header), // имя объявы
            ];

//            if ($model->images) {
//
//                $img = [];
//
//                foreach ($model->images as $k => $image):
//                    $img['img' . ( ++$k)] = Url::toRoute('/upload/advert/' . $image->image, true);
//                endforeach;
//                $item = $item + $img;
//            }




            $result[] = $item;

        endforeach;

//        $array = ['a' => 'AX', 'b' => 'BZ', 'c' => '<![CDATA[<sender>John Smith</sender>]]>'];
//        Yii::$app->response->data = $array;

        return $result;
    }

    public function actionYandex() {

        /*
         * https://yandex.ru/support/realty/requirements/requirements-sale-housing.html
         */

        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        Yii::$app->response->formatters = [
            'xml' => [
                'class' => 'app\modules\advert_object\components\XmlResponseFormatter',
                'target' => 'yandex',
                'rootTag' => 'realty-feed',
                'itemTag' => 'offer',
            ],
        ];
//        \Yii::$app->response->;

        $models = AdvertObject::find()->with(['city', 'region', 'images'])->all(); // Потом добавить фильтры

        $result = [];
        foreach ($models as $model):

            $item = [
                'id' => $model->id,
                'type' => 'аренда',
                'property-type' => 'жилая',
//                'category' => $model::OBJECT[$model->object], //	Категория объекта.
                'category' => $model->object, //	Категория объекта.
                'url' => Url::toRoute(['xml/view', 'id' => $model->id], true),
                'creation-date' => date('Y-m-d\TH:m:s+05:00', $model->publish_at),
                'last-update-date' => date('Y-m-d\TH:m:s+05:00', $model->updated_at),
                'expire-date' => date('Y-m-d\TH:m:s+05:00', $model->end_at),
                'location' => [
                    'country' => self::COUNTRY,
                    'locality-name' => $model->city->name,
                    'address' => "{$model->street} {$model->house_number} ",
//                    'place' => '', //  район
//                    'street' => $model->street,
//                    'subway' => $model->subway,
//                    'house' => $model->house_number,
                ],
//                'renovation' => $model->is_repair,
                'rooms' => $model->room_number,
                'rooms-offered' => $model->room_number,
                'description' => $model->full_description,
//                'new-flat' => 0,
//                'mortage' => $this->cData($model->end_at),
//            options
                'open-plan' => $model->is_open_plan,
                'internet' => $model->is_internet,
                'phone' => $model->is_phone,
                'room-furniture' => $model->is_room_furniture,
                'kitchen-furniture' => $model->is_kitchen_furniture,
                'television' => $model->is_tv,
                'washing-machine' => $model->is_washing_machine,
                'refrigerator' => $model->is_refrigerator,
                'lift' => $model->is_lift,
                'rubbish-chute' => $model->is_rubbish_chute,
//                'with-pets' => $model->is_with_pets,
//                'with-children' => $model->is_with_children,
//                        contacts
                'sales-agent' => [
                    'phone' => $model->phone,
                    'name' => $model->fio,
                    'organization' => $model->company,
                    'email' => $model->email,
                ],
            ];

            if ($model->price_month)
                $item['price'] = [
                    'value' => $model->price_month,
                    'currency' => 'RUR',
                ];

            if ($model->area_total)
                $item['area'] = [
                    'value' => $model->area_total,
                    'unit' => 'кв. м.',
                ];

            if ($model->area_live)
                $item['living-space'] = [
                    'value' => $model->area_live,
                    'unit' => 'кв. м.',
                ];

            if ($model->area_kitchen)
                $item['kitchen-space'] = [
                    'value' => $model->area_kitchen,
                    'unit' => 'кв. м.',
                ];

            if ($model->images) {

                $img = [];

                foreach ($model->images as $k => $image):
                    $img['image'] = Url::toRoute('/upload/advert/' . $image->image, true);
                endforeach;
                $item = $item + $img;
            }




            $result[] = $item;

        endforeach;

//        $array = ['a' => 'AX', 'b' => 'BZ', 'c' => '<![CDATA[<sender>John Smith</sender>]]>'];
//        Yii::$app->response->data = $array;

        return $result;
    }

    public function cData($text) {
//        return '<![CDATA[' . $text .']]>';
        return trim($text);
    }

}
