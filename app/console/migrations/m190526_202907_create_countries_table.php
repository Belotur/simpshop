<?php

use yii\db\Migration;

/**
 * Миграция создаёт таблицу справочника стран.
 */
class m190526_202907_create_countries_table extends Migration
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

        $this->createTable('{{%countries}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'short_name' => $this->string(10)->notNull()->unique()->comment('Сокращённое наименование'),
            'code' => $this->string(4)->notNull()->unique()->comment('Код'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%countries}}', 'Справочник стран');

        $this->createIndex('UX_countries_name', '{{%countries}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_countries_is_deleted', '{{%countries}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UX_countries_name', '{{%countries}}');

        $this->dropIndex('IX_countries_is_deleted', '{{%countries}}');

        $this->dropTable('{{%countries}}');
    }
}
