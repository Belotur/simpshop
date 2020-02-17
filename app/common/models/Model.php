<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "models".
 *
 * @property int $id
 * @property string $name Наименование модели
 * @property int $created_at Создана
 * @property int $updated_at Обновлёна
 * @property int|null $is_deleted Признак удаления
 * @property int|null $deleted_at Дата удаления
 *
 * @property Catalog[] $catalogs
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'is_deleted', 'deleted_at'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['name', 'is_deleted'], 'unique', 'targetAttribute' => ['name', 'is_deleted']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование модели',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлёна',
            'is_deleted' => 'Признак удаления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[Catalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::className(), ['model_id' => 'id']);
    }
}
