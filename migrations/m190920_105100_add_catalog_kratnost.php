<?php

use yii\db\Migration;

/**
 * Class m190920_105100_add_catalog_kratnost
 */
class m190920_105100_add_catalog_kratnost extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->addColumn('product', 'krat', $this->integer(11)->defaultValue(1)->comment('Кратность для заказа'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
//        echo "m190920_105100_add_catalog_kratnost cannot be reverted.\n";

        $this->dropColumn('product', 'krat');
        return true;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m190920_105100_add_catalog_kratnost cannot be reverted.\n";

      return false;
      }
     */
}
