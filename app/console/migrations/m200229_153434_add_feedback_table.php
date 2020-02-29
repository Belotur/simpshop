<?php

use yii\db\Migration;

/**
 * Class m200229_153434_add_feedback_table
 */
class m200229_153434_add_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%feedback_messages}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'email' => $this->string()->notNull()->comment('Электронная почта'),
            'phone' => $this->string(15)->notNull()->comment('Номер телефона'),
            'message' => $this->text()->notNull()->comment('Сообщение'),
            'created_at' => $this->integer()->notNull()->comment('Создано'),
            'feedback_category_id' => $this->integer(11)->unsigned()->comment('Категория'),
        ], $tableOptions);

        $this->createTable('{{%feedback_categories}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(128)->notNull()->unique()->comment('Название категории')
        ], $tableOptions);

        $this->createIndex(
            'ix_feedback_messages_feedback_category_id',
            '{{%feedback_messages}}',
            'feedback_category_id'
        );

        $this->addForeignKey(
            'fk_feedback_messages_feedback_category_id',
            '{{%feedback_messages}}',
            'feedback_category_id',
            '{{%feedback_categories}}',
            'id'
        );

        $this->addCommentOnTable('{{%feedback_messages}}', 'Обратная связь');
        $this->addCommentOnTable('{{%feedback_categories}}', 'Категории обратной связи');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_feedback_messages_feedback_category_id', '{{%feedback_messages}}');
        $this->dropIndex('ix_feedback_messages_feedback_category_id', '{{%feedback_messages}}');
        $this->dropTable('{{%feedback_categories}}');
        $this->dropTable('{{%feedback_messages}}');
    }

}
