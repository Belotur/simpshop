<?php

use yii\db\Migration;

/**
 * Class m200209_112029_alter_username_field_users_table
 */
class m200209_112029_alter_username_field_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('users', 'username', $this->string()->null()->unique()->comment('Имя пользователя'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200209_112029_alter_username_field_users_table cannot be reverted.\n";

        return false;
    }
}
