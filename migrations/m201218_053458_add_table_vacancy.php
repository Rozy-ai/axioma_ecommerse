<?php

use yii\db\Migration;

/**
 * Class m201218_053458_add_table_vacancy
 */
class m201218_053458_add_table_vacancy extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('vacancy', [
            'id' => $this->primaryKey(),
            'name' => $this->string(500)->comment('Название должности'),
            'description' => $this->text()->comment('Требования'),
            'pay' => $this->string(100)->comment('З/П'),
            'city_id' => $this->integer()->comment('Город'),
            'is_close' => $this->integer(1)->comment('Вакансия закрыта'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m201218_053458_add_table_vacancy cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m201218_053458_add_table_vacancy cannot be reverted.\n";

      return false;
      }
     */
}
