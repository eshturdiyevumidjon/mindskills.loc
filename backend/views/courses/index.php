<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Courses;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы';
$models = $dataProvider->getModels();
$model=new Courses();
$this->params['breadcrumbs'][] = $this->title;

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
              <li><?= Html::a('<i class="material-icons">add</i>', ['create'],['role'=>'modal-remote','title'=>'Создать'])?></li>
              <li><?=Html::a('<i class="material-icons">refresh</i>',[''],
                          ['title'=>'Обновить'])?></li>
              <li>
                <input type="search" name="search" style="display: none;" id="searchcourses">
              </li>
              <li>
                <a href="#" id="showSearchcourses"><i class="material-icons">search</i></a>
              </li>
            </ul>

          </div>
        </nav>
        <?php Pjax::begin(['enablePushState' => false,'id'=>'crud-datatable-pjax'])?>
        <div class="section" >
               <div id="row-grouping" class="section">
                    <div class="row">
                        <div class="col s11" style="margin:  20px 40px 20px 40px">
                          <table class="bordered highlight centered" cellspacing="0"  width="100%">
                            <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th><?=$model->getAttributeLabel('name')?></th>
                                      <th><?=$model->getAttributeLabel('subject_id')?></th>
                                      <th><?=$model->getAttributeLabel('user_id')?></th>                
                                      <th><?=$model->getAttributeLabel('begin_date')?></th>
                                      <th><?=$model->getAttributeLabel('end_date')?></th>
                                      <th><?=$model->getAttributeLabel('cost')?></th>
                                      <th><?=$model->getAttributeLabel('prosent_for_teacher')?></th>
                                      <th>Действия</th>
                                  </tr>
                                </thead>
                                <tbody id="myTablecourses">
                                    <?php
                                    
                                        foreach ($models as $value) {
                                            echo "<tr>
                                      <td>".$value->id."</td>
                                      <td>".$value->name."</td>
                                      <td>".$value->subject->name."</td>
                                      <td>".$value->user->fio."</td>
                                      <td>".$value->begin_date."</td>
                                      <td>".$value->end_date."</td>
                                      <td>".$value->cost."</td>
                                      <td>".$value->prosent_for_teacher."</td>
                                      <td class='align-center' style='width: 100px;'>".Html::a('<i class="material-icons view-u">visibility</i>', ['view','id'=>$value->id],['role'=>'modal-remote','title'=>'Просмотр']).Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id'=>$value->id],['role'=>'modal-remote','title'=>'Изменить']).Html::a('<i class="material-icons red-u">delete_forever</i>', ['delete','id'=>$value->id],['role'=>'modal-remote','title'=>'Удалить', 
                                            'data-confirm'=>false, 'data-method'=>false,
                                                'data-request-method'=>'post',
                                                'data-toggle'=>'tooltip',
                                                 'data-confirm-title'=>'Подтвердите действие',
                                                  'data-confirm-message'=>'Вы уверены что хотите удалить этого элемента?']).        "</td>
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
  $("#showSearchcourses").click(function(){
    $("#searchcourses").slideToggle("slow");
  });

$("#searchcourses").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablecourses tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
JS
);
?>  
          
