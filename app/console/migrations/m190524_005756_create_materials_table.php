<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника материалов `{{%materials}}`.
 */
class m190524_005756_create_materials_table extends Migration
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

        $this->createTable('{{%materials}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%materials}}', 'Справочник материалов');

        $this->createIndex('UX_materials_name', '{{%materials}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_materials_is_deleted', '{{%materials}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UX_materials_name', '{{%materials}}');

        $this->dropIndex('IX_materials_is_deleted', '{{%materials}}');

        $this->dropTable('{{%materials}}');
    }
}
