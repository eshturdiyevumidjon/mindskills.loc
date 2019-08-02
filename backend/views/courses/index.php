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
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы';
$models = $dataProvider->getModels();
$model=new Courses();
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
CrudAsset::register($this);
?>
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
                    <th><?=$model->getAttributeLabel('name')?></th>
                    <?php }?>
                    <?php if($session['Courses[subject_id]'] === null || $session['Courses[subject_id]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('subject_id')?></th>
                    <?php }?>
                    <?php if($session['Courses[user_id]'] === null || $session['Courses[user_id]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('user_id')?></th>
                    <?php }?>
                    <?php if($session['Courses[begin_date]'] === null || $session['Courses[begin_date]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('begin_date')?></th>
                    <?php }?>
                    <?php if($session['Courses[end_date]'] === null || $session['Courses[end_date]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('end_date')?></th>
                    <?php }?>
                    <?php if($session['Courses[cost]'] === null || $session['Courses[cost]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('cost')?></th>
                    <?php }?>
                    <?php if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('prosent_for_teacher')?></th>
                    <?php }?>
                    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                    <?php if($session['Courses[company_id]'] === null || $session['Courses[company_id]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('company_id')?></th>
                    <?php }?>
                    <?php }?>
                    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                    <?php if($session['Courses[filial_id]'] === null || $session['Courses[filial_id]'] == 1){ ?>
                    <th><?=$model->getAttributeLabel('filial_id')?></th>
                    <?php }?>
                    <?php }?>
                    <th>Действия</th>
                </tr>
                 <tr>
                  <td>№</td>
                  
                  <form id="searchForm" method="post">
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" id="searchname" name="name" value="<?=$post['name']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
                "type="search" name="subject_id" value="<?=$post['subject_id']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" name="user_id" value="<?=$post['user_id']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" name="begin_date" value="<?=$post['begin_date']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" name="end_date" value="<?=$post['end_date']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" id="searchcost" name="cost" value="<?=$post['cost']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" name="prosent_for_teacher" value="<?=$post['prosent_for_teacher']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" name="company_id" value="<?=$post['company_id']?>">
            </td>
            <td>
              <input style="width:100%; border-top:0;border-right: 0;border-left: 0;
              "type="search" name="filial_id" value="<?=$post['filial_id']?>">
            </td>
                  </form>
                  <td></td>
                </tr>
                </thead>
                <tbody id="myTablecourses">
                    <?php
                      foreach ($models as $value) {
                            echo "<tr>
                      <td>".$value->id."</td>";
                      if($session['Courses[name]'] === null || $session['Courses[name]'] == 1)
                      echo "<td class='name'>".$value->name."</td>";
                      if($session['Courses[subject_id]'] === null || $session['Courses[subject_id]'] == 1)
                      echo "<td>".$value->subject->name."</td>";
                      if($session['Courses[user_id]'] === null || $session['Courses[user_id]'] == 1)
                      echo "<td>".$value->user->fio."</td>";
                      if($session['Courses[begin_date]'] === null || $session['Courses[begin_date]'] == 1)
                      echo "<td>".Courses::getDate($value->begin_date)."</td>";
                      if($session['Courses[end_date]'] === null || $session['Courses[end_date]'] == 1)
                      echo "<td>".Courses::getDate($value->end_date)."</td>";
                      if($session['Courses[cost]'] === null || $session['Courses[cost]'] == 1)
                      echo"<td class='cost'>".$value->cost."</td>";
                      if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1)
                      echo "<td>".$value->prosent_for_teacher."</td>";
                      if(Yii::$app->user->identity->company->type == 1){
                      if($session['Courses[company_id]'] === null || $session['Courses[company_id]'] == 1)
                      echo "<td>".$value->company->name."</td>";}
                      if(Yii::$app->user->identity->company->type == 1){
                      if($session['Courses[filial_id]'] === null || $session['Courses[filial_id]'] == 1)
                      echo "<td>".$value->filial->filial_name."</td>";}
                      echo "<td class='align-center' style='width: 100px;'>".
                      Html::a('<i class="material-icons view-u">visibility</i>', ['view','id' =>  $value->id],['role' => 'modal-remote','title' => 'Просмотр']).
                      Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id' => $value->id],['role' => 'modal-remote','title' => 'Изменить']).
                      Html::a('<i class="material-icons red-u">delete_forever</i>', 
                        ['delete','id' => $value->id],
                        ['role' => 'modal-remote','title' => 'Удалить', 
                            'data-confirm' => false, 'data-method' => false,
                            'data-request-method' => 'post',
                            'data-toggle' => 'tooltip',
                            'data-confirm-title' => 'Подтвердите действие',
                            'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?']).        "</td>
                      </tr>";  
                        }?>  
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
  $("#showSearchcourses").click(function(){
  $("#searchcourses").slideToggle("slow");
  });
$("#searchcourses").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablecourses tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


  $("#searchname").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablecourses .name").filter(function() {
      $('tr').each(function(){
      var tr = $(this);
      if (tr.find('td').hasClass("name")) tr.toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });;
    });
   
  });
  
  $("#searchcost").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablecourses .cost").filter(function() {
      $('tr').each(function(){
      var tr = $(this);
      if (tr.find('td').hasClass("cost")) tr.toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });;
    });
   
  });

});
JS
);
?>  
          
