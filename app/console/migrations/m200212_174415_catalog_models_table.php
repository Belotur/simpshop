<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника моделей.
 */
class m200212_174415_catalog_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%models}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование модели'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создана'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлёна'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ]);

        $this->addCommentOnTable('{{%models}}', 'Справочник моделей');

        $this->createIndex('UX_model_name', '{{%models}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_model_is_deleted', '{{%models}}', ['is_deleted']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200212_174415_catalog_models_table cannot be reverted.\n";

        $this->dropIndex('UX_model_name', '{{%models}}');

        $this->dropIndex('IX_model_is_deleted', '{{%models}}');

        $this->dropTable('{{%models}}');
    }
}
