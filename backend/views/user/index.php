<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$pathInfo = Yii::$app->request->pathInfo;
if($pathInfo=='user/admin')
{
  $this->title = 'Администраторы';
}
if($pathInfo=='user/teacher')
{
    $this->title = 'Предподователи';
}
if ($pathInfo=='user/pupil')
{
  $this->title = 'Ученики';
}
$this->params['breadcrumbs'][] = $this->title;
$models = $dataProvider->getModels();
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<div class="user-index">
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
                   <?=Html::a('Сортировка', ['columns'],['role'=>'modal-remote','title'=> 'Сортировка с колонок'])?></li>
                <li><?= Html::a('<i class="material-icons">add</i>', ['create','type'=>$type],['role'=>'modal-remote','title'=>'Создать'])?></li>
                <li><?=Html::a('<i class="material-icons">refresh</i>',[''],
                            ['title'=>'Обновить'])?>
                </li>
                <li>
                  <input type="search" name="search" style="display: none;" id="searchuser">
                </li>
                <li>
                  <a href="#" id="showSearchuser" title='Поиск'><i class="material-icons">search</i></a>
                </li>
                
              </ul>
            </div>
          </nav>
<?php Pjax::begin(['enablePushState' => false,'id'=>'crud-datatable-pjax'])?>
<div class="section">
     <div id="row-grouping" class="section">
        <div class="row">
            <div class="col s11" style="margin:  20px 40px 20px 40px">
              <table class="bordered highlight centered" cellspacing="0" width="100%">
                <thead>
                  <tr style="font-size: 14px;">
                  <th>ID</th>
                  <?php if($session['User[image]']===null || $session['User[image]'] == 1){ ?>
                  <th>Фото</th>
                  <?php }?>
                  <?php if($session['User[fio]']===null || $session['User[fio]'] == 1){ ?>
                  <th>ФИО</th>
                  <?php }?>
                  <?php if($session['User[username]']===null || $session['User[username]'] == 1){ ?>
                  <th>Имя пользователа</th>
                  <?php }?>
                  <?php if($session['User[type]']===null || $session['User[type]'] == 1){ ?>
                  <th>Тип</th>
                  <?php }?>
                  <?php if($session['User[status]']===null || $session['User[status]'] == 1){ ?>
                  <th>Статус</th>
                  <?php if($session['User[birthday]']===null || $session['User[birthday]'] == 1){ ?>
                  <th>День рождения</th>
                  <?php }?>
                  <?php if($session['User[phone]']===null || $session['User[phone]'] == 1){ ?>
                  <th>Телефон</th>
                  <?php }?>
                  <?php if($session['User[balanc]']===null || $session['User[balanc]'] == 1){ ?>
                  <th>Баланс</th>
                  <?php }?>
                  <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                  <?php if($session['User[company_id]']===null || $session['User[company_id]'] == 1){ ?>
                  <th>Компания</th>
                  <?php } ?>
                  <?php } ?>
                  <?php if(Yii::$app->user->identity->company->type == 1){ ?>
                  <?php if($session['User[filial_id]']===null || $session['User[filial_id]'] == 1){ ?>
                  <th>Филиал</th>
                  <?php } ?>
                  <?php } ?>
                  <th>Действия</th>
                  </tr>
                </thead>
                <tbody id="myTableuser">
                    <?php
                  foreach ($models as $value) {
                  if (!file_exists('uploads/avatar/'.$value->image) || $value->image == '') {
                      $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/no-user.jpg';
                  } else {
                      $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/avatar/'.$value->image;
                  }
                  echo "<tr><td>".$value->id."</td>";
                  if($session['User[image]']===null || $session['User[image]'] == 1)
                  echo "<td><img src='$path' width=80></td>";
                  if($session['User[fio]']===null || $session['User[fio]'] == 1)
                  echo "<td>".$value->fio."</td>";
                  if($session['User[username]']===null || $session['User[username]'] == 1)
                  echo "<td>".$value->username."</td>";
                  if($session['User[type]']===null || $session['User[type]'] == 1)
                  echo "<td>".$value->getTypeDescription()."</td>";
                  if($session['User[status]']===null || $session['User[status]'] == 1)
                  echo "<td>".$value->getStatusDescription()."</td>";
                  if($session['User[birthday]']===null || $session['User[birthday]'] == 1)
                  echo "<td>".User::getDate($value->birthday)."</td>";
                  if($session['User[phone]']===null || $session['User[phone]'] == 1)
                  echo "<td>".$value->phone."</td>";
                  if($session['User[balanc]']===null || $session['User[balanc]'] == 1)
                  echo "<td>".$value->balanc."</td>";
                  if(Yii::$app->user->identity->company->type == 1){
                  if($session['User[company_id]']===null || $session['User[company_id]'] == 1)
                  echo "<td>".$value->company->name."</td>";}
                  if(Yii::$app->user->identity->company->type == 1){
                  if($session['User[filial_id]']===null || $session['User[filial_id]'] == 1)  
                  echo "<td>".$value->filial->filial_name."</td>";}
                  echo 
                  "<td class='align-center' style='width: 100px;'>".Html::a('<i class="material-icons view-u">visibility</i>', ['view','id'=>$value->id],['role'=>'modal-remote','title'=>'Просмотр']).Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id'=>$value->id],['role'=>'modal-remote','title'=>'Изменить']).Html::a('<i class="material-icons red-u">delete_forever</i>', ['delete','id'=>$value->id],['role'=>'modal-remote','title'=>'Удалить', 
                            'data-confirm'=>false, 'data-method'=>false,
                                'data-request-method'=>'post',
                                'data-toggle'=>'tooltip',
                                 'data-confirm-title'=>'Подтвердите действие',
                    'data-confirm-message'=>'Вы уверены что хотите удалить этого элемента?'])."
                    </td>
                    </tr>";}  
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
  $("#showSearchuser").click(function(){
    $("#searchuser").slideToggle("slow");
  });
  s$("#searchuser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTableuser tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
JS
);
?>  
