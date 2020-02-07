<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу цветов.
 */
class m190523_222637_create_colors_table extends Migration
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

        $this->createTable('{{%colors}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'averaged_color' => $this->string(6)->null(),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%colors}}', 'Справочник цветов');

        $this->createIndex('UX_colors_name', '{{%colors}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_colors_is_deleted', '{{%colors}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UX_colors_name', '{{%colors}}');

        $this->dropIndex('IX_colors_is_deleted', '{{%colors}}');

        $this->dropTable('{{%colors}}');
    }
}
