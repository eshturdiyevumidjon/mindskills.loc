<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php
    $fieldOptions1 = [
        'options' => [],
        'inputTemplate' => "<i class='material-icons prefix pt-4'>account_balance</i>{input}"
    ];
    $fieldOptions2 = [
        'options' => [],
        'inputTemplate' => "<i class='material-icons prefix pt-4'>person</i>{input}"
    ];
    $fieldOptions3 = [
        'options' => [],
        'inputTemplate' => "<i class='material-icons prefix pt-4'>phone</i>{input}"
    ];
    $fieldOptions4 = [
        'options' => [],
        'inputTemplate' => "<i class='material-icons prefix pt-4'>store</i>{input}"
    ];
    $fieldOptions5 = [
        'options' => [],
        'inputTemplate' => "<i class='material-icons prefix pt-4'>lock</i>{input}"
    ];
    $fieldOptions6 = [
        'options' => [],
        'inputTemplate' => "<i class='material-icons prefix pt-4'>lock_outline</i>{input}"
    ];
?>
<div class="row margin">
    <div class="col  s12">
      <div class="card" style="width: 425px;">
              <div class="input-field col s12 center">
               <h5>Добро пожаловать!</h5>
              <img src="/images/logo/login-logo.png" alt="" class="circle responsive-img valign profile-image-login" style="width: 100px;">
              <p class="center login-form-text"><?= Html::encode($this->title) ?></p>
              </div>
          <div class="row margin">
              <p><?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                'template' => "{input}{error}",
                ],
                  ]);?>
              <div class="input-field col s12" >
                  <?= $form->field($model, 'name', $fieldOptions1)->textInput(['placeholder' => $model->getAttributeLabel('Компания')])?>
              </div>
              <div class="input-field col  s12">
                  <?= $form->field($model, 'Companies_fio', $fieldOptions2)->textInput(['placeholder' => $model->getAttributeLabel('Пользователь')])?>
              </div>  
              <div class="input-field col  s12">
                  <?= $form->field($model, 'Companies_phone', $fieldOptions3)->textInput(['placeholder' => $model->getAttributeLabel('Телефон')])?>
              </div> 
              <div class="input-field col  s12">
                  <?= $form->field($model, 'filial_name', $fieldOptions4)->textInput(['placeholder' => $model->getAttributeLabel('Филиал')])?>
              </div> 
              <div class="input-field col  s12">
                  <?= $form->field($model, 'password', $fieldOptions5)->passwordInput(['placeholder' => $model->getAttributeLabel('Парол')])?>
              </div> 
              <div class="input-field col  s12">
                  <?= $form->field($model, 'Companiesname', $fieldOptions6)->textInput(['placeholder' => $model->getAttributeLabel('Имя пользователя')])?>
              </div>
          <div class="row margin">
              <div class="input-field col s12">
                  <?= Html::submitButton('Регистрация', ['class' => 'btn waves-effect waves-light col s12', 'name' => 'login-button']) ?>
              </div>
          </div>
              <?php ActiveForm::end(); ?></p>
          </div>
</div>
</div> 