<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$db2 = require(__DIR__ . '/db2.php');
$modules = require_once(__DIR__ . '/modules.php');
$aliases = require(__DIR__ . '/aliases.php');


$config = [
    'id' => 'basic',
    'name' => 'Аксиома',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => $aliases,
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:j F, H:i',
            'timeFormat' => 'php:H:i:s',
            'defaultTimeZone' => 'Europe/Moscow',
            'locale' => 'ru-RU',
            'numberFormatterOptions' => [
                NumberFormatter::DECIMAL_SEPARATOR_SYMBOL => '.',
                NumberFormatter::MAX_FRACTION_DIGITS => 2,
                NumberFormatter::MIN_FRACTION_DIGITS => 0,
            ],
            'numberFormatterSymbols' => [
                NumberFormatter::CURRENCY_SYMBOL => '₽',
            ],
            'nullDisplay' => '',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lAY7hnMW853jpsz1y8s3cD-yfYzQFDBD',
            'baseUrl' => '',
        ],
//        'view' => [
//            'class' => 'app\components\CustomView',
//        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'city' => [
            'class' => 'app\modules\city\City',
        ],
        'yon' => [
            'class' => 'app\components\YesNo',
        ],
        'info' => [
            'class' => 'app\modules\info\models\Info',
        ],
        'view' => [
            'class' => 'app\components\View',
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => [
                        'Url' => ['class' => '\yii\helpers\Url'],
                        'Html' => ['class' => '\yii\helpers\Html'],
                    ],
                    'filters' => [
                        'dump' => 'var_dump'
                    ],
                    'uses' => ['yii\bootstrap'],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'app\modules\auth\models\User',
            'loginUrl' => ['/auth/default/login'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'viewPath' => '@app/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'noreply@axioma.pro',
                'password' => '$Axi2049510Axi$',
                'port' => '25', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
//        'db_old' => $db2,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                '/captcha' => 'site/captcha',
                '/yml' => 'YandexMarketYml/default/index',
                '/root' => '/auth/default/login',
                '/sitemap.xml' => '/sitemap/default/index',
                '/robots.txt' => '/robots/default/index',
                '/catalog' => '/catalog/default/index',
//                '/subscribe' => '/forms/default/subscribe',
                '/catalog/admin/index' => '/catalog/admin/index',
                '/category/admin/<action:[-\w]+>' => '/category/admin/<action>',
//                '/category/admin/index' => '/category/admin/index',
//                '/category/admin/create' => '/category/admin/create',
//                '/category/admin/refresh' => '/category/admin/refresh',
                '/category/admin/ajax-update/<id:\d+>' => '/category/admin/ajax-update',
                '/category/admin/delete/<id:\d+>' => '/category/admin/delete',
                '/catalog/<uri:[-\w]+>' => 'catalog/default/get',
                '/fast-cat/<category:[-\w\/]+>' => 'fast_category/default/get',
                '/category/<category:[-\w\/]+>' => 'category/default/get',
//                '/category/<category:[-\w]+>/<subcategory:[-\w]+>' => 'category/default/get',
                '/vacancy' => '/vacancy/default/index',
                '/novosti' => '/content/get/news',
                '/portfolio' => '/portfolio/default/index',
                '/stati' => '/content/get/articles',
                '/uslugi' => '/content/get/services',
                '/cart' => '/cart/default/index',
                '/<category:favorite>' => '/fast_category/default/get',
                '/<category:compare>' => '/fast_category/default/get',
                '/search' => '/search/default/index',
                '/enter' => '/auth/default/login',
                '/vacancy' => '/vacancy/default/index',
                '/novosti/<url:[-\w]+>' => 'novosti/default/get',
                '/stati/<url:[-\w]+>' => 'stati/default/get',
                '<module:[-\w]+>/<controller:[-\w]+>/<action:[-\w]+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:[-\w]+>/<controller:[-\w]+>/<action:[-\w]+>' => '<module>/<controller>/<action>',
                '<controller:[-\w]+>/<action:[-\w]+>' => '<controller>/<action>',
                '/<url:[-\w]+>' => 'content/get/one',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@webroot/css/bootstrap',
                    'css' => [
                        'bootstrap.css' => 'bootstrap.css'
                    ]
                ]
            ]
        ],
    ],
    'modules' => $modules,
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
