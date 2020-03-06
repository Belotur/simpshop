<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_page_blocks".
 *
 * @property int $id
 * @property int $list_page_id Ключ страницы
 * @property string $title Заголовок
 * @property string $content Текст
 *
 * @property ListPage $listPage
 */
class ListPageBlocks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_page_blocks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['list_page_id', 'title'], 'required'],
            [['list_page_id'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 128],
            [['title'], 'unique'],
            [['list_page_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListPage::className(), 'targetAttribute' => ['list_page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list_page_id' => 'Ключ страницы',
            'title' => 'Заголовок',
            'content' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListPage()
    {
        return $this->hasOne(ListPage::className(), ['id' => 'list_page_id']);
    }
}
