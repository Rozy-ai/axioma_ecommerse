<?php

use yii\db\Migration;

class m170925_155658_cart extends Migration {

    public function up() {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'session' => $this->string(),
            'product_id' => $this->integer(),
            'count' => $this->integer(),
        ]);
    }

    public function down() {
        echo "m170925_155658_cart cannot be reverted.\n";

        return false;
    }

}
