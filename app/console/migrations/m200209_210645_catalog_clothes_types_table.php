<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника типов одежды clothes_types
 */
class m200209_210645_catalog_clothes_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clothes_types}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(128)->unique()->notNull()->comment('Название типа'),
            'description' => $this->string(250)->null()->comment('Пояснение'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создана'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления типа одежды')
        ]);
        $this->addCommentOnTable('{{%clothes_types}}', 'Справочник типов одежды');

        $this->createIndex('UX_clothes_type_name', '{{%clothes_types}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_clothes_type_is_deleted', '{{%clothes_types}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200209_210645_catalog_clothes_types_table cannot be reverted.\n";

        $this->dropIndex('UX_clothes_type_name', '{{%clothes_types}}');

        $this->dropIndex('IX_clothes_type_is_deleted', '{{%clothes_types}}');

        $this->dropTable('{{%clothes_types}}');
    }
}
