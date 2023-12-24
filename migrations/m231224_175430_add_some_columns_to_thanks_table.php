<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%thanks}}`.
 */
class m231224_175430_add_some_columns_to_thanks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('thanks', 'employee_name', $this->string(255));
        $this->addColumn('thanks', 'employee_job', $this->string(255));
        $this->addColumn('thanks', 'content', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231224_175430_add_some_columns_to_thanks_table cannot be reverted.\n";

        return false;
    }
}
