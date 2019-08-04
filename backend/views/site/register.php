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
      <div class="card" style="width: 28%;margin-top: 2%;margin-left:36%; ;">
              <div class="input-field col s12 center">
               <p class="center register-form-text">
                <h5><?= Html::encode($this->title) ?></h5>
              </p>
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
              <div class="input-field col s8" style="margin: 2% 5% 0px 8%;">
                  <?= $form->field($model, 'name', $fieldOptions1)->textInput(['placeholder' => $model->getAttributeLabel('Компания')])?>
              </div>
              <div class="input-field col s8" style="margin: 0px 5% 0px 8%;">
                  <?= $form->field($model, 'Companies_fio', $fieldOptions2)->textInput(['placeholder' => $model->getAttributeLabel('ФИО')])?>
              </div>  
              <div class="input-field col s8" style="margin: 0px 5% 0px 8%;">
                  <?= $form->field($model, 'Companies_phone', $fieldOptions3)->textInput(['placeholder' => $model->getAttributeLabel('Телефон')])?>
              </div> 
              <div class="input-field col s8" style="margin: 0px 5% 0px 8%;">
                  <?= $form->field($model, 'filial_name', $fieldOptions4)->textInput(['placeholder' => $model->getAttributeLabel('Название филиала')])?>
              </div>
              <div class="input-field col s8" style="margin: 0px 5% 0px 8%;">
                  <?= $form->field($model, 'Companiesname', $fieldOptions6)->textInput(['placeholder' => $model->getAttributeLabel('Логин')])?>
              </div> 
              <div class="input-field col s8" style="margin: 0px 5% 0px 8%;">
                  <?= $form->field($model, 'password', $fieldOptions5)->passwordInput(['placeholder' => $model->getAttributeLabel('Парол')])?>
              </div><br>
          <div class="row margin">
              <div class="input-field col s9" style="margin: 5% 5% 0px 10%;">
                  <?= Html::submitButton('Регистрация', ['class' => 'btn waves-effect waves-light col s12','style'=>'margin-left:10px !important;']) ?>
              </div>
          </div><br>
              <?php ActiveForm::end(); ?>
            </p>
          </div>
</div>
</div> 