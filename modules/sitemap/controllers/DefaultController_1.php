<?php

namespace app\modules\sitemap\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController1 extends Controller {

    public function actionIndex() {

        $urls = [];

//        // Страницы
//        $posts = \app\modules\page\models\Page::find()->all();
//        foreach ($posts as $post) {
//            $urls[] = Url::to($post->url);
//        }
        // Категории
        $cats = \app\modules\category\models\Category::find()->where(['show' => 1])->all();
        foreach ($cats as $cat) {
            $urls[] = Url::to('category/' . $cat->uri);

            $goods = \app\modules\catalog\models\Catalog::find()->where(['parent_id' => $cat->id, 'act' => 1])->all();

            foreach ($goods as $good)
                $urls[] = Url::to('catalog/' . $good->url);
        }

        // Новости
        $news = \app\modules\novosti\models\News::getAll();
        foreach ($news as $new)
            $urls[] = Url::to($new->url);

        // Статьи
        $statis = \app\modules\stati\models\Stati::getAll();
        foreach ($statis as $stati)
            $urls[] = Url::to($stati->url);

        // Услуги
        $uslugi = \app\modules\uslugi\models\Uslugi::getAll();
        foreach ($uslugi as $uslug)
            $urls[] = Url::to($uslug->url);

        $host = Yii::$app->request->hostInfo;

        echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        echo "<url>
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
            echo "<url>
                <loc> $host/$url </loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>";
        }
        echo '</urlset>';
        Yii::$app->end();

//        return $this->render('index', [
//        ]);
    }

}
