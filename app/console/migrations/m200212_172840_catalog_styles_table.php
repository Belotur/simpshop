<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника стилей.
 */
class m200212_172840_catalog_styles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%styles}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ]);

        $this->addCommentOnTable('{{%styles}}', 'Справочник стилей');

        $this->createIndex('UX_styles_name', '{{%styles}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_styles_is_deleted', '{{%styles}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200212_172840_catalog_styles_table cannot be reverted.\n";

        $this->dropIndex('UX_styles_name', '{{%styles}}');

        $this->dropIndex('IX_styles_is_deleted', '{{%styles}}');

        $this->dropTable('{{%styles}}');
    }
}
