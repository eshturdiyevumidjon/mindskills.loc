<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Feadback;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FeadbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обратная связь';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
$models = $dataProvider->getModels();
$session = Yii::$app->session;

?>
<style type="text/css">
  .search{
    text-align: center;
  }
</style>
<div class="Feadback-index">
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
                              <li><?=Html::a('<i class="material-icons">refresh</i>',[''],['title' => 'Обновить'])?>
                              </li>
                              <li>
                                <input type="search" name="search" style="display: none;" id="searchfeadback"/>
                              </li>
                              <li>
                                <a href="#" id="showSearchfeadback" title='Поиск'>
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
                                <?php if($session['Feadback[name]'] === null || $session['Feadback[name]'] == 1){ ?>
                                <th>Наименование</th>
                                <?php }?>
                                <?php if($session['Feadback[email]'] === null || $session['Feadback[email]'] == 1){ ?> 
                                <th>Эмаил</th>
                                <?php }?>
                                <?php if($session['Feadback[message]'] === null || $session['Feadback[message]'] == 1){ ?> 
                                <th>Текст</th>
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
                                <?php if($session['Feadback[name]'] === null || $session['Feadback[name]'] == 1){ ?>
                                <td>
                                  <?=$form->field($searchModel,'name')->textInput(['class'=>'search',
                                    'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
                                </td>
                                <?php }?>
                                <?php if($session['Feadback[email]'] === null || $session['Feadback[email]'] == 1){ ?>
                                <td>
                                  <?=$form->field($searchModel,'email')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                                </td>
                                <?php }?>
                                <?php if($session['Feadback[message]'] === null || $session['Feadback[message]'] == 1){ ?>
                                <td>
                                  <?=$form->field($searchModel,'message')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                                </td>
                                <?php }?>
                                <td></td>
                                <?php ActiveForm::end()?>
                            </tr>
                        <tbody id="myTablefeadback">
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
  $("#showSearchfeadback").click(function(){
  $("#searchfeadback").slideToggle("slow");
  });

$("#searchfeadback").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablefeadback tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

 $("[class='search']").blur(function(){
    $.post("/feadback/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefeadback').innerHTML = data;
    });
  });

});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/feadback/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefeadback').innerHTML = data;
        });
      });
});
JS
);
?>
