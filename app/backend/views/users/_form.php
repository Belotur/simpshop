<?php

use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\User::getStatuses()) ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'username')->textInput() ?>

    <div class="row">
	    <div class="col m12 center">
			<?= Html::a('Отмена', ['index'], ['class' => 'btn white grey-text']) ?>
			<?= Html::submitButton('Сохранить', ['class' => 'btn']) ?>
	    </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
