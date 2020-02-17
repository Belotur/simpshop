<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clothes_types".
 *
 * @property int $id
 * @property string $name Название типа
 * @property string|null $description Пояснение
 * @property int $created_at Создана
 * @property int $updated_at Обновлён
 * @property int|null $is_deleted Признак удаления
 * @property int|null $deleted_at Дата удаления типа одежды
 *
 * @property Catalog[] $catalogs
 */
class ClothesType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clothes_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'is_deleted', 'deleted_at'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 250],
            [['name'], 'unique'],
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
            'name' => 'Название типа',
            'description' => 'Пояснение',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлён',
            'is_deleted' => 'Признак удаления',
            'deleted_at' => 'Дата удаления типа одежды',
        ];
    }

    /**
     * Gets query for [[Catalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::className(), ['clothes_type_id' => 'id']);
    }
}
