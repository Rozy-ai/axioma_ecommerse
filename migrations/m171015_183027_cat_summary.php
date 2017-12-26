<?php

use yii\db\Migration;

class m171015_183027_cat_summary extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up() {
        $this->createTable('{{%cat_summary}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->comment('Продукт'),
            'category_id' => $this->integer()->comment('Категория'),
            'category_default' => $this->integer()->comment('Категория по-умолчанию'),
        ]);
    }

    public function down() {
        echo "m171015_183027_cat_summary cannot be reverted.\n";

        return false;
    }

}
