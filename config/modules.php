<?php

use kartik\datecontrol\Module;

//echo __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modules'; die;
$dir = scandir(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'modules');
$modules = [];
$modulesNames = [];
foreach ($dir as $item) {
    if (is_dir(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $item) && $item != '.' && $item != '..') {
        /**
         * @var $moduleClass \app\base\Module
         */
        $moduleClass = '\app\modules\\' . $item . '\Module';
        $modules[$item] = [
            'class' => $moduleClass,
        ];

        $modulesNames[] = $item;
    }
}

$modules['treemanager'] = ['class' => '\kartik\tree\Module',];
$modules['gridview'] = ['class' => '\kartik\grid\Module',];
$modules['datecontrol'] = [
    'class' => 'kartik\datecontrol\Module',
    // format settings for displaying each date attribute (ICU format example)
    'displaySettings' => [
        Module::FORMAT_DATE => 'dd-MM-yyyy',
        Module::FORMAT_TIME => 'hh:mm:ss a',
        Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
    ],
    // format settings for saving each date attribute (PHP format example)
    'saveSettings' => [
        Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
        Module::FORMAT_TIME => 'php:U',
        Module::FORMAT_DATETIME => 'php:U',
    ],
    // set your display timezone
    'displayTimezone' => 'Asia/Kolkata',
    // set your timezone for date saved to db
    'saveTimezone' => 'UTC',
    // automatically use kartik\widgets for each of the above formats
    'autoWidget' => true,
    // default settings for each widget from kartik\widgets used when autoWidget is true
    'autoWidgetSettings' => [
        Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
        Module::FORMAT_DATETIME => [], // setup if needed
        Module::FORMAT_TIME => [], // setup if needed
    ],
    // custom widget settings that will be used to render the date input instead of kartik\widgets,
// this will be used when autoWidget is set to false at module or widget level.
    'widgetSettings' => [
        Module::FORMAT_DATE => [
            'class' => 'yii\jui\DatePicker', // example
            'options' => [
                'dateFormat' => 'php:d-M-Y',
                'options' => ['class' => 'form-control'],
            ]
        ]
    ]
// other settings
];


return $modules;
