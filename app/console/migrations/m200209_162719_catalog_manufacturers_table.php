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
            'info' => $this->string(250)->comment('Информация о производителе')
        ]);
        $this->addCommentOnTable('{{%manufacturers}}', 'Производители');

        $this->createIndex('UX_manufacturers', '{{%manufacturers}}', ['name', 'info']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200209_162719_catalog_manufacturers_table cannot be reverted.\n";

        $this->dropIndex('UX_manufacturers', '{{%manufacturers}}');

        $this->dropTable('{{%manufacturers}}');
    }
}
