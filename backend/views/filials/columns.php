<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Filials;
$model=new Filials();
?>
<div class="Filialss-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
			    <div class="col-md-3">
			        <label>
			            <input type="checkbox" name="Filials[filial_name]" id="1" value="1" <?= ($session['Filials[filial_name]']===null || $session['Filials[filial_name]'] == 1) ? 'checked=""': '' ?> > 
			        <label for="1"><?=$model->getAttributeLabel('filial_name')?></label>
			        </label>
			    </div>
			    <div class="col-md-3">
			        <label>
			            <input type="checkbox" name="Filials[logo]" id="2" value="1" <?= ($session['Filials[logo]']===null || $session['Filials[logo]'] == 1) ? 'checked=""': '' ?> > 
			        <label for="2" ><?=$model->getAttributeLabel('logo')?></label>
			        </label>
			    </div>
			    <div class="col-md-3">
			        <label>
			            <input type="checkbox" name="Filials[admin]" id="3" value="1" <?= ($session['Filials[admin]']===null || $session['Filials[admin]'] == 1) ? 'checked=""': '' ?> > 
			        <label for="3"><?=$model->getAttributeLabel('admin')?></label>
			        </label>
			    </div>
			    <div class="col-md-3">
	        <label>
	            <input type="checkbox" name="Filials[phone]" id="4" value="1" <?= ($session['Filials[phone]']===null || $session['Filials[phone]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="4"><?=$model->getAttributeLabel('phone')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
	    <div class="col-md-3">
	        <label>
	            <input type="checkbox" name="Filials[region_id]" id="5" value="1" <?= ($session['Filials[region_id]']===null || $session['Filials[region_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="5"><?=$model->getAttributeLabel('region_id')?></label>
	        </label>
	    </div>
	     <div class="col-md-3">
	        <label>
	            <input type="checkbox" name="Filials[district_id]" id="7" value="1" <?= ($session['Filials[district_id]']===null || $session['Filials[district_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="7"><?=$model->getAttributeLabel('district_id')?></label>'
	        </label>
	    </div>

	    <div class="col-md-3">
	        <label>
	            <input type="checkbox" name="Filials[address]" id="8" value="1" <?= ($session['Filials[address]']===null || $session['Filials[address]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="8"><?=$model->getAttributeLabel('address')?></label>
	        </label>
	    </div>

	    <div class="col-md-3">
	        <label>
	            <input type="checkbox" name="Filials[site]" id="9" value="1" <?= ($session['Filials[site]']===null || $session['Filials[site]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="9"><?=$model->getAttributeLabel('site')?></label>
	        </label>
	    </div>
	</div>
	<hr/>
	<div class="row">
	    <div class="col-md-3">
	        <label>
	            <input type="checkbox" name="Filials[email]" id="10" value="1" <?= ($session['Filials[email]']===null || $session['Filials[email]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="10"><?=$model->getAttributeLabel('email')?></label>'
	        </label>
	    </div>
	    <div class="col-md-3">
	        <label>
	            <input type="checkbox" name="Filials[company_id]" id="11" value="1" <?= ($session['Filials[company_id]']===null || $session['Filials[company_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="11"><?=$model->getAttributeLabel('company_id')?></label>
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