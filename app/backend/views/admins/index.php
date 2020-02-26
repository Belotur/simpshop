<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?php Pjax::begin(); ?>    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'username',
			'email:email',

			[
				'attribute' => 'status',
				'filter' => false,
				'value' => function (\common\models\Admin $model) {
					$list = \common\models\Admin::getStatusNames();

					return $list[$model->status] ?? null;
				},
			],
			[
				'attribute' => 'created_at',
				'format' => 'datetime',
				'filter' => false,
			],
			[
				'attribute' => 'updated_at',
				'format' => 'datetime',
				'filter' => false,
			],

			[
				'class' => 'macgyer\yii2materializecss\widgets\grid\ActionColumn',
				'template' => '{update} {delete}',
			],
		],
	]); ?>
	<?php Pjax::end(); ?>
</div>
