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
        'inputTemplate' => "<i class='material-icons prefix pt-4'>email</i>{input}"
    ];
?>
<div class="row">
    <div class="col s12">
      <div class="card" style="width: 26%;margin-top: 30px;margin-left:38%; ;">
              <div class="input-field col s12 center">
               <p class="center register-form-text"><h5><?= Html::encode($this->title) ?></h5></p>
              <img src="/images/logo/login-logo.png" alt="" class="circle responsive-img valign profile-image-login" style="width: 100px;">
              </div>
          <div class="row">
              <p><?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                'template' => "{input}{error}",
                ],
                  ]);?>
              <div class="input-field col s10" style="margin: 2px 15px 0px 30px;">
                  <?= $form->field($model, 'name', $fieldOptions1)->textInput(['placeholder' => $model->getAttributeLabel('Компания')])?>
              </div>
              <div class="input-field col s10" style="margin: 0px 15px 0px 30px;">
                  <?= $form->field($model, 'Companies_fio', $fieldOptions2)->textInput(['placeholder' => $model->getAttributeLabel('ФИО')])?>
              </div>  
              <div class="input-field col s10" style="margin: 0px 15px 0px 30px;">
                  <?= $form->field($model, 'Companies_phone', $fieldOptions3)->textInput(['placeholder' => $model->getAttributeLabel('Телефон')])?>
              </div> 
              <div class="input-field col s10" style="margin: 0px 15px 0px 30px;">
                  <?= $form->field($model, 'filial_name', $fieldOptions4)->textInput(['placeholder' => $model->getAttributeLabel('Название филиала')])?>
              </div>
              <div class="input-field col s10" style="margin: 0px 15px 0px 30px;">
                  <?= $form->field($model, 'Companiesname', $fieldOptions6)->textInput(['placeholder' => $model->getAttributeLabel('Логин')])?>
              </div> 
              <div class="input-field col s10" style="margin: 0px 15px 0px 30px;">
                  <?= $form->field($model, 'password', $fieldOptions5)->passwordInput(['placeholder' => $model->getAttributeLabel('Парол')])?>
              </div>
          <div class="row margin">
              <div class="input-field col s10" style="margin: 0px 15px 0px 35px;">
                  <?= Html::submitButton('Регистрация', ['class' => 'btn waves-effect waves-light col s12']) ?>
              </div>
          </div>
              <?php ActiveForm::end(); ?></p>
          </div>
</div>
</div> 