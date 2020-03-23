<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FeedbackCategory */

$this->title = 'Создание категории';
$this->params['breadcrumbs'][] = ['label' => 'Категории обратной связи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
