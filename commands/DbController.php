<?php

namespace app\commands;

use yii\console\Controller;
use Yii;

class DbController extends Controller {

    public function actionUpdate() {
        $sql = 'SHOW TABLES';
        $tables = Yii::$app->db
                ->createCommand($sql)
                ->queryAll();

        $dir = __DIR__ . '/../';

        foreach ($tables as $table):

            $name = str_replace(' ', '', ucwords(str_replace('_', ' ', $table['Tables_in_axioma'])));
            echo $name . PHP_EOL;

            $command = "{$dir}/yii gii/model --tableName={$table['Tables_in_axioma']} "
                    . "--modelClass={$name} --baseClass='app\models\CustomAR'"
                    . " --interactive=0 --generateLabelsFromComments=1 --overwrite==1";
//            echo $command . PHP_EOL;
            exec($command);
        endforeach;
    }

}
