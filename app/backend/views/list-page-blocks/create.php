<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListPageBlocks */

$this->title = 'Create List Page Blocks';
$this->params['breadcrumbs'][] = ['label' => 'List Page Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-page-blocks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
