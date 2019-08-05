<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Feadback;

$model=new Feadback();
?>
<div class="users-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
		<div class="row">
		    <div class="col-md-4">
		        <label>
		            <input type="checkbox" name="Feadback[name]" id="1" value="1" <?= ($session['Feadback[name]'] === null || $session['Feadback[name]'] == 1) ? 'checked = ""': '' ?> > 
		        	<label for="1"><?=$model->getAttributeLabel('name')?></label>
		        </label>
		    </div>
		    <div class="col-md-4">
		        <label>
		            <input type="checkbox" name="Feadback[email]" id="2" value="1" <?= ($session['Feadback[email]'] === null || $session['Feadback[email]'] == 1) ? 'checked = ""': '' ?> > 
		        	<label for="2" ><?=$model->getAttributeLabel('email')?></label>
		        </label>
		    </div>
		    <div class="col-md-4">
		        <label>
		            <input type="checkbox" name="Feadback[message]" id="3" value="1" <?= ($session['Feadback[message]'] === null || $session['Feadback[message]'] == 1) ? 'checked = ""': '' ?> > 
		        	<label for="3"><?=$model->getAttributeLabel('message')?></label>
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