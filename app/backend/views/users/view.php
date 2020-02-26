<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\data\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn']) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'username',
			'email:email',
			'statusName',
			'created_at',
			'updated_at',
		],
	]) ?>

</div>
