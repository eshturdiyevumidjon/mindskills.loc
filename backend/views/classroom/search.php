<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>
<tr style="font-size: 14px;">
		<th></th>
		<th>ID</th>
	<?php if($session['Classroom[name]'] === null || $session['Classroom[name]'] == 1){ ?>
		<th>Наименование</th>
	<?php }?>
	<?php if($session['Classroom[company_id]'] === null || $session['Classroom[company_id]'] == 1){ ?> 
		<th>Компания</th>
	<?php }?>
	<?php if($session['Classroom[filial_id]'] === null || $session['Classroom[filial_id]'] == 1){ ?> 
		<th>Филиал</th>
	<?php }?>
		<th>Действия</th>                   
</tr>
<tr>
	<?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
			<td></td>
			<td>
			 	<?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
			</td>
		<?php if($session['Classroom[name]'] === null || $session['Classroom[name]'] == 1){ ?>
			<td>
			  	<?=$form->field($searchModel,'name')->textInput(['class'=>'search',
			    'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
			</td>
		<?php }?>
		<?php if($session['Classroom[company_id]'] === null || $session['Classroom[company_id]'] == 1){ ?>
			<td>
			  	<?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
			</td>
		<?php }?>
		<?php if($session['Classroom[filial_id]'] === null || $session['Classroom[filial_id]'] == 1){ ?>
			<td>
			  	<?=$form->field($searchModel,'filial_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
			</td>
		<?php }?>
			<td></td>
	<?php ActiveForm::end()?>
</tr>