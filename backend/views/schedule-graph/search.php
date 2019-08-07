<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>
<tr style="font-size: 14px;">
  <th>
  </th>
  <th>ID</th>
  <?php if($session['ScheduleGraph[schedule_id]'] === null || $session['ScheduleGraph[schedule_id]'] == 1){ ?>
  <th>Расписание</th>
  <?php }?>
  <?php if($session['ScheduleGraph[classroom_id]'] === null || $session['ScheduleGraph[classroom_id]'] == 1){ ?> 
  <th>Аудитория</th>
  <?php }?>
  <?php if($session['ScheduleGraph[begin_date]'] === null || $session['ScheduleGraph[begin_date]'] == 1){ ?>
  <th>Дата начало занятий</th>
  <?php }?>
  <?php if($session['ScheduleGraph[end_date]'] === null || $session['ScheduleGraph[end_date]'] == 1){ ?>
  <th>Дата окончание занятий</th>
  <?php }?>
  <th>Действия</th>                   
</tr>
<tr>
  <?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
      <td></td>
      <td>
          <?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
      </td>
      <?php if($session['ScheduleGraph[schedule_id]'] === null || $session['ScheduleGraph[schedule_id]'] == 1){ ?>
      <td>
          <?=$form->field($searchModel,'schedule_id')->textInput(['class'=>'search',
            'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
      </td>
      <?php }?>
      <?php if($session['ScheduleGraph[classroom_id]'] === null || $session['ScheduleGraph[classroom_id]'] == 1){ ?>       
      <td>
          <?=$form->field($searchModel,'classroom_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
      </td>
      <?php }?>
      <?php if($session['ScheduleGraph[begin_date]'] === null || $session['ScheduleGraph[begin_date]'] == 1){ ?>
      <td>
          <?=$form->field($searchModel,'begin_date')->widget(DatePicker::className(), [
            'language' => 'ru',
            'size' => 'sm', 
            'type'=> DatePicker::TYPE_INPUT,
            'pluginOptions' => [
            'todayHighlight' => true,
            'format'=>'dd.mm.yyyy',
            ],
            'options'=>[
              'id'=>'begin_date',
              'form'=>'searchForm2',
              'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;text-align:center !important;'
            ]
            ])->label(false) ?>
      </td>
      <?php }?>
      <?php if($session['ScheduleGraph[end_date]'] === null || $session['ScheduleGraph[end_date]'] == 1){ ?>
      <td>
        <?=$form->field($searchModel,'end_date')->widget(DatePicker::className(), [
          'language' => 'ru',
          'size' => 'sm', 
          'type'=> DatePicker::TYPE_INPUT,
          'pluginOptions' => [
          'todayHighlight' => true,
          'format'=>'dd.mm.yyyy',
          ],
          'options'=>[
            'id'=>'end_date',
            'form'=>'searchForm2',
            'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;text-align:center !important;'
          ]
          ])->label(false) ?>
      </td>
      <?php }?>
      <td></td>
  <?php ActiveForm::end()?>
</tr>