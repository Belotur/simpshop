<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу производителей manufacturers
 */
class m200209_162719_catalog_manufacturers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%manufacturers}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(128)->unique()->notNull()->comment('Название производителя'),
            'info' => $this->string(250)->comment('Информация о производителе'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления')
        ]);
        $this->addCommentOnTable('{{%manufacturers}}', 'Производители');

        $this->createIndex('UX_manufacturer_name', '{{%manufacturers}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_manufacturer_is_deleted', '{{%manufacturers}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200209_162719_catalog_manufacturers_table cannot be reverted.\n";

        $this->dropIndex('UX_manufacturer_name', '{{%manufacturers}}');

        $this->dropIndex('IX_manufacturer_is_deleted', '{{%manufacturers}}');

        $this->dropTable('{{%manufacturers}}');
    }
}
