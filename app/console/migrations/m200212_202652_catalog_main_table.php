<?php

use yii\db\Migration;

/**
 * Миграция добавляет таблицу каталога товаров
 */
class m200212_202652_catalog_main_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catalog}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(250)->notNull()->comment('Название товара'),
            'description' => $this->string(512)->null()->comment('Описание товара'),
            'picture' => $this->string(250)->null()->comment('Название файла изображения товара'),
            'manufacturer_id' => $this->integer()->unsigned()->notNull()->comment('ID производителя'),
            'type_id' => $this->integer()->unsigned()->notNull()->comment('ID типа товара'),
            'sex' => $this->string(120)->notNull()->comment('Для какого пола'),
            'style_id' => $this->integer()->unsigned()->notNull()->comment('ID стиля товара'),
            'model_id' => $this->integer()->unsigned()->notNull()->comment('ID модели товара'),
            'color_id' => $this->integer()->unsigned()->notNull()->comment('ID цвета товара'),
            'size_id' => $this->integer()->unsigned()->notNull()->comment('ID размера товара'),
            'price' => $this->float(2)->unsigned()->notNull()->defaultValue(0)->comment('Цена товара'),
            'material_id' => $this->integer()->unsigned()->notNull()->comment('ID материала товара'),
            'is_present' => $this->boolean()->notNull()->comment('Наличие товара'),
            'agegroup_id' => $this->integer()->unsigned()->notNull()->comment('ID возрастной группы товара'),
            'created_at' => $this->integer()->unsigned()->notNull()->comment('Создан'),
            'updated_at' => $this->integer()->unsigned()->notNull()->comment('Обновлён'),
            'is_deleted' => $this->boolean()->defaultValue(false)->comment('Признак удаления'),
            'deleted_at' => $this->integer()->unsigned()->null()->comment('Дата удаления'),
        ]);

        $this->addCommentOnTable('{{%catalog}}', 'Каталог товаров');

        $this->createIndex('UX_catalog_name', '{{%catalog}}', ['name', 'is_deleted'], true);

        $this->createIndex('IX_catalog_is_deleted', '{{%catalog}}', ['is_deleted']);

        $this->addForeignKey(
            'FK_catalog_manufacturer_id',
            '{{%catalog}}', 'manufacturer_id',
            '{{%manufacturers}}', 'id'
        );

        $this->addForeignKey(
            'FK_catalog_type_id',
            '{{%catalog}}', 'type_id',
            '{{%types}}', 'id'
        );

        $this->addForeignKey(
            'FK_catalog_style_id',
            '{{%catalog}}', 'style_id',
            '{{%styles}}', 'id'
        );

        $this->addForeignKey(
            'FK_catalog_model_id',
            '{{%catalog}}', 'model_id',
            '{{%models}}', 'id'
        );

        $this->addForeignKey(
            'FK_catalog_color_id',
            '{{%catalog}}', 'color_id',
            '{{%colors}}', 'id'
        );

        $this->addForeignKey(
            'FK_catalog_size_id',
            '{{%catalog}}', 'size_id',
            '{{%sizes}}', 'id'
        );

        $this->addForeignKey(
            'FK_catalog_material_id',
            '{{%catalog}}', 'material_id',
            '{{%materials}}', 'id'
        );

        $this->addForeignKey(
            'FK_catalog_agegroup_id',
            '{{%catalog}}', 'agegroup_id',
            '{{%agegroups}}', 'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200212_202652_catalog_main_table cannot be reverted.\n";

        $this->dropForeignKey('FK_catalog_manufacturer_id', '{{%catalog}}');
        $this->dropForeignKey('FK_catalog_type_id', '{{%catalog}}');
        $this->dropForeignKey('FK_catalog_style_id', '{{%catalog}}');
        $this->dropForeignKey('FK_catalog_model_id', '{{%catalog}}');
        $this->dropForeignKey('FK_catalog_color_id', '{{%catalog}}');
        $this->dropForeignKey('FK_catalog_size_id', '{{%catalog}}');
        $this->dropForeignKey('FK_catalog_material_id', '{{%catalog}}');
        $this->dropForeignKey('FK_catalog_agegroup_id', '{{%catalog}}');

        $this->dropIndex('UX_catalog_name', '{{%catalog}}');
        $this->dropIndex('IX_catalog_is_deleted', '{{%catalog}}');

        $this->dropTable('{{%catalog}}');
    }
}
