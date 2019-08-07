<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>
<tr style="font-size: 14px;">
		<th></th>
		<th>ID</th>
	<?php if($session['Subjects[name]'] === null || $session['Subjects[name]'] == 1){ ?>
		<th>Наименование</th>
	<?php }?>
	<?php if(Yii::$app->user->identity->company->type == 1){ ?>
	<?php if($session['Subjects[company_id]'] === null || $session['Subjects[company_id]'] == 1){ ?> 
		<th>Компания</th>
	<?php }?>
	<?php }?>
	<?php if(Yii::$app->user->identity->company->type == 1){ ?>
	<?php if($session['Subjects[filial_id]'] === null || $session['Subjects[filial_id]'] == 1){ ?> 
		<th>Филиал</th> 
	<?php }?>
	<?php }?>
		<th>Действия</th>                   
</tr>
<tr>
<?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
	<td></td>
	<td>
	 	<?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
	</td>
	<?php if($session['Subjects[name]'] === null || $session['Subjects[name]'] == 1){ ?>
	<td>
	  	<?=$form->field($searchModel,'name')->textInput(['class'=>'search',
	    'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
	</td>
	<?php }?>
	<?php if(Yii::$app->user->identity->company->type == 1){ ?>
	<?php if($session['Subjects[company_id]'] === null || $session['Subjects[company_id]'] == 1){ ?>
	<td>
	  	<?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	</td>
	<?php }?>
	<?php if($session['Subjects[filial_id]'] === null || $session['Subjects[filial_id]'] == 1){ ?>
	<td>
	  	<?=$form->field($searchModel,'filial_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	</td>
	<?php }?>
	<?php }?>
	<td></td>
<?php ActiveForm::end()?>
</tr>