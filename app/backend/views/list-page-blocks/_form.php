<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\ListPageBlocks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-page-blocks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'list_page_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'content')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'fullscreen',
            ],
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
