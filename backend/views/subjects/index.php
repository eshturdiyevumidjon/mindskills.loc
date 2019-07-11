<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Предметы';
$this->params['breadcrumbs'][] = $this->title;
$models = $dataProvider->getModels();

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
              <p style="font-size: 22px;margin-left: 20px;"><i class="material-icons">view_list</i><?=Html::encode($this->title)?></p>
            </a>
            </a>
            <ul class="right hide-on-med-and-down">
              <li><?= Html::a('<i class="material-icons">add</i>', ['create'],['title'=>'Создать','role'=>'modal-remote'])?></li>
              <li><?=Html::a('<i class="material-icons">refresh</i>',[''],
                          ['title'=>'Обновить'])?></li>
              <li>
                <input type="search" name="search" style="display: none;" id="searchsubjects"/>
              </li>
              <li>
                <a href="#" id="showSearchsubjects" title='Поиск'><i class="material-icons">search</i></a>
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
                              <tr>
                                  <th>
                                  </th>
                                  <th>ID</th>
                                  <th>Наименование</th> 
                                  <th>Компания</th>
                                  <th>Филиал</th> 
                                  <th>Действия</th>                   
                              </tr>
                            </thead>
                            <tbody id="myTablesubjects">
                                <?php
                                    foreach ($models as $value) {
                                        echo "<tr>
                                  <td><input type='checkbox' name='check".$value->id."'></td>     
                                  <td>".$value->id."</td>
                                  <td>".$value->name."</td>
                                  <td>".$value->company->name."</td>
                                  <td>".$value->filial->filial_name."</td>
                                  <td class='align-center' style='width: 100px;'>".Html::a('<i class="material-icons view-u">visibility</i>', ['view','id'=>$value->id],['role'=>'modal-remote','title'=>'Просмотр']).Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id'=>$value->id],['role'=>'modal-remote','title'=>'Изменить']).Html::a('<i class="material-icons red-u">delete_forever</i>', ['delete','id'=>$value->id],['role'=>'modal-remote','title'=>'Удалить', 
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
JS
);
?>  