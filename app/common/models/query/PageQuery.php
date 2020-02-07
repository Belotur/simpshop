<?php

namespace common\models\query;

use yii\db\ActiveQuery;

/**
 * ActiveQuery для [[\common\models\Page]].
 *
 * @see \common\models\Page
 */
class PageQuery extends ActiveQuery
{
    /**
     * Ограничивает выборку по запрошенному ключу.
     *
     * @param string $key
     * @return PageQuery
     */
    public function withKey(string $key): PageQuery
    {
        return $this->andWhere(['key' => $key]);
    }
}
