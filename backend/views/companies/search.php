<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>
<tr style="font-size: 14px;">
		<th>ID</th>
	<?php if($session['Companies[name]'] === null || $session['Companies[name]'] == 1){ ?>
		<th>Наименование</th>
	<?php }?>
	<?php if($session['Companies[tarif_id]'] === null || $session['Companies[tarif_id]'] == 1){ ?>
		<th>Тариф</th>
	<?php }?>
		<th>Действия</th>
</tr>
<tr>
	<?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
			<td>
				<?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
			</td>
		<?php if($session['Companies[name]'] === null || $session['Companies[name]'] == 1){ ?>
			<td>
				<?=$form->field($searchModel,'name')->textInput(['class'=>'search',
			'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
			</td>
		<?php }?>
		<?php if($session['Companies[tarif_id]'] === null || $session['Companies[tarif_id]'] == 1){ ?>
			<td>
				<?=$form->field($searchModel,'tarif_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
			</td>
		<?php }?>
		<td></td>
	<?php ActiveForm::end()?>
</tr>