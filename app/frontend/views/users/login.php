<?php

use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $form \macgyer\yii2materializecss\widgets\form\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login container">
	<h1><?= $this->title ?></h1>
	<div class="row">
		<div class="col m8 push-m2">
			Ещё не зарегистрировались? <?= Html::a('Регистрация', ['users/signup']) ?>
		</div>
		<div class="col m8 push-m2">
			<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
			<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
			<?= $form->field($model, 'password')->passwordInput() ?>
			<?= $form->field($model, 'rememberMe')->checkbox() ?>

			<div style="color:#999;margin:1em 0">
				<br>
				Прислать повторно письмо для подтверждения
				регистрации? <?= Html::a('Прислать', ['users/resend-verification-email']) ?>
			</div>

			<div class="row">
				<div class="col m12 center">
					<?= Html::submitButton(
						Yii::t('app', 'Login'),
						['class' => 'btn btn-primary', 'name' => 'login-button']
					) ?>
				</div>
			</div>
			<div class="row">
				<div class="col m12 center">
					<?= Html::a('Забыли пароль?', ['users/request-password-reset']) ?>
				</div>
			</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
