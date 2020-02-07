<?php

/* @var $this yii\web\View */
/* @var $form \macgyer\yii2materializecss\widgets\form\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-login container">
    <?= $this->render('_loginSignupSwitcher', ['currentAction' => 'login']); ?>

    <div class="row">
        <div class="col m8 push-m2">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">

                    <br>
                    Need new verification email? <?= Html::a('Resend', ['users/resend-verification-email']) ?>
                </div>

                <div class="form-group center">
                    <?= Html::submitButton(
                            Yii::t('app', 'Login'),
                            ['class' => 'btn btn-primary', 'name' => 'login-button']
                    ) ?>
                    <?= Html::a('Забыли пароль?', ['users/request-password-reset']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
