<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу страниц.
 */
class m190506_222655_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'key' => $this->string(64)->notNull()->unique()->comment('Уникальный ключ'),
            'title' => $this->string(512)->notNull()->comment('Заголовок'),
            'description' => $this->string(512)->null()->comment('Meta-описание'),
            'content' => $this->text()->null()->comment('Текст'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создана'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлена'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%pages}}', 'Страницы');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
