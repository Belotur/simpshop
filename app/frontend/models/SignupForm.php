<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
	public $email;
	public $password;
	public $password_repeat;
	public $confirm_offer;


	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

			['password', 'required'],
			['password', 'string', 'min' => 6],
			['password_repeat', 'required'],
			[
				'password_repeat',
				'compare',
				'compareAttribute' => 'password',
				'message' => Yii::t('app', 'Passwords don\'t match.'),
			],

			['confirm_offer', 'required'],
			['confirm_offer', function ($attribute, $param) {
				if (!$this->$attribute) {
					$this->addError($attribute, 'Для регистрации необходимо согласиться с условиями оферты.');
				}
			}],
		];
	}

	/**
	 * Signs user up.
	 *
	 * @return bool whether the creating new account was successful and email was sent
	 */
	public function signup()
	{
		if (!$this->validate()) {
			return null;
		}

		$user = new User();
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();
		$user->generateEmailVerificationToken();

		return $user->save() && $this->sendEmail($user);
	}

	/**
	 * Sends confirmation email to user
	 *
	 * @param User $user user model to with email should be send
	 *
	 * @return bool whether the email was sent
	 */
	protected function sendEmail($user)
	{
		return Yii::$app
			->mailer
			->compose(
				['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
				['user' => $user]
			)
			->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
			->setTo($this->email)
			->setSubject('Account registration at ' . Yii::$app->name)
			->send();
	}

	/**
	 * @inheritDoc
	 */
	public function attributeLabels()
	{
		return [
			'username' => Yii::t('app', 'Name'),
			'email' => Yii::t('app', 'Email'),
			'password' => Yii::t('app', 'Password'),
			'password_repeat' => Yii::t('app', 'Password Repeat'),
			'confirm_offer' => 'Принять условия оферты',
		];
	}
}
