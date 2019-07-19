<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Companies;
$model=new Companies();
?>
<div class="Companiess-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-6">
	        <label>
	            <input type="checkbox" name="Companies[name]" id="1" value="1" <?= ($session['Companies[name]']===null || $session['Companies[name]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="1"><?=$model->getAttributeLabel('name')?></label>
	        </label>
	    </div>
	    <div class="col-md-6">
	        <label>
	            <input type="checkbox" name="Companies[tarif_id]" id="6" value="1" <?= ($session['Companies[tarif_id]']===null || $session['Companies[tarif_id]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="6"><?=$model->getAttributeLabel('tarif_id')?></label>
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