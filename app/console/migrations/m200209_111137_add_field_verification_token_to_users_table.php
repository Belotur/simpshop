<?php

use yii\db\Migration;

/**
 * Class m200209_111137_add_field_verification_token_to_users_table
 */
class m200209_111137_add_field_verification_token_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('users', 'verification_token', $this->string(128)->null()->comment('verification token'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->$this->dropColumn('users', 'verification_token');
    }
}
