<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Feadback */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="feadback-form">
    <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" > 
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" > 
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12" > 
                    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
                </div>
            </div>
    	<?php if (!Yii::$app->request->isAjax){ ?>
    	  	<div class="form-group">
    	       <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	    </div>
    	<?php } ?>
    <?php ActiveForm::end(); ?>
</div>
