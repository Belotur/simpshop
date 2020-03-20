<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\ActionColumn;
use macgyer\yii2materializecss\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\FeedbackMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedback Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление категориями', ['../feedback-categories/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'feedbackCategory.name',
            'created_at:datetime',
            //'updated_at',
            'email:email',
            'phone',
            'feedback_category_id',

            [
                'class' => ActionColumn::class,
                'template' => '{view}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
