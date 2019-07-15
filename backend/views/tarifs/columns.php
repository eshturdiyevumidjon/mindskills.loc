<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Tarifs;
$model=new Tarifs();
?>
<div class="users-form" style="padding: 20px;">
    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Tarifs[name]" id="1" value="1" <?= ($session['Tarifs[name]']===null || $session['Tarifs[name]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="1"><?=$model->getAttributeLabel('name')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Tarifs[days]" id="2" value="1" <?= ($session['Tarifs[days]']===null || $session['Tarifs[days]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="2" ><?=$model->getAttributeLabel('days')?></label>
	        </label>
	    </div>
	    <div class="col-md-4">
	        <label>
	            <input type="checkbox" name="Tarifs[price]" id="3" value="1" <?= ($session['Tarifs[price]']===null || $session['Tarifs[price]'] == 1) ? 'checked=""': '' ?> > 
	        <label for="3"><?=$model->getAttributeLabel('price')?></label>
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
     		 $.post("/user/columns?all=1");
       $(':checkbox').attr('checked',true);
			}else{
        $.post("/user/columns?all=0");
       $(':checkbox').attr('checked',false);
    }
});
JS
);
?>