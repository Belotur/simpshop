<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника размеров.
 */
class m200212_184403_catalog_sizes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sizes}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'range' => $this->smallInteger()->notNull()->comment('Ранг размера'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ]);

        $this->addCommentOnTable('{{%sizes}}', 'Справочник размеров');

        $this->createIndex('UX_sizes_name', '{{%sizes}}', ['name', 'range'], true);

        $this->createIndex('IX_sizes_is_deleted', '{{%sizes}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200212_184403_catalog_sizes_table cannot be reverted.\n";

        $this->dropIndex('UX_sizes_name', '{{%sizes}}');

        $this->dropIndex('IX_sizes_is_deleted', '{{%sizes}}');

        $this->dropTable('{{%sizes}}');
    }
}
