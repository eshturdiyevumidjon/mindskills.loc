<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Classroom;
$model=new Classroom();
?>
<div class="users-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Classroom[name]" id="1" value="1" <?= ($session['Classroom[name]'] === null || $session['Classroom[name]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="1"><?=$model->getAttributeLabel('name')?></label>
	        </label>
	    </div>
	    <?php if(Yii::$app->user->identity->company->type == 1) { ?>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Classroom[company_id]" id="2" value="1" <?= ($session['Classroom[company_id]'] === null || $session['Classroom[company_id]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="2" ><?=$model->getAttributeLabel('company_id')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Classroom[filial_id]" id="3" value="1" <?= ($session['Classroom[filial_id]'] === null || $session['Classroom[filial_id]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="3"><?=$model->getAttributeLabel('filial_id')?></label>
	        </label>
	    </div>
	<?php }?>
	</div>
	<hr/>
    <div class="row">
        <div class="col-md-12">
        	<form>
	        <label style="display:inline-block;padding-bottom: 5px;">
	            <input type="checkbox" id="markAll" value="1"> 
	        	<label for="markAll" style="color : red;">Выделить все</label>
	        </label>
	       
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>     
<?php 
$this->registerJs(<<<JS
 $("#markAll").click(function(){
 $("input[type = checkbox]").prop('checked', $(this).prop('checked'));
});
JS
);
?>