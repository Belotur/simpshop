<?php

namespace common\models\query;

/**
 * ActiveQuery для [[\common\models\Brand]].
 *
 * @see \common\models\Brand
 */
class BrandQuery extends \yii\db\ActiveQuery
{
    /**
     * Только неудалённые записи.
     *
     * @return BrandQuery
     */
    public function notDeleted(): BrandQuery
    {
        return $this->andWhere(['is_deleted' => false]);
    }

    /**
     * Только с запрошенным наименованием.
     *
     * @param string $name наименование
     * @return BrandQuery
     */
    public function withName(string $name): BrandQuery
    {
        return $this->andWhere(['name' => $name]);
    }
}
