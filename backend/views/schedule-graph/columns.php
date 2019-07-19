<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\ScheduleGraph;
$model=new ScheduleGraph();
?>
<div class="users-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-6">
	        <label>
	            <input type="checkbox" name="ScheduleGraph[schedule_id]" id="1" value="1" <?= ($session['ScheduleGraph[schedule_id]']===null || $session['ScheduleGraph[schedule_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="1"><?=$model->getAttributeLabel('schedule_id')?></label>
	        </label>
	    </div>
		<div class="col-md-6">
	        <label>
	            <input type="checkbox" name="ScheduleGraph[classroom_id]" id="2" value="1" <?= ($session['ScheduleGraph[classroom_id]']===null || $session['ScheduleGraph[classroom_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="2" ><?=$model->getAttributeLabel('classroom_id')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
    <div class="row">
	    <div class="col-md-6">
	        <label>
	            <input type="checkbox" name="ScheduleGraph[begin_date]" id="3" value="1" <?= ($session['ScheduleGraph[begin_date]']===null || $session['ScheduleGraph[begin_date]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="3"><?=$model->getAttributeLabel('begin_date')?></label>
	        </label>
	    </div>
	    <div class="col-md-6">
	        <label>
	            <input type="checkbox" name="ScheduleGraph[end_date]" id="4" value="1" <?= ($session['ScheduleGraph[end_date]']===null || $session['ScheduleGraph[end_date]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="4"><?=$model->getAttributeLabel('end_date')?></label>
	        </label>
	    </div>
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
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
JS
);
?>