<?php

use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = 'Запрос смены пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset container">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Пожалуйста укажите email. Ссылка для восстановления пароля будет выслана на него.</p>

	<div class="row">
		<div class="col m8 push-m2">
			<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
			<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
			<div class="row">
				<div class="col m12">
					<?= Html::submitButton('Отправить', ['class' => 'btn']) ?>
				</div>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
