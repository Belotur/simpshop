<?php

namespace common\models\query;

/**
 * ActiveQuery для [[\common\models\Contact]].
 *
 * @see \common\models\Contact
 */
class ContactQuery extends \yii\db\ActiveQuery
{
    /**
     *  Только с запрошенным наименованием.
     *
     * @param string $name полное наименование
     * @return ContactQuery
     */
    public function withName(string $name): ContactQuery
    {
        return $this->andWhere(['name' => $name]);
    }
}
