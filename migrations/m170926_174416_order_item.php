<?php

use yii\db\Migration;

class m170926_174416_order_item extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up() {

        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'good_id' => $this->integer(),
            'name' => $this->string(255),
            'count' => $this->integer(),
            'price' => $this->float(),
        ]);
    }

    public function down() {
        echo "m170926_174416_order_item cannot be reverted.\n";

        return false;
    }

}
