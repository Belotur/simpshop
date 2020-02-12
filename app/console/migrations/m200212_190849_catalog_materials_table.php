<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника материалов.
 */
class m200212_190849_catalog_materials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%materials}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование материала'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ]);

        $this->addCommentOnTable('{{%materials}}', 'Справочник материалов');

        $this->createIndex('UX_material_name', '{{%materials}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_material_is_deleted', '{{%materials}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200212_190849_catalog_materials_table cannot be reverted.\n";

        $this->dropIndex('UX_material_name', '{{%materials}}');

        $this->dropIndex('IX_material_is_deleted', '{{%materials}}');

        $this->dropTable('{{%materials}}');
    }
}
