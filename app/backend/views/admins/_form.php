<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form macgyer\yii2materializecss\widgets\form\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Admin::getStatusNames()) ?>

    <div class="form-group text-right">
        <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton(
            Yii::t('app', 'Save'),
            ['class' => 'btn']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
