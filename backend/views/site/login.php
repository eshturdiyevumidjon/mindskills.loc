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
    <div id="loader-wrapper" >
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel" style="width: 26%;margin-left: 37%;margin-top: 3%;">
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
          ]); ?><br>
          <div class="row">
            <div class="input-field col s12 center" style="margin-left: 5%;">
              <p class="center login-form-text"><h5><?= Html::encode($this->title) ?></h5></p>
              <img src="/images/logo/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12" style="margin: 0px 0px 0px 0px;">
              <?= $form->field($model, 'username', $fieldOptions1)->textInput(['placeholder' => $model->getAttributeLabel('Имя пользователя')])
               ?>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12" style="margin: 0px 0px 0px 0px;">
              <?= $form->field($model, 'password', $fieldOptions2)->passwordInput(['placeholder' => $model->getAttributeLabel('Пароль')]) ?>
            </div>
          </div><br>
          <div class="row margin">
                    <div class="col s7" style="margin: 0px 0px 0px 0px;" >
                      <lable style="margin-left: 5px;">
                        <input type="checkbox" name="Schedule[name]" id="1" value="1"> 
                        <label for="1"><h6>RememberMe</h6></label>
                      </lable>
                    </div>
                    <div class="col s5" style="margin: 0px 0px 0px 0px;">
                   <?=Html::a('<h6>Регистрация</h6>', ['register'],['role'=>'modal-remote'])?>
                    </div>
          </div><br>
          <div class="row margin">
            <div class="input-field col s12" style="margin: 10px 0px 20px 2px;">
              <?= Html::submitButton('Вход', ['class' => 'btn waves-effect waves-light col s12', 'name' => 'login-button','style'=>'margin-left:20px !important;']) ?>
            </div>
          </div><br>
          <?php ActiveForm::end(); ?>
      </div>
    </div>