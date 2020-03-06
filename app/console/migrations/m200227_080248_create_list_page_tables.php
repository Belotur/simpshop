<?php

use yii\db\Migration;

/**
 * Class m200227_080248_create_list_page_tables
 */
class m200227_080248_create_list_page_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%list_page}}', [
            'id' => $this->primaryKey()->unsigned()->notNull()->comment('ID страницы'),
            'meta_title' => $this->string(128)->unique()->notNull()->comment('Мета заголовок'),
            'meta_description' => $this->string(256)->comment('Мета описание'),
            'slug' => $this->string(50)->unique()->notNull()->comment('Ссылка'),
            'title' => $this->string(128)->unique()->notNull()->comment('Заголовок'),
            'content' => $this->text()->null()->comment('Текст'),
        ]);
        $this->addCommentOnTable('{{%list_page}}', 'Страницы');
        $this->createIndex('IX_list_page', '{{%list_page}}', 'id');

        $this->createTable('{{%list_page_blocks}}', [
            'id' => $this->primaryKey()->unsigned(),
            'list_page_id' => $this->integer()->unsigned()->notNull()->comment('Ключ страницы'),
            'title' => $this->string(128)->unique()->notNull()->comment('Заголовок'),
            'content' => $this->text()->null()->comment('Текст'),
        ]);

        $this->addCommentOnTable('{{%list_page_blocks}}', 'Контент блоки');
        $this->createIndex('IX_list_page_blocks', '{{%list_page_blocks}}', 'id');

        $this->addForeignKey(
            'FK_list_page_blocks',
            '{{%list_page_blocks}}','list_page_id',
            '{{%list_page}}', 'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('IX_list_page_blocks', '{{%list_page_blocks}}');
        $this->dropTable('{{%list_page_blocks}}');
        $this->dropIndex('IX_list_page', '{{%list_page}}');
        $this->dropTable('{{%list_page}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200227_080248_create_list_page_tables cannot be reverted.\n";

        return false;
    }
    */
}
