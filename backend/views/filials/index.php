<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Filials;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FilialsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Филиалы';
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
<div class="filials-index">
    <div id="ajaxCrudDatatable">
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                  <nav class=" purple">
                    <div class="nav-wrapper ">
                      <a href="#!" class="brand-logo">
                        <p style="font-size: 22px;margin-left: 20px;"><i class="material-icons">view_list</i><?=Html::encode($this->title)?></p>
                      </a>
                      <ul class="right hide-on-med-and-down">
                          <li>
                             <?=Html::a('Сортировка', ['columns'],['role' => 'modal-remote','title' => 'Сортировка с колонок'])?>
                          </li>
                          <li>
                            <?= Html::a('<i class="material-icons">add</i>', ['create'],['role' => 'modal-remote','title' => 'Создать'])?>
                          </li>
                          <li>
                            <?=Html::a('<i class="material-icons">refresh</i>',[''],
                                      ['title' => 'Обновить'])?>
                          </li>
                          <li>
                            <input type="search" name="searchfilials" style="display: none;" id="searchfilials">
                          </li>
                          <li>
                            <a href="#" id="showSearchfilials" title='Поиск'> 
                              <i class="material-icons">search</i>
                            </a>
                          </li>
                      </ul>
                    </div>
                  </nav>
<?php Pjax::begin(['enablePushState' => false,'id' => 'crud-datatable-pjax'])?>
<div class="section">
    <div id="row-grouping" class="section">
        <div class="row">
            <div class="col s11" style="margin:  20px 40px 20px 40px">
                <table class="bordered highlight centered" cellspacing="0" width="100%">
                  <thead>
                      <tr style="font-size: 14px;">
                          <th>ID</th>
                          <?php if($session['Filials[logo]'] === null || $session['Filials[logo]'] == 1)
                          { ?>
                          <th>Логотип</th>
                          <?php }?>
                          <?php if($session['Filials[filial_name]'] === null || $session['Filials[filial_name]'] == 1)
                          { ?>
                          <th>Наименование</th>
                          <?php }?>
                          <?php if($session['Filials[admin]'] === null || $session['Filials[admin]'] == 1)
                          { ?>
                          <th>ФИО</th>
                          <?php }?>
                          <?php if($session['Filials[phone]'] === null || $session['Filials[phone]'] == 1)
                          { ?>
                          <th>Телефон</th>
                          <?php }?>
                          <?php if($session['Filials[region_id]'] === null || $session['Filials[region_id]'] == 1)
                          { ?>
                          <th>Область</th>
                          <?php }?>
                          <?php if($session['Filials[district_id]'] === null || $session['Filials[district_id]'] == 1)
                          { ?>
                          <th>Район</th>
                          <?php }?>
                          <?php if($session['Filials[address]'] === null || $session['Filials[address]'] == 1)
                          { ?>
                          <th>Адрес</th>
                          <?php }?>
                          <?php if($session['Filials[site]'] === null || $session['Filials[site]'] == 1)
                          { ?>
                          <th>Сайт филиала</th>
                          <?php }?>
                          <?php if($session['Filials[email]'] === null || $session['Filials[email]'] == 1)
                          { ?>
                          <th>Эмаил</th>
                          <?php }?>
                          <?php if($session['Filials[company_id]'] === null || $session['Filials[company_id]'] == 1)
                          { ?>
                          <th>Компания</th>
                          <?php }?>
                          <th>Действия</th>
                      </tr>
                  </thead>
                      <tr>
                          <?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
                           <?php if($session['Filials[logo]'] === null || $session['Filials[logo]'] == 1)
                            { ?>
                          <td></td>
                          <?php }?>
                          <td>
                           <?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
                          </td>
                            <?php if($session['Filials[filial_name]'] === null || $session['Filials[filial_name]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'filial_name')->textInput(['class'=>'search',
                              'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
                          </td>
                            <?php }?>

                            <?php if($session['Filials[admin]'] === null || $session['Filials[admin]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'admin')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                            <?php }?>
                          <?php if($session['Filials[phone]'] === null || $session['Filials[phone]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'phone')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                          <?php }?>
                          <?php if($session['Filials[district_id]'] === null || $session['Filials[district_id]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'district_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                          <?php }?>
                          <?php if($session['Filials[region_id]'] === null || $session['Filials[region_id]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'region_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                          <?php }?>
                          <?php if($session['Filials[address]'] === null || $session['Filials[address]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'address')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                          <?php }?>
                          <?php if($session['Filials[site]'] === null || $session['Filials[site]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'site')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                          <?php }?>
                          <?php if($session['Filials[email]'] === null || $session['Filials[email]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'email')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                          <?php }?>
                            <?php if($session['Filials[company_id]'] === null || $session['Filials[company_id]'] == 1)
                            { ?>
                          <td>
                            <?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
                          </td>
                            <?php }?>
                          <td></td>
                            <?php ActiveForm::end()?>
                      </tr>
                  <tbody id="myTablefilials">
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
  $("#showSearchfilials").click(function(){
  $("#searchfilials").slideToggle("slow");
  });

$("#searchfilials").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablefilials tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
    $.post("/filials/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefilials').innerHTML = data;
    });
  });

});

$(document).on('pjax:complete', function() {
    $("[class='search']").blur(function( event ){
        $.post("/filials/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablefilials').innerHTML = data;
        });
      });
});
JS
);
?>  