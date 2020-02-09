<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника types
 */
class m200209_210645_catalog_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%types}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(128)->unique()->notNull()->comment('Название типа'),
            'description' => $this->string(250)->null()->comment('Пояснение')
        ]);
        $this->addCommentOnTable('{{%types}}', 'Справочник типов продуктов');

        $this->createIndex('IX_types', '{{%types}}', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200209_210645_catalog_types_table cannot be reverted.\n";

        $this->dropIndex('IX_types', '{{%types}}');

        $this->dropTable('{{%types}}');
    }
}
