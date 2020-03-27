<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ListPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'List Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="list-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'meta_title',
//            'meta_description',
//            'slug',
//            'title',
            'content:html',
        ],
    ]) ?>

</div>
