<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;
use yii\helpers\Arrayhelper;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;
use common\models\User;
use models\models\Companies;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$pathInfo = Yii::$app->request->pathInfo;
if($pathInfo=='user/admin')
{
  $type=1;
  $this->title = 'Администраторы';
}
if($pathInfo=='user/teacher')
{
  $type=2;
  $this->title = 'Предподователи';
}
if ($pathInfo=='user/pupil')
{
  $type=3;
  $this->title = 'Ученики';
}
$this->params['breadcrumbs'][] = $this->title;
$models = $dataProvider->getModels();
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<style type="text/css">
  .search{
    text-align: center;
  }
  .drop{
    padding-bottom:-10px;
    border:1px solid gray !important;
    border-radius: 0.5em;
    height:40px !important;
  }
  #statuslist{
    display:none;
  }
</style>
<div class="user-index">
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
                            <?= Html::a('<i class="material-icons">add</i>', ['create','type' => $type],['role' => 'modal-remote','title' => 'Создать'])?>
                          </li>
                          <li>
                            <?=Html::a('<i class="material-icons">refresh</i>',[''],
                                      ['title' => 'Обновить'])?>
                          </li>
                          <li>
                            <input type="hidden" id="type" value="<?=$type?>">
                            <input type="text" name="search" style="display: none;" id="searchuser">
                          </li>
                          <li>
                            <a href="#" id="showSearchuser" title='Поиск'>
                              <i class="material-icons">search</i>
                            </a>
                          </li>
                        </ul>
                        </div>
                    </nav>
<?php Pjax::begin(['enablePushState' => false,'id'=>'crud-datatable-pjax'])?>
<div class="section">
     <div id="row-grouping" class="section">
        <div class="row">
            <div class="col s11" style="margin:  20px 40px 20px 40px">
                <table class="bordered highlight centered" cellspacing="0" id="MyTableuser" width="100%">
                    <thead>
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
                                  'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;'
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
                    </thead>
                    <tbody id="myTableuser">
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
  $("#showSearchuser").click(function(){
  $("#searchuser").slideToggle("slow");
  });
  $("#searchuser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableuser tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("[class='search']").blur(function(){
      var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
  });
  $(".drop").on("click",function(){
    alert();
      $("#statuslist").css("display:block");
  });
  $("#birtday").change(function(){
       var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
    });
});
$(document).on('pjax:complete', function() {
 $("[class='search']").blur(function( event ){
      var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
    });
  
  $("#birtday").change(function( event ){
      var type=$("#type").val();
       if(type==1){
        $.post("/user/admin", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==2){
        $.post("/user/teacher", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
       if(type==3){
        $.post("/user/pupil", $('#searchForm').serialize() ,function(data){
        document.getElementById('myTableuser').innerHTML = data;
    });
       }
    });
});
JS
);
?>  
