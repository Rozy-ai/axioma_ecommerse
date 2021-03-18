<?php

use yii\db\Migration;

/**
 * Class m210318_035233_modify_table_fastcat
 */
class m210318_035233_modify_table_fastcat extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('fast_category', 'link', $this->string(500)->comment('Альтернативная ссылка'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m210318_035233_modify_table_fastcat cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m210318_035233_modify_table_fastcat cannot be reverted.\n";

      return false;
      }
     */
}
