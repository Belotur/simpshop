<?php

namespace common\models;

use common\models\query\ContactQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * Справочник контактов.
 *
 * @property int $id
 * @property string $name Полное наименование
 * @property string $legal_address Юридический адрес
 * @property string $physical_address Физический адрес
 * @property string $inn_identifier ИНН
 * @property string $telephone_number Номер телефона
 * @property string $skype_contact контакт в skype
 * @property string $whatsapp_contact контакт в whatsApp
 * @property string $telegram_contact контакт в telegram
 * @property string $viber_contact контакт в viber
 * @property string $vk_page_name адрес страницы ВК
 * @property string $fb_page_name адрес страницы fb
 * @property string $ok_page_name адрес страницы в Одноклассники
 * @property string $instagram_page_name адрес страницы в Одноклассники
 * @property string $email e-mail для контактов
 */
class Contact extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 256],
            [['legal_address', 'physical_address', 'vk_page_name', 'fb_page_name', 'ok_page_name'], 'string', 'max' => 512],
            [['inn_identifier'], 'string', 'max' => 13],
            [['telephone_number'], 'string', 'max' => 11],
            [['skype_contact', 'whatsapp_contact', 'telegram_contact', 'viber_contact', 'instagram_page_name', 'email'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Полное наименование'),
            'legal_address' => Yii::t('app', 'Юридический адрес'),
            'physical_address' => Yii::t('app', 'Физический адрес'),
            'inn_identifier' => Yii::t('app', 'ИНН'),
            'telephone_number' => Yii::t('app', 'Номер телефона'),
            'skype_contact' => Yii::t('app', 'контакт в skype'),
            'whatsapp_contact' => Yii::t('app', 'контакт в whatsApp'),
            'telegram_contact' => Yii::t('app', 'контакт в telegram'),
            'viber_contact' => Yii::t('app', 'контакт в viber'),
            'vk_page_name' => Yii::t('app', 'адрес страницы ВК'),
            'fb_page_name' => Yii::t('app', 'адрес страницы fb'),
            'ok_page_name' => Yii::t('app', 'адрес страницы в Одноклассники'),
            'instagram_page_name' => Yii::t('app', 'адрес страницы в Одноклассники'),
            'email' => Yii::t('app', 'e-mail для контактов'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactQuery(get_called_class());
    }
}
