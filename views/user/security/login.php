<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

\app\assets\LoginAsset::register($this);

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
$(\'input\').iCheck({
      checkboxClass: \'icheckbox_square-blue\',
      radioClass: \'iradio_square-blue\',
      increaseArea: \'20%\' // optional
    });
', \yii\web\View::POS_READY);
?>

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html">Yii2 <b>Basic</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'validateOnBlur' => false,
            'validateOnType' => false,
            'validateOnChange' => false,
            'fieldConfig' => [
                    'options'=>[
                        'class' => 'has-feedback',
                    ],
            ],

        ]) ?>

        <?php if ($module->debug): ?>
            <?= $form->field($model, 'login', [
                'template' => '
                    {input}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    {error}{hint}',
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'class' => 'form-control',
                    'tabindex' => '1', 'placeholder' => Yii::t('user', 'Login')]])->dropDownList(LoginForm::loginList());
            ?>

        <?php else: ?>

            <?= $form->field($model, 'login',
                ['template' => '
                    {input}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    {error}{hint}',
                  'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1',
                    'placeholder' => Yii::t('user', 'Login')]]
            )->label(false);
            ?>

        <?php endif ?>

        <?php if ($module->debug): ?>
            <div class="alert alert-warning">
                <?= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
            </div>
        <?php else: ?>
            <?= $form->field(
                $model,
                'password',
                [ 'template' => '
                    {input}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    {error}{hint}',
                  'inputOptions' => ['class' => 'form-control', 'tabindex' => '2', 'placeholder' => Yii::t('user', 'Password')]])
                ->passwordInput()
                ->label(
                    false
                ) ?>
        <?php endif ?>


        <div class="row">
            <div class="col-xs-6">
                <div class="checkbox icheck">
                    <?php 
                    $this->registerCss('.checkbox label {padding-left: 0px;}');
                    ?>
                    <?= $form->field($model, 'rememberMe')->checkbox(['style'=>'padding-left: 0']) ?>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <?= Html::submitButton(
                    Yii::t('user', 'Sign in'),
                    ['class' => 'btn btn-primary btn-block btn-flat', 'tabindex' => '4']
                ) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <?php if(\Yii::$app->hasProperty('authClientCollection')):?>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <?= Connect::widget([
                'baseAuthUrl' => ['/user/security/auth'],
            ]) ?>
        </div>
        <?php endif ?>
        <!-- /.social-auth-links -->
        <?php if ($module->enablePasswordRecovery): ?>
            <?=Html::a(
                Yii::t('user', 'Forgot password?'),
                ['/user/recovery/request'],
                ['tabindex' => '5']
            )?>
        <?php endif ?>
        <?php if ($module->enableConfirmation): ?>
            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
        <?php endif ?>
        <?php if ($module->enableRegistration): ?>
            <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'),
                    ['/user/registration/register'],
                    ['class'=>'text-center']) ?>
        <?php endif ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
