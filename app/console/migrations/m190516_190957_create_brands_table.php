<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу брендов.
 */
class m190516_190957_create_brands_table extends Migration
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

        $this->createTable('{{%brands}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%brands}}', 'Справочник брэндов');

        $this->createIndex('UX_brands_name', '{{%brands}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_brands_is_deleted', '{{%brands}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UX_brands_name', '{{%brands}}');

        $this->dropIndex('IX_brands_is_deleted', '{{%brands}}');

        $this->dropTable('{{%brands}}');
    }
}
