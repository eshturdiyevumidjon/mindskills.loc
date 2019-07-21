<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\User;
use backend\models\Subjects;
/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
            <?= $form->field($model, 'price')->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '9',
                                'clientOptions' => ['repeat' => 10, 'greedy' => false]
                            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col s6" >
            <?= $form->field($model, 'subject_id')->dropDownlist(
                      ArrayHelper::map(Subjects::find()->all(),'id','name'),
                      ['prompt'=>'Выберите...']
                  );?>
        </div>
        <div class="col s6" >
            <?= $form->field($model, 'teacher_id')->dropDownlist(
                      ArrayHelper::map(User::find()->where(['type'=>2])->all(),'id','fio'),
                      ['prompt'=>'Выберите...']
                  );?>
        </div>
    </div>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'begin_date')->widget(DatePicker::className(), [
                        'language' => 'ru',
                        'size' => 'sm', 
                        'type'=>DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                        'todayHighlight' => true,
                        'format'=>'dd.mm.yyyy',
                        ]
                    ]) ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [
                        'language' => 'ru',
                        'size' => 'sm', 
                        'type'=>DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                        'todayHighlight' => true,
                        'format'=>'dd.mm.yyyy',
                        ]
                    ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                <?= $form->field($model, 'sum_of_teacher')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '9',
                        'clientOptions' => ['repeat' => 10, 'greedy' => false]
                            ]) ?>
        </div>
        <div class="col s6" >  
                <?=$form->field($model, 'type')->dropDownList($model->getType(), ['prompt' => 'Выберите...','style'=>'margin-top:10px;'])?>
        </div>
    </div>
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
