<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Schedule;
$model=new Schedule();
?>
<div class="users-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[name]" id="1" value="1" <?= ($session['Schedule[name]'] === null || $session['Schedule[name]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="1"><?=$model->getAttributeLabel('name')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[subject_id]" id="2" value="1" <?= ($session['Schedule[subject_id]'] === null || $session['Schedule[subject_id]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="2"><?=$model->getAttributeLabel('subject_id')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[teacher_id]" id="3" value="1" <?= ($session['Schedule[teacher_id]'] === null || $session['Schedule[teacher_id]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="3"><?=$model->getAttributeLabel('teacher_id')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[price]" id="4" value="1" <?= ($session['Schedule[price]'] === null || $session['Schedule[price]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="4"><?=$model->getAttributeLabel('price')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[begin_date]" id="5" value="1" <?= ($session['Schedule[begin_date]'] === null || $session['Schedule[begin_date]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="5"><?=$model->getAttributeLabel('begin_date')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[end_date]" id="6" value="1" <?= ($session['Schedule[end_date]'] === null || $session['Schedule[end_date]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="6"><?=$model->getAttributeLabel('end_date')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[sum_of_teacher]" id="7" value="1" <?= ($session['Schedule[sum_of_teacher]'] === null || $session['Schedule[sum_of_teacher]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="7"><?=$model->getAttributeLabel('sum_of_teacher')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[status]" id="8" value="1" <?= ($session['Schedule[status]'] === null || $session['Schedule[status]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="8"><?=$model->getAttributeLabel('status')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Schedule[type]" id="9" value="1" <?= ($session['Schedule[type]'] === null || $session['Schedule[type]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="9"><?=$model->getAttributeLabel('type')?></label>
	        </label>
	    </div>
	</div>
	<?php if(Yii::$app->user->identity->company->type == 1) { ?>
		<hr/>
	    <div class="row">
		    <div class="col-md-4">
		        <label>
		            <input type="checkbox" name="Schedule[company_id]" id="10" value="1" <?= ($session['Schedule[company_id]'] === null || $session['Schedule[company_id]'] == 1) ? 'checked = ""': '' ?> > 
		        	<label for="10" ><?=$model->getAttributeLabel('company_id')?></label>
		        </label>
		    </div>
		    <div class="col-md-4">
		        <label>
		            <input type="checkbox" name="Schedule[filial_id]" id="11" value="1" <?= ($session['Schedule[filial_id]'] === null || $session['Schedule[filial_id]'] == 1) ? 'checked = ""': '' ?> > 
		        	<label for="11"><?=$model->getAttributeLabel('filial_id')?></label>
		        </label>
		    </div>
		</div>
	<?php }?>
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