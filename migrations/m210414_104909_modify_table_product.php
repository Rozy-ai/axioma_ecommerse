<?php

use yii\db\Migration;

/**
 * Class m210414_104909_modify_table_product
 */
class m210414_104909_modify_table_product extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('product', 'online_kass_type', $this->integer()->comment('Тип для Онлайн-касс'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m210414_104909_modify_table_product cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m210414_104909_modify_table_product cannot be reverted.\n";

      return false;
      }
     */
}
