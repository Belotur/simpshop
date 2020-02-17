<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sizes".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int $range Ранг размера
 * @property int $created_at Создан
 * @property int $updated_at Обновлён
 * @property int|null $is_deleted Признак удаления
 * @property int|null $deleted_at Дата удаления
 *
 * @property Catalog[] $catalogs
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'range', 'created_at', 'updated_at'], 'required'],
            [['range', 'created_at', 'updated_at', 'is_deleted', 'deleted_at'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['name', 'range'], 'unique', 'targetAttribute' => ['name', 'range']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'range' => 'Ранг размера',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлён',
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
        return $this->hasMany(Catalog::className(), ['size_id' => 'id']);
    }
}
