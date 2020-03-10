<?php

use yii\db\Migration;

class m170920_061537_user extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up() {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'role' => $this->smallInteger()->notNull()->defaultValue(3),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->insert('user', [
            'id' => '1',
            'username' => 'admin',
            'password_hash' => '$2y$13$cmV3ZuKgnCRQuLPncxEN5eXxe7u4/6tUJXYAfmY.kyN4BmKdjc8ay',
            'email' => 'info@kognitiv.ru',
            'role' => 1,
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function down() {
        echo "m170920_061537_user cannot be reverted.\n";

        return false;
    }

}
