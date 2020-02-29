<?php

namespace common\models;

use common\models\query\FeedbackCategoryQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 *
 *
 * @property int $id
 * @property string $name Название категории
 * @property int $created_at Создано
 * @property int $updated_at Обновлено
 *
 * @property FeedbackMessage[] $feedbackMessages
 */
class FeedbackCategory extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%feedback_categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название категории',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getFeedbackMessages()
    {
        return $this->hasMany(FeedbackMessage::class, ['feedback_category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FeedbackCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedbackCategoryQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
          TimestampBehavior::class
        ];
    }
}
