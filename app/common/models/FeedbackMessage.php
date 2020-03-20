<?php

namespace common\models;

use common\models\query\FeedbackMessageQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Модель сообщения обратной связи.
 *
 * @property int $id
 * @property string $email Электронная почта
 * @property string $phone Номер телефона
 * @property string $message Сообщение
 * @property int $created_at Создано
 * @property int $updated_at
 * @property int $feedback_category_id Категория
 *
 * @property FeedbackCategory $feedbackCategory
 */
class FeedbackMessage extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%feedback_messages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'message', 'feedback_category_id'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at', 'feedback_category_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [
                ['feedback_category_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => FeedbackCategory::class,
                'targetAttribute' => ['feedback_category_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Электронная почта',
            'phone' => 'Номер телефона',
            'message' => 'Сообщение',
            'created_at' => 'Создано',
            'updated_at' => 'Updated At',
            'feedback_category_id' => 'Категория',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getFeedbackCategory()
    {
        return $this->hasOne(FeedbackCategory::class, ['id' => 'feedback_category_id']);
    }

    /**
     * {@inheritdoc}
     * @return FeedbackMessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedbackMessageQuery(get_called_class());
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }
}
