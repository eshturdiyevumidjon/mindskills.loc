<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>
<div class="row">
	<tr style="font-size: 14px;">
		<div class="col s1 m1 l1 xl1">
			<th>ID</th>
		</div>
		<?php if($session['User[image]'] === null || $session['User[image]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>Фото</th>
		</div>
		<?php }?>
		<?php if($session['User[fio]'] === null || $session['User[fio]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>ФИО</th>
		</div>
		<?php }?>
		<?php if($session['User[username]'] === null || $session['User[username]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>Имя пользователа</th>
		</div>
		<?php }?>
		<?php if($session['User[status]'] === null || $session['User[status]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>Статус</th>
		</div>
		<?php }?>
		<?php if($session['User[birthday]'] === null || $session['User[birthday]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>День рождения</th>
		</div>
		<?php }?>
		<?php if($session['User[phone]'] === null || $session['User[phone]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>Телефон</th>
		</div>
		<?php }?>
		<?php if($session['User[balanc]'] === null || $session['User[balanc]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>Баланс</th>
		</div>
		<?php }?>
		<?php if(Yii::$app->user->identity->company->type == 1){ ?>
		<?php if($session['User[company_id]'] === null || $session['User[company_id]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>Компания</th>
		</div>
		<?php } ?>
		<?php } ?>
		<?php if(Yii::$app->user->identity->company->type == 1){ ?>
		<?php if($session['User[filial_id]'] === null || $session['User[filial_id]'] == 1){ ?>
		<div class="col s1 m1 l1 xl1">
			<th>Филиал</th>
		</div>
		<?php } ?>
		<?php } ?>
		<div class="col s12 1 l1 xl1">
			<th>Действия</th>
		</div>
	</tr>
</div>
	<tr>
		<?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm']])?>
			<?php if($session['User[image]'] === null || $session['User[image]'] == 1){ ?>
				<td></td>
			<?php } ?>
				<td>
					<?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm','value'=>'1'])->label(false)?>
				</td>
			<?php if($session['User[fio]'] === null || $session['User[fio]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel,'fio')->textInput(['class'=>'search','style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm'])->label(false)?>
				</td>
			<?php }?>
			<?php if($session['User[username]'] === null || $session['User[username]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel,'username')->textInput(['class'=>'search','style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm'])->label(false)?>
				</td>
			<?php }?>
			<?php if($session['User[status]'] === null || $session['User[status]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel, 'status')->textInput(['class'=>'search','style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm'])->label(false)?>

				</td>
			<?php }?>
			<?php if($session['User[birthday]'] === null || $session['User[birthday]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel,'birthday')->widget(DatePicker::className(), [
						'language' => 'ru',
						'size' => 'sm', 

						'type'=> DatePicker::TYPE_INPUT,
						'pluginOptions' => [
						'todayHighlight' => true,
						'format'=>'dd.mm.yyyy',
						],
						'options'=>[
						'id'=>'birtday',
						'form'=>'searchForm',
						'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;text-align:center !important;'
						]
					])->label(false) ?>
				</td>
			<?php }?>
			<?php if($session['User[phone]'] === null || $session['User[phone]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel,'phone')->textInput(['class'=>'search','style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm'])->label(false)?>
				</td>
			<?php }?>
			<?php if($session['User[balanc]'] === null || $session['User[balanc]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel,'balanc')->textInput(['class'=>'search','style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm'])->label(false)?>
				</td>
			<?php }?>  
			<?php if(Yii::$app->user->identity->company->type == 1){ ?>
			<?php if($session['User[company_id]'] === null || $session['User[company_id]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm'])->label(false)?>
				</td>
			<?php } ?>
			<?php } ?>  
			<?php if(Yii::$app->user->identity->company->type == 1){ ?>
			<?php if($session['User[filial_id]'] === null || $session['User[filial_id]'] == 1){ ?>
				<td>
					<?=$form->field($searchModel,'filial_id')->textInput(['class'=>'search','style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm'])->label(false)?>
				</td>
			<?php } ?>
			<?php } ?>                      
				<td></td>
		<?php ActiveForm::end()?>
	</tr>
