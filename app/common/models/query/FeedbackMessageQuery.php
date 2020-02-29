<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\FeedbackMessage]].
 *
 * @see \common\models\FeedbackMessage
 */
class FeedbackMessageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\FeedbackMessage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\FeedbackMessage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
