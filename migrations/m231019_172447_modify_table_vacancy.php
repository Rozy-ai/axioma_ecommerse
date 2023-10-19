<?php

use yii\db\Migration;

/**
 * Class m231019_172447_modify_table_vacancy
 */
class m231019_172447_modify_table_vacancy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('vacancy', 'created_at', $this->integer()->notNull()->comment('Выложено'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231019_172447_modify_table_vacancy cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231019_172447_modify_table_vacancy cannot be reverted.\n";

        return false;
    }
    */
}
