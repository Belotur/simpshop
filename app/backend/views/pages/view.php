<?php

use macgyer\yii2materializecss\lib\Html;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app-pages', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

YiiAsset::register($this);

$formatter = Yii::$app->formatter;
?>
<div class="page-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert-info">
        <b>Meta-последнее обновление:</b> <?= $formatter->asDatetime($model->updated_at) ?>
        <br>
        <b>Meta-описание:</b> <?= Html::encode($model->description) ?>
    </div>

    <div>
        <?= $model->content ?>
    </div>
</div>
