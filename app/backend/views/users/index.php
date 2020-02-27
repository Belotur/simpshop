<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\ActionColumn;
use macgyer\yii2materializecss\widgets\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php Pjax::begin(); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => \yii\grid\SerialColumn::class],

			'id',
			'username',
			'email:email',
			[
				'attribute' => 'status',
				'value' => 'statusName',
				'filter' => Html::activeDropDownList(
					$searchModel,
					'status',
					array_merge(['' => 'все'], \common\models\User::getStatuses())
				),
			],
			'created_at:date',
			'updated_at:datetime',

			[
				'class' => ActionColumn::class,
				'template' => '{view} {update}'
			],
		],
	]); ?>

	<?php Pjax::end(); ?>

</div>
