<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListPage */

$this->title = 'Create List Page';
$this->params['breadcrumbs'][] = ['label' => 'List Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
