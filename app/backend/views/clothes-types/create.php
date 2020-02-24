<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClothesType */

$this->title = 'Create Clothes Type';
$this->params['breadcrumbs'][] = ['label' => 'Clothes Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clothes-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
