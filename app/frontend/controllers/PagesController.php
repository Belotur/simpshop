<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\Page;

/**
 * Контроллер страниц.
 */
class PagesController extends Controller
{
    /**
     * Отображает запрошенную страницу.
     *
     * @param string $key уникальный ключ
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($key)
    {
        $model = Page::find()->withKey($key)->one();

        if ($model === null) {
            throw new NotFoundHttpException(
                Yii::t('app', 'The requested page does not exist.')
            );
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }
}