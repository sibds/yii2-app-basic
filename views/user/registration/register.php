<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dektrium\user\widgets\Connect;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */
\app\assets\LoginAsset::register($this);

$this->title = Yii::t('user', 'Register');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
$(\'input\').iCheck({
      checkboxClass: \'icheckbox_square-blue\',
      radioClass: \'iradio_square-blue\',
      increaseArea: \'20%\' // optional
    });
', \yii\web\View::POS_READY);
?>

<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <?php $form = ActiveForm::begin([
        'id' => 'registration-form',
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
    ]); ?>

    <?= $form->field($model, 'email', [ 'template' => '
                    {input}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    {error}{hint}',
                  'inputOptions' => ['class' => 'form-control', 'tabindex' => '2', 'placeholder' => Yii::t('user', 'Email')]])
                  ->label(false) ?>

    <?= $form->field($model, 'username', [ 'template' => '
                    {input}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    {error}{hint}',
                  'inputOptions' => ['class' => 'form-control', 'tabindex' => '2', 'placeholder' => Yii::t('user', 'Username')]])
                  ->label(false) ?>

    <?php if ($module->enableGeneratingPassword == false): ?>
        <?= $form->field($model, 'password', [ 'template' => '
                    {input}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    {error}{hint}',
                  'inputOptions' => ['class' => 'form-control', 'tabindex' => '2', 'placeholder' => Yii::t('user', 'Password')]])
                ->passwordInput()
                ->label(
                    false
                )  ?>
    <?php endif ?>

    <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">          
          <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
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
     <?= Html::a(Yii::t('user', 'I already have a membership'), ['/user/security/login'], ['class'=>'text-center']) ?>    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
