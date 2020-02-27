<?php

use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Письмо для подтверждения регистрации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-resend-verification-email">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Пожалуйста укажите ваш e-mail. Письмо для подтверждения будет выслано на него.</p>

	<div class="row">
		<div class="col m8 push-m2">
			<?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>
			<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
			<div class="row">
				<div class="col m12 center">
					<?= Html::submitButton('Отправить', ['class' => 'btn']) ?>
				</div>
			</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
