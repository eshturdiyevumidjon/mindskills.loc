<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tarifs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifs-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>" >        
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>" >
            <?= $form->field($model, 'days')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>" >
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
