<?php

use yii\db\Migration;

/**
 * Class m200630_041316_add_table_seo_template
 */
class m200630_041316_add_table_seo_template extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('seo_template', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1000)->comment('Шаблон заголовка'),
            'description' => $this->string(1000)->comment('Шаблон описания'),
            'for_id' => $this->integer()->comment('Сущность'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m200630_041316_add_table_seo_template cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m200630_041316_add_table_seo_template cannot be reverted.\n";

      return false;
      }
     */
}
