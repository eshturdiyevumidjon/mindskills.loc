<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use common\models\User;

$this->title = 'Почтовый ящик';
$this->params['breadcrumbs'][] = $this->title;
$user=Yii::$app->user->identity;
CrudAsset::register($this);

  if($user->image == null) $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
  else $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $user->image;

$models=$dataProvider->getModels();
?>
<?php Pjax::begin(['enablePushState' => false, 'id' => 'inbox-2-pjax']) ?>
<div class="container">
  <div id="mail-app" class="section">
    <div class="row">
      <div class="col s12">
        <nav class=" ">
          <div class="nav-wrapper">
            <div class="left col s12 m5 l5">
              <ul>
                <li>
                  <a href="#!" class="email-menu">
                    <i class="material-icons">menu</i>
                  </a>
                </li>
                <li><a href="#!" class="email-type">Почтовый ящик</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="col s12">
        <div style="max-height: 440px;overflow-y: hidden;" class="col s3 m3 s6 card-panel">
          <div id="email-sidebar">
            <ul>
              <li>
                <img src="<?=$path?>" alt="" class="circle responsive-img valign profile-image" style="width: 200px;height: 200px;">
              </li>
              <li>
                <a href="/inbox/create?type=2" role="modal-remote">
                  <div class="row">
                    <div class="col s4 right-align">
                      <span class="material-icons"style="font-size: large;">create</span>
                    </div>
                    <div class="col s8 left-align">
                      Написать
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="/inbox/index">
                  <div class="row">
                    <div class="col s4 right-align">
                      <span class="material-icons"style="font-size: large;">inbox</span>  <?php if($inbox>0):?><small class="notification-badge"><?= $inbox ?></small><?php endif;?>
                    </div>
                    <div class="col s8 left-align">
                      Входящие
                    </div>
                </a>
              </li>
              <li style="background-color:rgba(0,0,0,0.09);border-radius: 10px;">
                <a href="/inbox/favorites">
                  <div class="row">
                    <div class="col s4 right-align">
                      <span class="material-icons"style="font-size: large;">star</span>
                    </div>
                    <div class="col s8 left-align">
                      Избранные
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="/inbox/sends">
                  <div class="row">
                    <div class="col s4 right-align"> 
                      <span class="material-icons"style="font-size: large;">email</span>
                    </div>
                    <div class="col s8 left-align">
                      Отправленные
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="/inbox/deleting"> 
                  <div class="row">
                    <div class="col s4 right-align">
                      <span class="material-icons"style="font-size: large;">delete</span>
                    </div>
                    <div class="col s8 left-align">
                      Удаленные
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col s9 m9">
          <div class="card-panel"> 
            <ul class="collection hover-sms" >
              <?php 
                  $models = $dataProvider->getModels();
                  if(count($models) > 0 )
                  {
                  foreach($models as $model):
                  if($model->starred == 1) $starred = 'yellow-text';
                      else $starred = 'black-text';
              ?>
              <li class="collection-item avatar" style="margin: 0;">
                <div class="row">
                <div class="col s1">
                  <?php 
                    if($model->from0->image == null) $images = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
                    else $images = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $model->from0->image;
                  ?>
                  <img src="<?= $images ?>" class="circle" style="width: 60px;height: 60px;">
                </div>
                <div class="col s5">
                  <a href="#!" class="left" onclick="$.get('/inbox/set-star', {'id':<?=$model->id?>}, function(data){$.pjax.reload({container:'#inbox-2-pjax', async: false});} );"><i class="material-icons <?=$starred?>">grade</i></a>
                  <b><?=$model->from0->fio?></b><br>
                  <a class="mail-text" title="Просмотр" role="modal-remote" href="<?=Url::toRoute(['/inbox/view1',"id" => $model->id,
                  "type"=>2])?>"><?=$model->title . ($model->is_read == 0 ? ' <i style="color:red;">(new)</i>' : '')?>
                  </a>
                </div>
                <div class="col s2">
                  <?php 
                    $paths = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/inbox/' . $model->file;
                    echo $model->file;
                    ?>
                    <?php if($paths!=null){ $paths;}?>
                    <br>
                    <?php if($model->file!=null){ ?>
                    <a data-pjax="0" href=" <?=Url::toRoute(['/inbox/download-file','id' => $model->id])?>">
                    <i class="material-icons" style="font-size: large;">
                      cloud_download</i>Скачать
                    </a>
                  <?php }?> 
                </div>
                <div class="col s2">
                  <span class="right"><?= date( 'H:i:m', strtotime($model->date_cr) ) ?></span><br>
                  <span class="right"><?= date( 'd.m.Y', strtotime($model->date_cr) ) ?></span>
                </div>
                <div class="col s2">
                  <?=Html::a('<i class="glyphicon glyphicon-trash"></i>',
                    ["/inbox/check-delete", 'id' => $model->id,"type"=>2] ,
                    [
                      "class"=>"text-danger right",
                      'role'=>'modal-remote',
                      'data-confirm'=>false, 'data-method'=>false,
                      'data-request-method'=>'post',
                      'data-confirm-title'=>'Подтвердите действие',
                      'data-confirm-message'=>'Вы уверены что хотите удалить этого элемента?'
                  ])?>
                </div>
                </div>
              </li>
              <?php endforeach;}
                else
                {
                  echo "<p class='center-align'>Нет выбранных сообщений</p>";
                }
               ?>
            </ul>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>
<?php Pjax::end() ?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
