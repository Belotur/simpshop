<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника форм столов.
 */
class m190526_175519_create_table_forms_table extends Migration
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

        $this->createTable('{{%table_forms}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%table_forms}}', 'Справочник форм столов');

        $this->createIndex('UX_table_forms_name','{{%table_forms}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_table_forms_is_deleted', '{{%table_forms}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UX_table_forms_name', '{{%table_forms}}');

        $this->dropIndex('IX_table_forms_is_deleted', '{{%table_forms}}');

        $this->dropTable('{{%table_forms}}');
    }
}
