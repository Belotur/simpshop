<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string $name Название товара
 * @property string|null $description Описание товара
 * @property string|null $picture Название файла изображения товара
 * @property int $manufacturer_id ID производителя
 * @property int $clothes_type_id ID типа товара
 * @property string $sex Для какого пола
 * @property int $style_id ID стиля товара
 * @property int $model_id ID модели товара
 * @property int $color_id ID цвета товара
 * @property int $size_id ID размера товара
 * @property float $price Цена товара
 * @property int $material_id ID материала товара
 * @property int $is_present Наличие товара
 * @property int $agegroup_id ID возрастной группы товара
 * @property int $created_at Создан
 * @property int $updated_at Обновлён
 * @property int|null $is_deleted Признак удаления
 * @property int|null $deleted_at Дата удаления
 *
 * @property Agegroup $agegroup
 * @property ClothesType $clothesType
 * @property Color $color
 * @property Manufacturer $manufacturer
 * @property Material $material
 * @property Model $model
 * @property Size $size
 * @property Style $style
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'manufacturer_id', 'clothes_type_id', 'sex', 'style_id', 'model_id', 'color_id', 'size_id', 'material_id', 'is_present', 'agegroup_id', 'created_at', 'updated_at'], 'required'],
            [['manufacturer_id', 'clothes_type_id', 'style_id', 'model_id', 'color_id', 'size_id', 'material_id', 'is_present', 'agegroup_id', 'created_at', 'updated_at', 'is_deleted', 'deleted_at'], 'integer'],
            [['price'], 'number'],
            [['name', 'picture'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 512],
            [['sex'], 'string', 'max' => 120],
            [['name', 'is_deleted'], 'unique', 'targetAttribute' => ['name', 'is_deleted']],
            [['agegroup_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agegroup::className(), 'targetAttribute' => ['agegroup_id' => 'id']],
            [['clothes_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClothesType::className(), 'targetAttribute' => ['clothes_type_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['color_id' => 'id']],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['size_id' => 'id']],
            [['style_id'], 'exist', 'skipOnError' => true, 'targetClass' => Style::className(), 'targetAttribute' => ['style_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название товара',
            'description' => 'Описание товара',
            'picture' => 'Название файла изображения товара',
            'manufacturer_id' => 'ID производителя',
            'clothes_type_id' => 'ID типа товара',
            'sex' => 'Для какого пола',
            'style_id' => 'ID стиля товара',
            'model_id' => 'ID модели товара',
            'color_id' => 'ID цвета товара',
            'size_id' => 'ID размера товара',
            'price' => 'Цена товара',
            'material_id' => 'ID материала товара',
            'is_present' => 'Наличие товара',
            'agegroup_id' => 'ID возрастной группы товара',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлён',
            'is_deleted' => 'Признак удаления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[Agegroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgegroup()
    {
        return $this->hasOne(Agegroup::className(), ['id' => 'agegroup_id']);
    }

    /**
     * Gets query for [[ClothesType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClothesType()
    {
        return $this->hasOne(ClothesType::className(), ['id' => 'clothes_type_id']);
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'color_id']);
    }

    /**
     * Gets query for [[Manufacturer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }

    /**
     * Gets query for [[Material]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id']);
    }

    /**
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['id' => 'size_id']);
    }

    /**
     * Gets query for [[Style]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStyle()
    {
        return $this->hasOne(Style::className(), ['id' => 'style_id']);
    }
}
