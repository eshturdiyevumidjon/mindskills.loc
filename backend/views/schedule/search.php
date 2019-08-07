<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>
<tr style="font-size: 14px;">
    <th></th>
    <th>ID</th>
    <?php if($session['Schedule[name]'] === null || $session['Schedule[name]'] == 1){ ?>
        <th>Наименование</th>
    <?php }?>
    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
    <?php if($session['Schedule[company_id]'] === null || $session['Schedule[company_id]'] == 1){ ?> 
        <th>Компания</th>
    <?php }?>
    <?php }?>
    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
    <?php if($session['Schedule[filial_id]'] === null || $session['Schedule[filial_id]'] == 1){ ?> 
        <th>Филиал</th> 
    <?php }?>
    <?php }?>
    <?php if($session['Schedule[subject_id]'] === null || $session['Schedule[subject_id]'] == 1){ ?>
        <th>Предмет</th>
    <?php }?>
    <?php if($session['Schedule[teacher_id]'] === null || $session['Schedule[teacher_id]'] == 1){ ?>
        <th>Преподаватель</th>
    <?php }?>
    <?php if($session['Schedule[price]'] === null || $session['Schedule[price]'] == 1){ ?>
        <th>Стоимость занятий курса</th>
    <?php }?>
    <?php if($session['Schedule[sum_of_teacher]'] === null || $session['Schedule[sum_of_teacher]'] == 1){ ?>
        <th>Зарплата преподавателю</th>
    <?php }?>
    <?php if($session['Schedule[begin_date]'] === null || $session['Schedule[begin_date]'] == 1){ ?>
        <th>Начало курса</th>
    <?php }?>
    <?php if($session['Schedule[end_date]'] === null || $session['Schedule[end_date]'] == 1){ ?>
        <th>Конец курса</th>
    <?php }?>
    <?php if($session['Schedule[status]'] === null || $session['Schedule[status]'] == 1){ ?>
        <th>Статус</th>
    <?php }?>
    <?php if($session['Schedule[type]'] === null || $session['Schedule[type]'] == 1){ ?>
        <th>Тип занятия</th>
    <?php }?>
        <th>Действия</th>                   
</tr>
<tr>
    <?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
        <td></td>
        <td>
            <?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
        </td>
        <?php if($session['Schedule[name]'] === null || $session['Schedule[name]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'name')->textInput(['class'=>'search',
                'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
        </td>
        <?php }?>
        <?php if(Yii::$app->user->identity->company->type == 1){ ?>
        <?php if($session['Schedule[company_id]'] === null || $session['Schedule[company_id]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        </td>
        <?php }?>
        <?php if($session['Schedule[filial_id]'] === null || $session['Schedule[filial_id]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'filial_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        </td>
        <?php }?>
        <?php }?>
         <?php if($session['Schedule[subject_id]'] === null || $session['Schedule[subject_id]'] == 1){ ?>
         <td>
            <?=$form->field($searchModel,'subject_id')->textInput(['class'=>'search',
             'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
        </td>
        <?php }?>
        <?php if($session['Schedule[teacher_id]'] === null || $session['Schedule[teacher_id]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'teacher_id')->textInput(['class'=>'search',
                'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
        </td>
        <?php }?>
        <?php if($session['Schedule[price]'] === null || $session['Schedule[price]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'price')->textInput(['class'=>'search',
                'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
        </td>
       <?php }?>
       <?php if($session['Schedule[sum_of_teacher]'] === null || $session['Schedule[sum_of_teacher]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'sum_of_teacher')->textInput(['class'=>'search',
                'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
        </td>
        <?php }?>
        <?php if($session['Schedule[begin_date]'] === null || $session['Schedule[begin_date]'] == 1){ ?>
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
                  'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;'
                ]
                ])->label(false) ?> 
        </td>
        <?php }?>
        <?php if($session['Schedule[end_date]'] === null || $session['Schedule[end_date]'] == 1){ ?>
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
                 'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;'
              ]
              ])->label(false) ?>
        </td>
        <?php }?>
        <?php if($session['Schedule[status]'] === null || $session['Schedule[status]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'status')->textInput(['class'=>'search',
                'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
        </td>
        <?php }?>
        <?php if($session['Schedule[type]'] === null || $session['Schedule[type]'] == 1){ ?>
        <td>
            <?=$form->field($searchModel,'type')->textInput(['class'=>'search',
                'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>                    
        </td> 
        <?php }?>
        <td></td>
    <?php ActiveForm::end()?>
</tr>