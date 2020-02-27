<?php

use frontend\models\SignupForm;
use macgyer\yii2materializecss\widgets\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form macgyer\yii2materializecss\widgets\form\ActiveForm */
/* @var $model SignupForm */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup container">
	<h1>Регистрация</h1>
	<div class="row">
		<div class="col m8 push-m2">
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
				<?= $form->field($model, 'email') ?>
				<?= $form->field($model, 'password')->passwordInput() ?>
				<?= $form->field($model, 'password_repeat')->passwordInput() ?>
				<div class="row">
					<div class="col m12">
						Я принимаю условия <?= Html::a('оферты', ['info/offer']) ?>.
					</div>
				</div>
				<div class="row">
				<?= $form->field($model, 'confirm_offer')->checkbox() ?>
				</div>

				<div class="row">
					<div class="col m6 center">
						<?= Html::submitButton(
							Yii::t('app', 'Sign Up'),
							['class' => 'btn btn-primary', 'name' => 'signup-button']
						) ?>
					</div>
					<div class="col m6 center">
						<a href="<?= Url::to(['users/request-password-reset']) ?>">Забыли пароль?</a>
					</div>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
