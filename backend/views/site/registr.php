<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="registr-form">
	<div class="card" style="width: 405px;margin-top: 30px;">
    <?php $form = ActiveForm::begin([
    	'id'=>'registr-form',
    	'enableAjaxValidation'=>true,
    ]); ?>
		<div class="row">
			<?= $form->field($model,'Companiesname')->textInput()?>
		</div>
    	
    	<div class="row">
    		<div class="form-group">
	        <?= Html::submitButton('Создать', ['btn btn-success']) ?>
	    	</div>
		</div>
    <?php ActiveForm::end(); ?>
    </div>
</div>

