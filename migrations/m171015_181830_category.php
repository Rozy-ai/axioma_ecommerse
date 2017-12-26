<?php

use yii\db\Migration;

class m171015_181830_category extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up() {

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->comment('Родитель'),
            'title' => $this->string(255)->comment('Заголовок'),
            'uri' => $this->string(255)->comment('Url'),
            'preview' => $this->text()->comment('Превью'),
            'content' => $this->text()->comment('Содержание'),
            'image' => $this->string()->comment('Изображение'),
            'ord' => $this->integer()->comment('Порядок'),
            'seo_title' => $this->string(255)->comment('SEO Title'),
            'seo_description' => $this->string(255)->comment('SEO Description'),
            'seo_keywords' => $this->string(255)->comment('SEO Keyword'),
            'created_at' => $this->integer()->notNull()->comment('Создано'),
        ]);
    }

    public function down() {
        echo "m171015_181830_category cannot be reverted.\n";

        return false;
    }

}
