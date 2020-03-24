<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\ListPage */

/* @var $searchModel common\models\search\ListPageBlocksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'List Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="list-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Add block', ['../list-page-blocks/create', 'listPageId' => $model->id], ['class' => 'btn btn-success','data-method' => 'POST']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'meta_title',
            'meta_description',
            'slug',
            'title',
            'content:html',
        ],
    ]) ?>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'list_page_id',
            'title',
            'content:ntext',
            ['class' => 'macgyer\yii2materializecss\widgets\grid\ActionColumn',
                'controller' => 'list-page-blocks',
            ],
        ],
    ]); ?>

</div>
