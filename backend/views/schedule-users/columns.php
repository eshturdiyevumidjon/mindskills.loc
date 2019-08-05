<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\ScheduleUsers;

$model=new ScheduleUsers();
?>
<div class="users-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
		<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="ScheduleUsers[schedule_id]" id="1" value="1" <?= ($session['ScheduleUsers[schedule_id]'] === null || $session['ScheduleUsers[schedule_id]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="1"><?=$model->getAttributeLabel('schedule_id')?></label>
	        </label>
	    </div>
		<div class="col-md-4">
	        <label>
	            <input type="checkbox" name="ScheduleUsers[pupil_id]" id="2" value="1" <?= ($session['ScheduleUsers[pupil_id]'] === null || $session['ScheduleUsers[pupil_id]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="2" ><?=$model->getAttributeLabel('pupil_id')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="ScheduleUsers[payed]" id="3" value="1" <?= ($session['ScheduleUsers[payed]'] === null || $session['ScheduleUsers[payed]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="3" ><?=$model->getAttributeLabel('payed')?></label>
	        </label>
	    </div>
		</div>
		<hr/>
    	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="ScheduleUsers[comment]" id="4" value="1" <?= ($session['ScheduleUsers[comment]'] === null || $session['ScheduleUsers[comment]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="4"><?=$model->getAttributeLabel('comment')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="ScheduleUsers[unsubscribe]" id="5" value="1" <?= ($session['ScheduleUsers[unsubscribe]'] === null || $session['ScheduleUsers[unsubscribe]'] == 1) ? 'checked = ""': '' ?> > 
	        	<label for="5"><?=$model->getAttributeLabel('unsubscribe')?></label>
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
 $("input[type = checkbox]").prop('checked', $(this).prop('checked'));
});
JS
);
?>