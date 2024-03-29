<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="subjects-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s12':'col s12'?>" >
    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    	</div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
