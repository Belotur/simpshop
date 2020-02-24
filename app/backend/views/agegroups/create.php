<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Agegroup */

$this->title = 'Create Agegroup';
$this->params['breadcrumbs'][] = ['label' => 'Agegroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agegroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
