<?php


namespace frontend\controllers;


use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Контроллер пользователей.
 */
class UsersController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'only' => ['logout', 'signup'],
				'rules' => [
					[
						'actions' => ['signup'],
						'allow' => true,
						'roles' => ['?'],
					],
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::class,
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			$model->password = '';

			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	/**
	 * Signs user up.
	 *
	 * @return mixed
	 */
	public function actionSignup()
	{
		$model = new SignupForm();
		if ($model->load(Yii::$app->request->post()) && $model->signup()) {
			return $this->redirect(Url::to(['site/registration-done']));
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}

	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
	public function actionRequestPasswordReset()
	{
		$model = new PasswordResetRequestForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail()) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

				return $this->redirect(Url::to(['users/login']));
			} else {
				Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
			}
		}

		return $this->render('requestPasswordResetToken', [
			'model' => $model,
		]);
	}

	/**
	 * Resets password.
	 *
	 * @param string $token
	 *
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionResetPassword($token)
	{
		try {
			$model = new ResetPasswordForm($token);
		} catch (InvalidArgumentException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}

		if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
			Yii::$app->session->setFlash('success', 'New password saved.');

			return $this->redirect(Url::to(['users/login']));
		}

		return $this->render('resetPassword', [
			'model' => $model,
		]);
	}

	/**
	 * Verify email address
	 *
	 * @param string $token
	 *
	 * @return yii\web\Response
	 * @throws BadRequestHttpException
	 */
	public function actionVerifyEmail($token)
	{
		try {
			$model = new VerifyEmailForm($token);
		} catch (InvalidArgumentException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}
		if ($user = $model->verifyEmail()) {
			Yii::$app->session->setFlash('success', 'Ваш email успешно подтверждён!');
		} else {
			Yii::$app->session->setFlash('error', 'Простите, предоставленный токен неактивен.');
		}

		return $this->redirect(Url::to(['users/login']));
	}

	/**
	 * Resend verification email
	 *
	 * @return mixed
	 */
	public function actionResendVerificationEmail()
	{
		$model = new ResendVerificationEmailForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail()) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

				return $this->redirect(Url::to(['users/login']));
			}
			Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
		}

		return $this->render('resendVerificationEmail', [
			'model' => $model,
		]);
	}
}
