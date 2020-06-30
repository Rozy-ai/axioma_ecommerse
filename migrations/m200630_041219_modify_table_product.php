<?php

use yii\db\Migration;

/**
 * Class m200630_041219_modify_table_product
 */
class m200630_041219_modify_table_product extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('product', 'short_name', $this->string(500)->comment('Короткое название'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200630_041219_modify_table_product cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200630_041219_modify_table_product cannot be reverted.\n";

      return false;
      }
     */
}
