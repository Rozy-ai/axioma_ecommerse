<?php

namespace app\modules\sitemap\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\modules\content\models\Content;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndexWeb() {
        
    }

    public function actionIndex() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');

        $urls = [];

//        // Страницы
//        $posts = \app\modules\page\models\Page::find()->all();
//        foreach ($posts as $post) {
//            $urls[] = Url::to($post->url);
//        }
        // Быстрые категории
        $cats = \app\modules\fast_category\models\FastCategory::find()->where(['is_enable' => 1])->all();
        foreach ($cats as $cat) {
            $urls[] = Url::to('category/' . $cat->url);

            $goods = \app\modules\catalog\models\Catalog::find()->where(['category_id' => $cat->id, 'is_enable' => 1])->all();

            foreach ($goods as $good)
                $urls[] = Url::to('catalog/' . $good->url);
        }

        // Категории
        $cats = \app\modules\category\models\Category::find()->where(['is_enable' => 1])->all();
        foreach ($cats as $cat) {
            $urls[] = Url::to('category/' . $cat->url);

            $goods = \app\modules\catalog\models\Catalog::find()->where(['category_id' => $cat->id, 'is_enable' => 1])->all();

            foreach ($goods as $good)
                $urls[] = Url::to('catalog/' . $good->url);
        }

        // Новости
        $news = Content::find()->where(['type_id' => 3])->all();
        foreach ($news as $new)
            $urls[] = Url::to($new->url);

        // Статьи
        $statis = Content::find()->where(['type_id' => 4])->all();
        foreach ($statis as $stati)
            $urls[] = Url::to($stati->url);

        // Услуги
        $uslugi = Content::find()->where(['type_id' => 2])->all();
        ;
        foreach ($uslugi as $uslug)
            $urls[] = Url::to($uslug->url);

//        $arr = explode('.', $_SERVER['HTTP_HOST']);
//        echo Yii::$app->request->hostInfo;
//        exit();
//        $host = (isset($arr[0]) && count($arr) == 3) ? $arr[0] . Yii::$app->request->hostInfo : Yii::$app->request->hostInfo;
        $host = Yii::$app->request->hostInfo;

        /*
          $result = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
         *
         */
        $result = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $result .= "<url>
                <loc> $host</loc>
                <changefreq>daily</changefreq>
                <priority>1</priority>
            </url>
            <url>
                <loc> {$host}/catalog</loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>
            <url>
                <loc> {$host}/uslugi</loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>
            <url>
                <loc> {$host}/novosti</loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>
            <url>
                <loc> {$host}/o_kompanii</loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>
            <url>
                <loc> {$host}/kontaktyi</loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>";


        foreach ($urls as $url) {
            $result .= "<url>
                <loc> $host/$url </loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>";
        }
        $result .= '</urlset>';

        return $this->renderPartial('index', [
                    'result' => $result
        ]);
    }

}
