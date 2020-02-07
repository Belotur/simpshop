<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу справочника контактов.
 */
class m190605_174925_create_contacts_table extends Migration
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

        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name'=> $this->string(256)->null()->comment('Полное наименование'),
            'legal_address' => $this->string(512)->null()->comment('Юридический адрес'),
            'physical_address' => $this->string(512)->null()->comment('Физический адрес'),
            'inn_identifier' => $this->string(13)->null()->comment('ИНН'),
            'telephone_number' => $this->string(11)->null()->comment('Номер телефона'),
            'skype_contact' => $this->string(128)->null()->comment('контакт в skype'),
            'whatsapp_contact' => $this->string(128)->null()->comment('контакт в whatsApp'),
            'telegram_contact' => $this->string(128)->null()->comment('контакт в telegram'),
            'viber_contact' => $this->string(128)->null()->comment('контакт в viber'),
            'vk_page_name' => $this->string(512)->null()->comment('адрес страницы ВК'),
            'fb_page_name' => $this->string(512)->null()->comment('адрес страницы fb'),
            'ok_page_name' => $this->string(512)->null()->comment('адрес страницы в Одноклассники'),
            'instagram_page_name' => $this->string(128)->null()->comment('адрес страницы в Одноклассники'),
            'email' => $this->string(128)->null()->comment('e-mail для контактов')
        ], $tableOptions);

        $this->addCommentOnTable('{{%contacts}}', 'Справочник контактов');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
