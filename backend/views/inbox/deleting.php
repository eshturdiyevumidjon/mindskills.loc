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
<?php Pjax::begin(['enablePushState' => false, 'id' => 'inbox-pjax']) ?>
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
              </div><!-- 
              <div class="col s12 m7 l7 hide-on-med-and-down">
                <ul class="right">
                  <li>
                    <a href="#!">
                      <i class="material-icons">archive</i>
                    </a>
                  </li>
                  <li>
                    <a href="#!">
                      <i class="material-icons">delete</i>
                    </a>
                  </li>
                  <li>
                    <a href="#!">
                      <i class="material-icons">email</i>
                    </a>
                  </li>
                  
                </ul>
              </div> -->
            </div>
          </nav>
        </div>
        <div class="col s12">
          <div id="email-sidebar" class="col s3 m2 s6 card-panel">
            <ul>
              <li>
                <img src="<?=$path?>" alt="" class="circle responsive-img valign profile-image">
              </li>
              <li>
                <a href="/inbox/create" role="modal-remote">
                <span class="material-icons"style="font-size: large;">create</span>Написать
                </a>
              </li>
              <li>
                <a href="/inbox/index">
                <span class="material-icons"style="font-size: large;">inbox</span>
                 <small class="notification-badge"><?= $inbox ?></small>Входящие
                </a>
              </li>
              <li>
                <a href="/inbox/favorites">  <span class="material-icons"style="font-size: large;">star</span>Избранные
                </a>
              </li>
              <li>
                 <a href="/inbox/sends"> 
                  <span class="material-icons"style="font-size: large;">email</span>Отправленные
                </a>
              </li>
               <li style="background-color:rgba(0,0,0,0.09);border-radius: 10px;">
                 <a href="/inbox/deleting"> 
                  <span class="material-icons"style="font-size: large;">delete</span>Удаленные
                </a>
              </li>
            </ul>
          </div>
          <div class="col s9 m10">
            <div class="card-panel"> 
                <ul class="collection hover-sms" >
                <?php 
                    foreach($dataProvider->getModels() as $model):
                    if($model->starred == 1) $starred = 'yellow-text';
                        else $starred = 'black-text';
                ?>
                <li class="collection-item avatar" style="margin: 0;">
             
            
                  <?php 
                    if($model->from0->image == null) $images = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
                    else $images = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $model->from0->image;
                  ?>
                  <a href="#!" class="left" onclick="$.get('/inbox/set-star', {'id':<?=$model->id?>}, function(data){$.pjax.reload({container:'#inbox-pjax', async: false});} );"><i class="material-icons <?=$starred?>">grade</i></a>
                  <img src="<?= $images ?>" class="circle">
                
                <span class="card-title grey-text text-darken-4"><?=$model->from0->fio?></span>
                <a class="mail-text" title="Просмотр" role="modal-remote" href="<?=Url::toRoute(['/inbox/view',"id" => $model->id])?>"><?=$model->title;?></a>
                <p class="truncate grey-text ultra-small right" style="">
                  <?php 
                    $paths = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/inbox/' . $model->file;
                  ?>
                  <?php if($paths!=null){$paths;}?>
                </p>
                <?=Html::a('<i class="glyphicon glyphicon-trash"></i>',
                                        ["/inbox/delete", 'id' => $model->id,] ,
                                        [
                                            "class"=>"text-danger right",
                                            'role'=>'modal-remote',
                                            'data-confirm'=>false, 'data-method'=>false,
                                            'data-request-method'=>'post',
                                            'data-confirm-title'=>'Подтвердите действие',
                                            'data-confirm-message'=>'Вы уверены что хотите удалить этого элемента?'
                ])?>
                <span class="right"><?= date( 'H:i d.m.Y', strtotime($model->date_cr) ) ?></span>
                </li>
                <?php endforeach; ?>
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
