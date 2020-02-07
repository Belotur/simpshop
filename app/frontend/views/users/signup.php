<?php

/* @var $this yii\web\View */
/* @var $form macgyer\yii2materializecss\widgets\form\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup container">
    <?= $this->render('_loginSignupSwitcher', ['currentAction' => 'signup']); ?>

    <div class="row">
        <div class="col m8 push-m2">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div class="row">
                    <div class="col m6">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    </div>

                    <div class="col m6">
                        <?= $form->field($model, 'email') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col m6">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="col m6">
                        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                    </div>
                </div>


                <div class="form-group center">
                    <?= Html::submitButton(
                        Yii::t('app', 'Sign Up'),
                        ['class' => 'btn btn-primary', 'name' => 'signup-button']
                    ) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
