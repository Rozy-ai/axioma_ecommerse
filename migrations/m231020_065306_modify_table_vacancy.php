<?php

use yii\db\Migration;

/**
 * Class m231020_065306_modify_table_vacancy
 */
class m231020_065306_modify_table_vacancy extends Migration
{
    /**
     * {@inheritdoc}
     */
    // public function safeUp()
    // {

    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    //     echo "m231020_065306_modify_table_vacancy cannot be reverted.\n";

    //     return false;
    // }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->alterColumn('vacancy', 'created_at', $this->integer()->null()->comment('Выложено'));
    }

    public function down()
    {
        $this->alterColumn('vacancy', 'created_at', $this->integer()->notNull()->comment('Выложено'));

        return false;
    }
    
}
