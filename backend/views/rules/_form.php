<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Rules */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rules-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'users_create')->textInput() ?>

    <?= $form->field($model, 'users_view')->textInput() ?>

    <?= $form->field($model, 'users_update')->textInput() ?>

    <?= $form->field($model, 'users_delete')->textInput() ?>

    <?= $form->field($model, 'inbox_create')->textInput() ?>

    <?= $form->field($model, 'inbox_view')->textInput() ?>

    <?= $form->field($model, 'inbox_update')->textInput() ?>

    <?= $form->field($model, 'inbox_delete')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
