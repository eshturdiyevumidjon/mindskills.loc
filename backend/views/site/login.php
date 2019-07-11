<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => [],
    'inputTemplate' => "<i class='material-icons prefix pt-5'>person_outline</i>{input}"
];

$fieldOptions2 = [
    'options' => [],
    'inputTemplate' => "<i class='material-icons prefix pt-5'>lock_outline</i>{input}"
];
?>


<!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
          <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'options' => [
                'class' => 'login-form'
             ],
            'fieldConfig' => [
                'template' => "{input}{error}",
                'labelOptions' => ['class' => 'center-align'],
            ],
          ]); ?>
          <div class="row">
            <div class="input-field col s12 center">
              <img src="/images/logo/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
              <p class="center login-form-text"><?= Html::encode($this->title) ?></p>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <?= $form
              ->field($model, 'username', $fieldOptions1)
              // ->label(false)
              ->textInput(['placeholder' => $model->getAttributeLabel('Имя пользователя')])
               ?>
              <!-- <label for="username" class="center-align">Username</label> -->
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <?= $form
                ->field($model, 'password', $fieldOptions2)
                // ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('Пароль')]) ?>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12 ml-2 mt-3">
              <?= $form
              ->field($model, 'rememberMe')
              ->checkbox([
            'template' => "{input}{label}<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <?= Html::submitButton('Вход', ['class' => 'btn waves-effect waves-light col s12', 'name' => 'login-button']) ?>
            </div>
          </div>
          
          <?php ActiveForm::end(); ?>
        
      </div>
    </div>