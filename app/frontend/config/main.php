<?php
$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

return [
	'id' => 'mp',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'controllerNamespace' => 'frontend\controllers',
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-frontend',
		],
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
		],
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'mp-frontend',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'enableStrictParsing' => true,
			'rules' => [
				'/' => 'site/index',
				'site/error' => 'site/error',
				'registration-done' => 'site/registration-done',

				'login' => 'users/login',
				'logout' => 'users/logout',
				'signup' => 'users/signup',
				'request-password-reset' => 'users/request-password-reset',
				'reset-password' => 'users/reset-password',
				'resend-verification-email' => 'users/resend-verification-email',
				'verify-email' => 'users/verify-email',

				'pages/<key>' => 'pages/index',

			],
		],
	],
	'params' => $params,
];
