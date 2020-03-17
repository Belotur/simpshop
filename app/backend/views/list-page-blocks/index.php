<?php

//use yii\helpers\Html;
//use yii\grid\GridView;
//use yii\widgets\Pjax;
use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ListPageBlocksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Page Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-page-blocks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create List Page Blocks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'list_page_id',
            'title',
            'content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
