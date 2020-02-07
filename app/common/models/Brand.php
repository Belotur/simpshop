<?php

namespace common\models;

use common\models\query\BrandQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Справочник брендов.
 *
 * @property int $id
 * @property string $name Наименование
 * @property int $created_at Создан
 * @property int $updated_at Обновлён
 * @property int $is_deleted Признак удаления
 * @property int $deleted_at Дата удаления
 */
class Brand extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%brands}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_at', 'updated_at', 'deleted_at'], 'integer'],
            ['is_deleted', 'boolean'],
            ['name', 'string', 'max' => 250],
            [['name', 'is_deleted'], 'unique', 'targetAttribute' => ['name', 'is_deleted']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Наименование'),
            'created_at' => Yii::t('app', 'Создан'),
            'updated_at' => Yii::t('app', 'Обновлён'),
            'is_deleted' => Yii::t('app', 'Признак удаления'),
            'deleted_at' => Yii::t('app', 'Дата удаления'),
        ];
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     * @return BrandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BrandQuery(get_called_class());
    }
}
