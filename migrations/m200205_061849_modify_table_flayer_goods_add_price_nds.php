<?php

use yii\db\Migration;

/**
 * Class m200205_061849_modify_table_flayer_goods_add_price_nds
 */
class m200205_061849_modify_table_flayer_goods_add_price_nds extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('flyer_goods', 'price_nds', $this->float()->comment('Цена с НДС'));
        $this->addColumn('flyer_goods', 'price_nds_new', $this->float()->comment('Цена с НДС новая'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200205_061849_modify_table_flayer_goods_add_price_nds cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200205_061849_modify_table_flayer_goods_add_price_nds cannot be reverted.\n";

      return false;
      }
     */
}
