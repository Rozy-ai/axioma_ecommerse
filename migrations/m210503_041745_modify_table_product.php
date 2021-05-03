<?php

use yii\db\Migration;

/**
 * Class m210503_041745_modify_table_product
 */
class m210503_041745_modify_table_product extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('product', 'anons', $this->string()->comment('Анонс'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m210503_041745_modify_table_product cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m210503_041745_modify_table_product cannot be reverted.\n";

      return false;
      }
     */
}
