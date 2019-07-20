<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Schedule;
use backend\models\Classroom;
/* @var $this yii\web\View */
/* @var $model backend\models\ScheduleGraph */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-graph-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col s6" >
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
        <div class="col s6" >
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
            <?= $form->field($model, 'schedule_id')->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(Schedule::find()->all(),'id','name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Выберите...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
            <?= $form->field($model, 'classroom_id')->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(Classroom::find()->all(),'id','name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Выберите...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
