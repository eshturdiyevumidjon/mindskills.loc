<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Companies;
$model=new Companies();
?>
<div class="Companiess-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Companies[name]" id="1" value="1" <?= ($session['Companies[name]']===null || $session['Companies[name]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="1"><?=$model->getAttributeLabel('name')?></label>
	        </label>
	    </div>
	    <?php if(Yii::$app->user->identity->company->type == 1) { ?>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Companies[filial_name]" id="2" value="1" <?= ($session['Companies[filial_name]']===null || $session['Companies[filial_name]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="2" ><?=$model->getAttributeLabel('filial_name')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Companies[Companies_fio]" id="3" value="1" <?= ($session['Companies[Companies_fio]']===null || $session['Companies[Companies_fio]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="3"><?=$model->getAttributeLabel('Companies_fio')?></label>
	        </label>
	    </div>
	<?php }?>
	</div>
	<hr/>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Companies[Companiesname]" id="4" value="1" <?= ($session['Companies[Companiesname]']===null || $session['Companies[Companiesname]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="4"><?=$model->getAttributeLabel('Companiesname')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Companies[Companies_phone]" id="5" value="1" <?= ($session['Companies[Companies_phone]']===null || $session['Companies[Companies_phone]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="5"><?=$model->getAttributeLabel('Companiesphone')?></label>
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
    $('#markAll').change(function(){
     if($(this).is(":checked")){
       $(':checkbox').attr('checked',true);
           }else{
       $(':checkbox').attr('checked',false);
    }
});
JS
);
?>