<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника возрастных групп.
 */
class m200212_200012_catalog_agegroups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%agegroups}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Наименование группы'),
            'range' => $this->smallInteger()->notNull()->comment('Ранг группы'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ]);

        $this->addCommentOnTable('{{%agegroups}}', 'Справочник возрастных групп');

        $this->createIndex('UX_agegroup_name', '{{%agegroups}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_agegroup_is_deleted', '{{%agegroups}}', ['is_deleted']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200212_200012_catalog_agegroups_table cannot be reverted.\n";

        $this->dropIndex('UX_agegroup_name', '{{%agegroups}}');

        $this->dropIndex('IX_agegroup_is_deleted', '{{%agegroups}}');

        $this->dropTable('{{%agegroups}}');
    }
}
