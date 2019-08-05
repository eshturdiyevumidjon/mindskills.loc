<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Schedule;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;
$models = $dataProvider->getModels();
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<style type="text/css">
  .search{
    text-align: center;
  }
</style>
<div class="schedule-index">
    <div id="ajaxCrudDatatable">
        <div class="row">
            <div class="col s12 m12">
              <div class="card">
                <nav class=" purple">
                    <div class="nav-wrapper ">
                      <a href="#!" class="brand-logo">
                        <p style="font-size: 22px;margin-left: 20px;">
                          <i class="material-icons">view_list</i>
                          <?=Html::encode($this->title)?>
                        </p>
                      </a>
                      <ul class="right hide-on-med-and-down">
                        <li>
                          <?=Html::a('Сортировка', ['columns'],['role' => 'modal-remote','title' => 'Сортировка с колонок'])?>
                        </li>
                        <li>
                          <?= Html::a('<i class="material-icons">add</i>', ['create'],['title' => 'Создать','role' => 'modal-remote'])?>
                        </li>
                        <li>
                          <?=Html::a('<i class="material-icons">refresh</i>',[''],['title' => 'Обновить'])?>
                        </li>
                        <li>
                          <input type="search" name="search" style="display: none;" id="searchschedule"/>
                        </li>
                        <li>
                          <a href="#" id="showsearchschedule" title='Поиск'>
                            <i class="material-icons">search</i>
                          </a>
                        </li>
                      </ul>
                    </div>
                </nav>
<?php Pjax::begin(['enablePushState' => false,'id' => 'crud-datatable-pjax'])?>
<div class="section" >
    <div id="row-grouping" class="section">
        <div class="row">
            <div class="col s11" style="margin:  20px 40px 20px 40px">
              <table class="bordered highlight centered" cellspacing="0" width="100%">
                <thead>
                    <tr style="font-size: 14px;">
                        <th>
                        </th>
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
                </thead>
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
                <tbody id="myTableschedule">
                    <?=$this->render('tbody',['dataProvider'=>$dataProvider])?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
<?php Pjax::end()?>
              </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
<?php
$this->registerJs(<<<JS
$(document).ready(function(){
  $("#showsearchschedule").click(function(){
  $("#searchschedule").slideToggle("slow");
  });
$("#searchschedule").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableschedule tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
$.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
    
    document.getElementById('myTableschedule').innerHTML = data;
});
});

  $("#begin_date").change(function(){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
    });


  $("#end_date").change(function(){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
    });

});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
        });
      });

      $("#begin_date").change(function( event ){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
     });

      $("#end_date").change(function( event ){
        $.post("/schedule/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTableschedule').innerHTML = data;
    });
     });

});
JS
);
?>