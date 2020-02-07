<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника механизмов трансформации диванов.
 */
class m190526_150100_create_sofa_transform_mech_table extends Migration
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

        $this->createTable('{{%sofa_transform_mech}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%sofa_transform_mech}}', 'Справочник механизмов трансформации диванов');

        $this->createIndex('UX_sofa_transform_mech_name', '{{%sofa_transform_mech}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_sofa_transform_mech_is_deleted', '{{%sofa_transform_mech}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UX_sofa_transform_mech_name', '{{%sofa_transform_mech}}');

        $this->dropIndex('IX_sofa_transform_mech_is_deleted', '{{%sofa_transform_mech}}');

        $this->dropTable('{{%sofa_transform_mech}}');
    }
}
