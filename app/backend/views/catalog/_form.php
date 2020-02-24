<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manufacturer_id')->textInput() ?>

    <?= $form->field($model, 'clothes_type_id')->textInput() ?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'style_id')->textInput() ?>

    <?= $form->field($model, 'model_id')->textInput() ?>

    <?= $form->field($model, 'color_id')->textInput() ?>

    <?= $form->field($model, 'size_id')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'material_id')->textInput() ?>

    <?= $form->field($model, 'is_present')->textInput() ?>

    <?= $form->field($model, 'agegroup_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'is_deleted')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
