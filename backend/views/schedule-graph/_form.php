<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Schedule;
use backend\models\Courses;
use backend\models\Classroom;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\ScheduleGraph */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="schedule-graph-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col s12">
            <label class="control-label"><?=$model->getAttributeLabel('type')?></label>   <?= kartik\select2\Select2::widget([
                    'name' => 'type_id'.$model->id,
                    'id' => 'type_id'.$model->id,
                    'value' => $model->type, 
                    'data' => $model->getType(),
                    'options' => [
                        'placeholder' => 'Выберите',
                        'onchange'=>'
                            var a = $( "#type_id'.$model->id.'" ).val();
                            $.post( "/films/set-values?id='.$model->id.'&attribute=type_id&value="+a, function( data ){  });
                            if($( "#type_id'.$model->id.'" ).val()==1){
                                $("#polya").show(1000);
                                $("#polya1").hide(1000);
                            }
                            else{
                                $("#polya").hide(1000);
                                $("#polya1").show(1000);
                            }
                            ' 
                    ],
                    'size' => kartik\select2\Select2::SMALL,
                    'pluginOptions' => [
                    'style'=>'margin-top:20px !important;',
                     ],
                ]) ?>
            </div>
        </div>
         <?php if ($model->type !==1 )
            $class = 'none';
        else
            $class = '';
         ?><br>
        <div class="row" id="polya" style="display:<?=$class?>;">
            <div class="col s6">
                <?=$form->field($model, 'day_of_the_week[]')->widget(Select2::classname(), [
                    'data' => $model->getWeek(),
                    'language' => 'ru',
                    'theme' => Select2::THEME_KRAJEE,
                    'options' => ['placeholder' => 'Выберите',],
                    'pluginOptions' => [
                        'tags' => true,
                    'allowClear' => true,
                    'multiple' => true
                        ],
                ])?>
            </div>
            <div class="col s6">  
                <?=$form->field($model, 'period')->dropDownList($model->getPeriod(), ['prompt' => 'Выберите...',])?>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <?= $form->field($model, 'begin_date')->widget(DatePicker::className(), [
                    'language' => 'ru',
                    'size' => 'sm', 
                    'type'=> DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                    'todayHighlight' => true,
                    'format'=>'dd.mm.yyyy',
                    ]
                ]) ?>
            </div>
            <div class="col s6">
                <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [
                    'language' => 'ru',
                    'size' => 'sm', 
                    'type'=> DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                    'todayHighlight' => true,
                    'format'=>'dd.mm.yyyy',
                    ]
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <?= $form->field($model, 'class_start')->textInput(['class'=>'timepicker','type'=>'time']) ?>
            </div>
            <div class="col s6">
                <?= $form->field($model, 'class_duration')->textInput(['class'=>'timepicker','type'=>'time']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col s6" id="polya1">
                <?= $form->field($model, 'class_date')->widget(DatePicker::className(), [
                    'language' => 'ru',
                    'size' => 'sm', 
                    'type'=> DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                    'todayHighlight' => true,
                    'format'=>'dd.mm.yyyy',
                    ]
                ]) ?>
            </div>
            <div class="col s6" >
                <?= $form->field($model, 'classroom_id')->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(Classroom::find()->all(),'id','name'),
                    'language' => 'ru',
                    'options' => ['placeholder' => 'Выберите...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
        </div>
	    <?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>  

