<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Subjects;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Предметы';
$this->params['breadcrumbs'][] = $this->title;
$models = $dataProvider->getModels();
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<div class="subjects-index">
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
                <input type="search" name="search" style="display: none;" id="searchsubjects"/>
              </li>
              <li>
                <a href="#" id="showSearchsubjects" title='Поиск'>
                  <i class="material-icons">search</i>
                </a>
              </li>
            </ul>
          </div>
        </nav>
<?php Pjax::begin(['enablePushState' => false,'id'=>'crud-datatable-pjax'])?>
<div class="section" >
    <div id="row-grouping" class="section">
            <div class="row">
                <div class="col s11" style="margin:  20px 40px 20px 40px">
                  <table class="bordered highlight centered" cellspacing="0" id="MyTableuser" width="100%">
                    <thead>
                        <tr style="font-size: 14px;">
                            <th>
                            </th>
                            <th>ID</th>
                            <?php if($session['Subjects[name]'] === null || $session['Subjects[name]'] == 1){ ?>
                            <th>Наименование</th>
                            <?php }?>
                            <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                            <?php if($session['Subjects[company_id]'] === null || $session['Subjects[company_id]'] == 1){ ?> 
                            <th>Компания</th>
                            <?php }?>
                            <?php }?>
                            <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                            <?php if($session['Subjects[filial_id]'] === null || $session['Subjects[filial_id]'] == 1){ ?> 
                            <th>Филиал</th> 
                            <?php }?>
                            <?php }?>
                            <th>Действия</th>                   
                        </tr>
                    </thead>
                   
                    <tr>
                              <td>№</td>
                              <td></td>
                          <form id="searchForm">
                              <input type="hidden" form="searchForm" name="search" value='1'>
                              <td><input form="searchForm"  style="width:100%; border-top:0;border-right: 0;border-left: 0;" type="search" name="name" id="name" value="<?=$post['name']?>"></td>
                              <td><input form="searchForm"  style="width:100%; border-top:0;border-right: 0;border-left: 0;" type="search" name="company_id" value="<?=$post['company_id']?>"></td>
                              <td><input form="searchForm" style="width:100%; border-top:0;border-right: 0;border-left: 0;" type="search" name="filial_id" value="<?=$post['filial_id']?>">
                              </td>
                          </form>
                              <td></td>
                    </tr>
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
  $("#showSearchsubjects").click(function(){
  $("#searchsubjects").slideToggle("slow");
  });
$("#searchsubjects").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablesubjects tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

 $("[type='search']").blur(function( event ){
      
       $.post("/subjects/index", $('#searchForm').serialize() ,function(data){
     
        document.getElementById('myTableuser').innerHTML = data;
    });
    });
});
$(document).on('pjax:complete', function() {
 $("[form^='search']").blur(function( event ){
      
       $.post("/subjects/index", $('#searchForm').serialize() ,function(data){
     
        document.getElementById('myTableuser').innerHTML = data;
    });
       
    });
});
JS
);
?>  