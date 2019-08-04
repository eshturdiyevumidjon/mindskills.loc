<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Courses;
use yii\widgets\Pjax;
use backend\models\User; 
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы';
$models = $dataProvider->getModels();
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<style type="text/css">
  .search{
    text-align: center;
  }
</style>
<div class="courses-index">
   <div id="ajaxCrudDatatable">
      <div class="row">
        <div class="col s12 m12">
          <div class="card">
              <nav class=" purple">
                <div class="nav-wrapper ">
                  <a href="#!" class="brand-logo">
                    <p style="font-size: 22px;margin-left: 20px;"><i class="material-icons">view_list</i><?=Html::encode($this->title)?></p>
                  </a>
                  </a>
                  <ul class="right hide-on-med-and-down">
                    <li>
                       <?=Html::a('Сортировка', ['columns'],['role' => 'modal-remote','title' =>  'Сортировка с колонок'])?>
                    </li>
                    <li>
                      <?= Html::a('<i class="material-icons">add</i>', ['create'],['role' => 'modal-remote','title' => 'Создать'])?>
                    </li>
                    <li>
                      <?=Html::a('<i class="material-icons">refresh</i>',[''],['title'=>
                        'Обновить'])?>
                     </li>
                    <li>
                      <input type="search" name="search" style="display: none;" id="searchcourses">
                    </li>
                    <li>
                      <a href="#" id="showSearchcourses">
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
          <table class="bordered highlight centered" cellspacing="0"  width="100%">
                <thead>
                <tr style="font-size: 14px;">
                    <th>ID</th>
                    <?php if($session['Courses[name]'] === null || $session['Courses[name]'] == 1){ ?>
                    <th>Наименование</th>
                    <?php }?>
                    <?php if($session['Courses[subject_id]'] === null || $session['Courses[subject_id]'] == 1){ ?>
                    <th>Предметы</th>
                    <?php }?>
                    <?php if($session['Courses[user_id]'] === null || $session['Courses[user_id]'] == 1){ ?>
                    <th>Пользователи</th>
                    <?php }?>
                    <?php if($session['Courses[begin_date]'] === null || $session['Courses[begin_date]'] == 1){ ?>
                    <th>Время начало</th>
                    <?php }?>
                    <?php if($session['Courses[end_date]'] === null || $session['Courses[end_date]'] == 1){ ?>
                    <th>Время заканчало</th>
                    <?php }?>
                    <?php if($session['Courses[cost]'] === null || $session['Courses[cost]'] == 1){ ?>
                    <th>Цена</th>
                    <?php }?>
                    <?php if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1){ ?>
                    <th>Зарплата предподаватела</th>
                    <?php }?>
                    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                    <?php if($session['Courses[company_id]'] === null || $session['Courses[company_id]'] == 1){ ?>
                    <th>Компания</th>
                    <?php }?>
                    <?php }?>
                    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                    <?php if($session['Courses[filial_id]'] === null || $session['Courses[filial_id]'] == 1){ ?>
                    <th>Филиал</th>
                    <?php }?>
                    <?php }?>
                    <th>Действия</th>
                </tr>
                <tr>
                          <?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
                        <td>
                          <?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
                        </td>
                          <?php if($session['Courses[name]'] === null || $session['Courses[name]'] == 1){ ?>
                        <td>
                          <?=$form->field($searchModel,'name')->textInput(['class'=>'search',
                            'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;','form'=>'searchForm2'])->label(false)?>  
                        </td>
                          <?php }?>
                          <?php if($session['Courses[subject_id]'] === null || $session['Courses[subject_id]'] == 1){ ?>
                        <td>
                          <?=$form->field($searchModel,'subject_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;','form'=>'searchForm2'])->label(false)?>
                        </td>
                          <?php }?>
                          <?php if($session['Courses[user_id]'] === null || $session['Courses[user_id]'] == 1){ ?>
                        <td>
                          <?=$form->field($searchModel,'user_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;','form'=>'searchForm2'])->label(false)?>
                        </td>
                          <?php }?>
                          <?php if($session['Courses[begin_date]'] === null || $session['Courses[begin_date]'] == 1){ ?>
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
                              'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;'
                            ]
                            ])->label(false) ?>
                        </td>
                          <?php }?>
                          <?php if($session['Courses[end_date]'] === null || $session['Courses[end_date]'] == 1){ ?>
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
                                'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;'
                              ]
                          ])->label(false) ?>
                        </td>
                           <?php }?>
                           <?php if($session['Courses[cost]'] === null || $session['Courses[cost]'] == 1){ ?>
                        <td>
                            <?=$form->field($searchModel,'cost')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;','form'=>'searchForm2'])->label(false)?>
                        </td>
                            <?php }?>
                            <?php if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1){ ?>
                        <td>
                            <?=$form->field($searchModel,'prosent_for_teacher')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;','form'=>'searchForm2'])->label(false)?>
                        </td>
                            <?php }?>
                            <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                            <?php if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1){ ?>
                        <td>
                            <?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;','form'=>'searchForm2'])->label(false)?>
                        </td>
                              <?php }?>
                              <?php if($session['Courses[filial_id]'] === null || $session['Courses[filial_id]'] == 1){ ?>
                        <td>
                            <?=$form->field($searchModel,'filial_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:38px !important;','form'=>'searchForm2'])->label(false)?>
                        </td>
                            <?php }?>
                            <?php }?>
                        <td></td>
                            <?php ActiveForm::end()?>
                  </tr>
                </thead>
                        <tbody id="myTablecourses">
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
      $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
          document.getElementById('myTablecourses').innerHTML = data;
      });
  });

  $("#begin_date").change(function(){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
    });
  });

  $("#end_date").change(function(){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
    });
  });
});

$(document).on('pjax:complete', function() {
     
    $("[class='search']").blur(function( event ){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
        });
      });

      $("#begin_date").change(function( event ){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
       });
     });

      $("#end_date").change(function( event ){
        $.post("/courses/index", $('#searchForm2').serialize() ,function(data){
        document.getElementById('myTablecourses').innerHTML = data;
        });
     });
});
JS
);
?>  
          
