<?php

use macgyer\yii2materializecss\lib\Html;
use yii\web\View;

/** @var View $this */

$this->title = 'Регистрация завершена';
?>

<div class="container">
	<h1>Спасибо за регистрацию.</h1>

	<p>
		Проверьте пожалуйста свой почтовый ящик и подтвердите e-mail пройдя по ссылке из письма.
	</p>
	<p>
		Перейти на <?= Html::a('главную', ['site/index']) ?>.
	</p>
</div>
