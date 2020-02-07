<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this \yii\web\View */
/* @var $model \common\models\Page */

$this->title = $model->title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->description
]);
?>

<h1><?= Html::encode($model->title) ?></h1>

<div>
    <?= $model->content ?>
</div>
