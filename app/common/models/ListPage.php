<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_page".
 *
 * @property int $id ID страницы
 * @property string $meta_title Мета заголовок
 * @property string $meta_description Мета описание
 * @property string $slug Ссылка
 * @property string $title Заголовок
 * @property string $content Текст
 *
 * @property ListPageBlocks[] $listPageBlocks
 */
class ListPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_title', 'slug', 'title'], 'required'],
            [['content'], 'string'],
            [['meta_title', 'title'], 'string', 'max' => 128],
            [['meta_description'], 'string', 'max' => 256],
            [['slug'], 'string', 'max' => 50],
            [['meta_title'], 'unique'],
            [['slug'], 'unique'],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID страницы',
            'meta_title' => 'Мета заголовок',
            'meta_description' => 'Мета описание',
            'slug' => 'Ссылка',
            'title' => 'Заголовок',
            'content' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListPageBlocks()
    {
        return $this->hasMany(ListPageBlocks::className(), ['list_page_id' => 'id']);
    }
}
