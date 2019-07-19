<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use backend\models\Schedule;
/* @var $this yii\web\View */
/* @var $model backend\models\ScheduleUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-users-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
            <?= $form->field($model, 'payed')->textInput() ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
            <?= $form->field($model, 'unsubscribe')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col s6" >
             <?= $form->field($model, 'schedule_id')->dropDownlist(
                      ArrayHelper::map(Schedule::find()->all(),'id','name'),
                      ['prompt'=>'Select user']
                  );?>
        </div>
        <div class="col s6" >
             <?= $form->field($model, 'pupil_id')->dropDownlist(
                      ArrayHelper::map(User::find()->where(['type'=>3])->all(),'id','fio'),
                      ['prompt'=>'Select user']
                  );?>
        </div>
    </div>
    <div class="row">
        <div class="col s12" >
             <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
    <?php ActiveForm::end(); ?>
    
</div>
