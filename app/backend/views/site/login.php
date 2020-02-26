<?php

use macgyer\yii2materializecss\widgets\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col l5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="row">
	                <div class="col m12">
                        <?= Html::submitButton('Вход', ['class' => 'btn', 'name' => 'login-button']) ?>
	                </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
