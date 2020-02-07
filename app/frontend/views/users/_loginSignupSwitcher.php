<?php
use macgyer\yii2materializecss\lib\Html;

/* @var $this \yii\web\View */
/* @var $currentAction string */
?>
<div class="login-signup-switcher">
    <?= Html::a(
        Yii::t('app', 'Login'),
        ['users/login'],
        ['class' => 'btn ' . ($currentAction === 'login' ? 'btn-info' : 'btn-default')]
    ); ?>
    <?= Html::a(
        Yii::t('app', 'Sign Up'),
        ['users/signup'],
        ['class' => 'btn ' . ($currentAction === 'signup' ? 'btn-info' : 'btn-default')]
    ); ?>
</div>