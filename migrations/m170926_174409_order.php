<?php

use yii\db\Migration;

class m170926_174409_order extends Migration {

    public function up() {

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'client_name' => $this->string(255),
            'email' => $this->string(255),
            'phone' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    public function down() {
        echo "m170926_174409_order cannot be reverted.\n";

        return false;
    }

}
