<?php

use macgyer\yii2materializecss\widgets\Alert;
use macgyer\yii2materializecss\lib\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

frontend\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">

	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>

	<body>
	<?php $this->beginBody() ?>


	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container">
			<a href="<?= Url::to('/') ?>" class="brand-logo">Simple Shop</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="#!">Обратная связь</a></li>
				<li><a href="#!">О компании</a></li>
				<li><a href="#!">Личный кабинет</a></li>
				<li><a href="#!">Заказы пользователя</a></li>
				<li><a href='/page/faq'>Вопросы-ответы</a></li>
				<li><a href="#!">Оферта</a></li>
				<li><a href="#!">Корзина</a></li>
				<?php if (Yii::$app->getUser()->isGuest): ?>
					<li><a href="<?= Url::to(['users/login']) ?>">Войти</a></li>
				<?php else: ?>
					<li>
						<?= Html::beginForm(['users/logout'], 'post') ?>
						<?= Html::submitButton(
							'Выход',
							['class' => 'btn btn-link logout']
						) ?>
						<?= Html::endForm() ?>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>


	<main class="content">
		<?= Alert::widget() ?>
		<?= $content ?>
	</main>

	<footer class="page-footer light-blue">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">The Shop</h5>
					<p class="grey-text text-lighten-4">The Shop description.</p>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
			</div>
		</div>
	</footer>

	<?= \frontend\components\widgets\horizontalViewRequired\HorizontalViewRequiredWidget::widget() ?>

	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>
