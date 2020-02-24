<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClothesType */

$this->title = 'Update Clothes Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clothes Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clothes-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
