<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
$model=new User();
?>
<div class="users-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[image]" id="1" value="1" <?= ($session['User[image]']===null || $session['User[image]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="1"><?=$model->getAttributeLabel('image')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[fio]" id="2" value="1" <?= ($session['User[fio]']===null || $session['User[fio]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="2" ><?=$model->getAttributeLabel('fio')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[username]" id="3" value="1" <?= ($session['User[username]']===null || $session['User[username]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="3"><?=$model->getAttributeLabel('username')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[birthday]" id="4" value="1" <?= ($session['User[birthday]']===null || $session['User[birthday]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="4"><?=$model->getAttributeLabel('birthday')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[phone]" id="5" value="1" <?= ($session['User[phone]']===null || $session['User[phone]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="5"><?=$model->getAttributeLabel('phone')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[type]" id="6" value="1" <?= ($session['User[type]']===null || $session['User[type]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="6"><?=$model->getAttributeLabel('type')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[status]" id="7" value="1" <?= ($session['User[status]']===null || $session['User[status]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="7"><?=$model->getAttributeLabel('status')?></label>
	        </label>
	    </div>
		<?php if(Yii::$app->user->identity->company->type == 1) { ?>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[company_id]" id="8" value="1" <?= ($session['User[company_id]']===null || $session['User[company_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="8"><?=$model->getAttributeLabel('company_id')?></label>'
	        </label>
	    </div>
	    <?php }?>
	    <label>
	            <input type="checkbox" name="User[balanc]" id="9" value="1" <?= ($session['User[balanc]']===null || $session['User[balanc]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="9"><?=$model->getAttributeLabel('balanc')?></label>
	        </label>
	    </div>
	</div>
		<?php if(Yii::$app->user->identity->company->type == 1) { ?>
	<hr/>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="User[filial_id]" id="10" value="1" <?= ($session['User[filial_id]']===null || $session['User[filial_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="10"><?=$model->getAttributeLabel('filial_id')?></label>
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
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
JS
);
?>

