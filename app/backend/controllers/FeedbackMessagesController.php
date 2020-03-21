<?php

namespace backend\controllers;

use common\models\FeedbackCategory;
use Yii;
use common\models\FeedbackMessage;
use common\models\search\FeedbackMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CRUD-контроллер для управления сообщениями пользователей в обратной связи.
 */
class FeedbackMessagesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Вывод списка всех сообщений обратной связи.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FeedbackMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Вывод одного сообщения обратной связи.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return array|FeedbackCategory[]
     */
    private function getCategories()
    {
        return FeedbackCategory::find()->all();
    }


    /**
     * Поиск существующей модели по id.
     * @param integer $id
     * @return FeedbackMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FeedbackMessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
