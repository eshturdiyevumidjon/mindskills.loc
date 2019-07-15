<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Courses;
$model=new Courses();
?>
<div class="Coursess-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[name]" id="1" value="1" <?= ($session['Courses[name]']===null || $session['Courses[name]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="1"><?=$model->getAttributeLabel('name')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[subject_id]" id="Courses_fio" value="1" <?= ($session['Courses[subject_id]']===null || $session['Courses[subject_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="Courses_fio" ><?=$model->getAttributeLabel('subject_id')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[user_id]" id="3" value="1" <?= ($session['Courses[user_id]']===null || $session['Courses[user_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="3"><?=$model->getAttributeLabel('user_id')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[begin_date]" id="4" value="1" <?= ($session['Courses[begin_date]']===null || $session['Courses[begin_date]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="4"><?=$model->getAttributeLabel('begin_date')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[end_date]" id="5" value="1" <?= ($session['Courses[end_date]']===null || $session['Courses[end_date]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="5"><?=$model->getAttributeLabel('end_date')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[cost]" id="6" value="1" <?= ($session['Courses[cost]']===null || $session['Courses[cost]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="6"><?=$model->getAttributeLabel('cost')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[prosent_for_teacher]" id="7" value="1" <?= ($session['Courses[prosent_for_teacher]']===null || $session['Courses[prosent_for_teacher]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="7"><?=$model->getAttributeLabel('prosent_for_teacher')?></label>
	        </label>
	    </div>
	    <?php if(Yii::$app->user->identity->company->type == 1) { ?>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[company_id]" id="8" value="1" <?= ($session['Courses[company_id]']===null || $session['Courses[company_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="8"><?=$model->getAttributeLabel('company_id')?></label>'
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Courses[filial_id]" id="9" value="1" <?= ($session['Courses[filial_id]']===null || $session['Courses[filial_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="9"><?=$model->getAttributeLabel('filial_id')?></label>
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
    $('#markAll').change(function(){
    $.post("/user/columns?all="+$(this).val());

     if($(this).is(":checked")){
       $(':checkbox').attr('checked',true);
           }else{
       
       $(':checkbox').attr('checked',false);
    }
});
JS
);
?>