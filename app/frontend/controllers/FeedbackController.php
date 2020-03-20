<?php

namespace frontend\controllers;

use common\models\FeedbackCategory;
use common\models\FeedbackMessage;
use Yii;
use yii\web\Controller;

/**
 * Class FeedbackController
 */
class FeedbackController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $model = new FeedbackMessage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['done']);
        }

        return $this->render('index', [
            'model' => $model,
            'categories' => $this->getCategories(),
        ]);
    }

    /**
     * @return string
     */
    public function actionDone()
    {
        return $this->render('done');
    }

    /**
     * @return array|FeedbackCategory[]
     */
    private function getCategories()
    {
        return FeedbackCategory::find()->all();
    }
}