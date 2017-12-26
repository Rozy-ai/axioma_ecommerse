<?php

use yii\db\Migration;

class m170716_082326_client extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up() {

        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'file_name' => $this->string(255),
            'ord' => $this->integer(),
        ]);
    }

    public function down() {
        echo "m170716_082326_brand cannot be reverted.\n";

        return false;
    }

}
