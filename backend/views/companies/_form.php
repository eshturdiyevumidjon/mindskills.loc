<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tarifs;
/* @var $this yii\web\View */
/* @var $model backend\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="companies-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
              <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'filial_name')->textInput(['maxlength' => true]) ?>
              </div>
        </div>
        <div class="row">
              <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'Companies_fio')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                  <?= $form->field($model, 'Companies_phone')->widget(\yii\widgets\MaskedInput::className(), [ 'mask' => '+\9\9899-999-99-99']) ?>
              </div>
        </div>
        <div class="row">
              <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'Companiesname')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
              </div>
        </div>
        <div class="row">
              <div class="col s12">
                <?=$form->field($model, 'tarif_id')->dropDownList(Arrayhelper::map(Tarifs::find()->all(),'id','name'), ['prompt' => 'Выберите'])?>
              </div>
        </div>
        <?php if (!Yii::$app->request->isAjax){ ?>
              <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
        <?php } ?>
    <?php ActiveForm::end(); ?>
</div>
