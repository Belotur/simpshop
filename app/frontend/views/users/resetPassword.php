<?php

use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password container">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Введите новый пароль:</p>

	<div class="row">
		<div class="col m5 push-m2">
			<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

			<?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

			<div class="row">
				<div class="col m12">
					<?= Html::submitButton('Сохранить', ['class' => 'btn']) ?>
				</div>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
