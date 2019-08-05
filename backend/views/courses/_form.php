<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\models\Subjects;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Courses */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="courses-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s12':'col s12'?>" >
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <?=$form->field($model, 'subject_id')->dropDownList(Arrayhelper::map(Subjects::find()->all(),'id','name'), ['prompt' => 'Выберите'])?>
        </div>
    </div>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
            <?= $form->field($model, 'begin_date')->widget(DatePicker::className(), [
                'language' => 'ru',
                'size' => 'sm',
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true
                ]
            ]) ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
            <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [
                'language' => 'ru',
                'size' => 'sm',
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true
                ]
            ]) ?>      
        </div>
    </div>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >            
            <?= $form->field($model, 'cost')->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '9',
                                'clientOptions' => ['repeat' => 10, 'greedy' => false]
                            ]) ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
             <?= $form->field($model, 'prosent_for_teacher')->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '9',
                                'clientOptions' => ['repeat' => 10, 'greedy' => false]
                            ]) ?>
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
    <?php ActiveForm::end(); ?>
</div>

