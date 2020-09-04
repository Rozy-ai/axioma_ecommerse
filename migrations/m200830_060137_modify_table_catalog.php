<?php

use yii\db\Migration;

/**
 * Class m200830_060137_modify_table_catalog
 */
class m200830_060137_modify_table_catalog extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('product', 'youtube_link', $this->string(500)->comment('Ссылка на ютуб'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200830_060137_modify_table_catalog cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200830_060137_modify_table_catalog cannot be reverted.\n";

      return false;
      }
     */
}
