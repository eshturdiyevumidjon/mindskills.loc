<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>

<tr style="font-size: 14px;">
		<th></th>
		<th>ID</th>
	<?php if($session['ScheduleUsers[schedule_id]'] === null || $session['ScheduleUsers[schedule_id]'] == 1){ ?>
		<th>Расписание</th>
	<?php }?>
	<?php if($session['ScheduleUsers[pupil_id]'] === null || $session['ScheduleUsers[pupil_id]'] == 1){ ?> 
		<th>Ученик</th>
	<?php }?>
	<?php if($session['ScheduleUsers[payed]'] === null || $session['ScheduleUsers[payed]'] == 1){ ?>
		<th>Размер оплаты</th>
	<?php }?>
	<?php if($session['ScheduleUsers[comment]'] === null || $session['ScheduleUsers[comment]'] == 1){ ?>
		<th>Комментария</th>
	<?php }?>
	<?php if($session['ScheduleUsers[unsubscribe]'] === null || $session['ScheduleUsers[unsubscribe]'] == 1){ ?>
		<th>Отписать</th>
	<?php }?>
		<th>Действия</th>                   
</tr>
<tr>
	<?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
		<td></td>
		<td>
			<?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
		</td>
		<?php if($session['ScheduleUsers[schedule_id]'] === null || $session['ScheduleUsers[schedule_id]'] == 1){ ?>
		<td>
			<?=$form->field($searchModel,'schedule_id')->textInput(['class'=>'search',
		  		'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
		</td>
		<?php }?>
		<?php if($session['ScheduleUsers[pupil_id]'] === null || $session['ScheduleUsers[pupil_id]'] == 1){ ?>
		<td>
			<?=$form->field($searchModel,'pupil_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
		</td>
		<?php }?>
		<?php if($session['ScheduleUsers[payed]'] === null || $session['ScheduleUsers[payed]'] == 1){ ?>
		<td>
			<?=$form->field($searchModel,'payed')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
		</td>
		<?php }?>
		<?php if($session['ScheduleUsers[comment]'] === null || $session['ScheduleUsers[comment]'] == 1){ ?>
		<td>
			<?=$form->field($searchModel,'comment')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
		</td>
		<?php }?>
		<?php if($session['ScheduleUsers[unsubscribe]'] === null || $session['ScheduleUsers[unsubscribe]'] == 1){ ?>
		<td>
			<?=$form->field($searchModel,'unsubscribe')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
		</td>
		<?php }?>
		<td></td>
	<?php ActiveForm::end()?>
</tr>