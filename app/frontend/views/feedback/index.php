<?php

use common\models\FeedbackCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FeedbackMessage */
/* @var $form yii\widgets\ActiveForm */
/* @var $categories FeedbackCategory[]*/
?>

<div class="container">
    <h1>Обратная связь</h1>

    <div class="feedback-message-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'feedback_category_id')->dropDownList(
            array_merge(
                ['' => 'Выбрать'],
                ArrayHelper::map($categories, 'id', 'name')
            )
        )->hint('Укажите категорию') ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

        <div class="right-align">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
