<?php

namespace common\models;

use common\models\query\PageQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Модель страницы.
 *
 * @property int $id
 * @property string $key Уникальный ключ
 * @property string $title Заголовок
 * @property string $description Meta-описание
 * @property string $content Текст
 * @property int $created_at Создана
 * @property int $updated_at Обновлена
 */
class Page extends ActiveRecord
{
    /**
     * Пользовательское соглашение
     */
    public const KEY_TERMS_OF_USE = 'terms_of_use';

    /**
     * Оферта для поставщиков
     */
    public const KEY_PROVISIONERS_OFFER = 'provisioners_offer';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'title'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_at', 'updated_at'], 'integer'],
            [['key'], 'string', 'max' => 64],
            [['title', 'description'], 'string', 'max' => 512],
            [['key'], 'unique'],
            ['key', 'in', 'range' => [static::KEY_PROVISIONERS_OFFER, static::KEY_TERMS_OF_USE]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app-pages', 'id'),
            'key' => Yii::t('app-pages', 'key'),
            'title' => Yii::t('app-pages', 'title'),
            'description' => Yii::t('app-pages', 'description'),
            'content' => Yii::t('app-pages', 'content'),
            'created_at' => Yii::t('app-pages', 'created_at'),
            'updated_at' => Yii::t('app-pages', 'updated_at'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'timestamp' => TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     * @return PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PageQuery(get_called_class());
    }
}
