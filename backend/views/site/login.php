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
      <div class="col s12 z-depth-4 card-panel" style="width: 26%;margin-left: 38%;margin-top: 5%;">
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
            <div class="input-field col s12 center"style="margin-left: 5%;">
              <p class="center login-form-text"><?= Html::encode($this->title) ?></p>
              <img src="/images/logo/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12"style="margin: 0px 0px 0px 0px;">
              <?= $form->field($model, 'username', $fieldOptions1)->textInput(['placeholder' => $model->getAttributeLabel('Имя пользователя')])
               ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12"style="margin: 0px 0px 0px 0px;">
              <?= $form->field($model, 'password', $fieldOptions2)->passwordInput(['placeholder' => $model->getAttributeLabel('Пароль')]) ?>
            </div>
          </div>
          <div class="row" style="margin-left: 2%;">
                    <div class="col s6" >
                            <?= $form
                            ->field($model, 'rememberMe')
                            ->checkbox([
                              'template' => "{input}{label}<div class=\"col-lg-8s\">{error}</div>",
                            ]) ?>
                    </div>
                    <div class="col s6">
                   <?=Html::a('Зарегистрируйтесь!', ['register'],['role'=>'modal-remote'])?>
                    </div>
          </div>
          <div class="row"style="margin-left: 15%;margin-bottom: 20%;">
            <div class="input-field col s12">
              <?= Html::submitButton('Вход', ['class' => 'btn waves-effect waves-light col s12', 'name' => 'login-button']) ?>
            </div>
          </div>
          
          <?php ActiveForm::end(); ?>
        
      </div>
    </div>