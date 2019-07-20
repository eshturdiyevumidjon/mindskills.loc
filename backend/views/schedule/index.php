<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Schedule;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;
$models = $dataProvider->getModels();
$session = Yii::$app->session;
CrudAsset::register($this);

?>
<div class="schedule-index">
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
                <?=Html::a('Сортировка', ['columns'],['role'=>'modal-remote','title'=> 'Сортировка с колонок'])?>
              </li>
              <li><?= Html::a('<i class="material-icons">add</i>', ['create'],['title'=>'Создать','role'=>'modal-remote'])?></li>
              <li><?=Html::a('<i class="material-icons">refresh</i>',[''],['title'=>'Обновить'])?></li>
              <li>
                <input type="search" name="search" style="display: none;" id="searchschedule"/>
              </li>
              <li>
                <a href="#" id="showsearchschedule" title='Поиск'><i class="material-icons">search</i></a>
              </li>
            </ul>
          </div>
        </nav>
<?php Pjax::begin(['enablePushState' => false,'id'=>'crud-datatable-pjax'])?>
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
                            <?php if($session['Schedule[name]']===null || $session['Schedule[name]'] == 1){ ?>
                            <th>Наименование</th>
                            <?php }?>
                            <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                            <?php if($session['Schedule[company_id]']===null || $session['Schedule[company_id]'] == 1){ ?> 
                            <th>Компания</th>
                            <?php }?>
                            <?php }?>
                            <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                            <?php if($session['Schedule[filial_id]']===null || $session['Schedule[filial_id]'] == 1){ ?> 
                            <th>Филиал</th> 
                            <?php }?>
                            <?php }?>
                            <?php if($session['Schedule[subject_id]']===null || $session['Schedule[subject_id]'] == 1){ ?>
                            <th>Предмет</th>
                            <?php }?>
                            <?php if($session['Schedule[teacher_id]']===null || $session['Schedule[teacher_id]'] == 1){ ?>
                            <th>Преподаватель</th>
                            <?php }?>
                            <?php if($session['Schedule[price]']===null || $session['Schedule[price]'] == 1){ ?>
                            <th>Стоимость занятий курса</th>
                            <?php }?>
                            <?php if($session['Schedule[sum_of_teacher]']===null || $session['Schedule[sum_of_teacher]'] == 1){ ?>
                            <th>Зарплата преподавателю</th>
                            <?php }?>
                            <?php if($session['Schedule[begin_date]']===null || $session['Schedule[begin_date]'] == 1){ ?>
                            <th>Начало курса</th>
                            <?php }?>
                            <?php if($session['Schedule[end_date]']===null || $session['Schedule[end_date]'] == 1){ ?>
                            <th>Конец курса</th>
                            <?php }?>
                            <?php if($session['Schedule[status]']===null || $session['Schedule[status]'] == 1){ ?>
                            <th>Статус</th>
                            <?php }?>
                            <?php if($session['Schedule[type]']===null || $session['Schedule[type]'] == 1){ ?>
                            <th>Тип занятия</th>
                            <?php }?>
                            <th>Действия</th>                   
                        </tr>
                    </thead>
                    <tbody id="myTableSchedule">
                          <?php
                              foreach ($models as $value) {
                                  echo "<tr>
                            <td><input type='checkbox' name='check".$value->id."'></td>     
                            <td>".$value->id."</td>";
                            if($session['Schedule[name]']===null || $session['Schedule[name]'] == 1)
                            echo "<td>".$value->name."</td>";
                            if(Yii::$app->user->identity->company->type == 1){
                            if($session['Schedule[company_id]']===null || $session['Schedule[company_id]'] == 1)
                            echo "<td>".$value->company->name."</td>";}
                            if(Yii::$app->user->identity->company->type == 1){
                            if($session['Schedule[filial_id]']===null || $session['Schedule[filial_id]'] == 1)
                            echo "<td>".$value->filial->filial_name."</td>";}
                            if($session['Schedule[subject_id]']===null || $session['Schedule[subject_id]'] == 1)
                            echo "<td>".$value->subject->name."</td>";
                            if($session['Schedule[teacher_id]']===null || $session['Schedule[teacher_id]'] == 1)
                            echo "<td>".$value->teacher->fio."</td>";
                            if($session['Schedule[price]']===null || $session['Schedule[price]'] == 1)
                            echo "<td>".$value->price."</td>";
                            if($session['Schedule[sum_of_teacher]']===null || $session['Schedule[sum_of_teacher]'] == 1)
                            echo "<td>".$value->sum_of_teacher."</td>";
                            if($session['Schedule[begin_date]']===null || $session['Schedule[begin_date]'] == 1)
                            echo "<td>".Schedule::getDate($value->begin_date)."</td>";
                            if($session['Schedule[end_date]']===null || $session['Schedule[end_date]'] == 1)
                            echo "<td>".Schedule::getDate($value->end_date)."</td>";
                            if($session['Schedule[status]']===null || $session['Schedule[status]'] == 1)
                            echo "<td>".$value->getStatusDescription()."</td>";
                            if($session['Schedule[type]']===null || $session['Schedule[type]'] == 1)
                            echo "<td>".$value->getTypeDescription()."</td>";
                            echo 
                            "<td class='align-center' style='width: 100px;'>".Html::a('<i class="material-icons view-u">visibility</i>', ['view','id'=>$value->id],['role'=>'modal-remote','title'=>'Просмотр']).Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id'=>$value->id],['role'=>'modal-remote','title'=>'Изменить']).Html::a('<i class="material-icons red-u">delete_forever</i>', ['delete','id'=>$value->id],['role'=>'modal-remote','title'=>'Удалить', 
                                      'data-confirm'=>false, 'data-method'=>false,
                                          'data-request-method'=>'post',
                                          'data-toggle'=>'tooltip',
                                           'data-confirm-title'=>'Подтвердите действие',
                    'data-confirm-message'=>'Вы уверены что хотите удалить этого элемента?'])."
                            </td>
                          </tr>";  
                              }
                          ?>  
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
    $("#myTablesubjects tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
JS
);
?>