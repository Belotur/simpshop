<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manufacturers".
 *
 * @property int $id
 * @property string $name Название производителя
 * @property string|null $info Информация о производителе
 * @property int $created_at Создан
 * @property int $updated_at Обновлён
 * @property int|null $is_deleted Признак удаления
 * @property int|null $deleted_at Дата удаления
 *
 * @property Catalog[] $catalogs
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manufacturers';
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
            [['info'], 'string', 'max' => 250],
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
            'name' => 'Название производителя',
            'info' => 'Информация о производителе',
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
        return $this->hasMany(Catalog::className(), ['manufacturer_id' => 'id']);
    }
}
