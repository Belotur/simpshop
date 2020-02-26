<?php

use macgyer\yii2materializecss\lib\Html;

/** @var $this yii\web\View */
/** @var $model \backend\models\views\StatisticsViewModel */

$formatter = Yii::$app->getFormatter();

$this->title = 'Панель управления';
?>
<div class="site-index">
	<h1><?= $this->title ?></h1>
	<div class="row">
		<div class="col s12 m6">
			<div class="card">
				<div class="card-content">
					<span class="card-title">Пользователи</span>
					<p>
						<?= Html::a('Пользователи', ['users/index']) ?>:
						<?= $formatter->asInteger($model->getUsersCount()) ?>
					</p>
					<p>
						<?= Html::a('Администратры', ['admins/index']) ?>:
						<?= $formatter->asInteger($model->getAdminsCount()) ?>
					</p>
				</div>
			</div>
		</div>

		<div class="col s12 m6">
			<div class="card">
				<div class="card-content">
					<span class="card-title">Магазин</span>
					<p>
						<?= Html::a('Товары', ['#']) ?>: <?= $formatter->asInteger(200) ?>
					</p>
					<p>
						<?= Html::a('Заказы', '#') ?>: <?= $formatter->asInteger(11) ?>
					</p>
				</div>
			</div>
		</div>

	</div>
</div>
