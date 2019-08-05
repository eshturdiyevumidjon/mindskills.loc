<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use common\models\User;

$this->title = 'Чат';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
$user=Yii::$app->user->identity;

  if($user->image == null) $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
  else $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $user->image;

$models=$dataProvider->getModels();
?>
<?php Pjax::begin(['enablePushState' => false, 'id' => 'inbox-1-pjax']) ?>
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
                      <li><a href="#!" class="email-type">Чат</a>
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
               <div style="max-height: 440px;overflow-y: hidden;" class="col s12 m3 card-panel">
                  <div id="email-sidebar" >
                    <ul>
                      <li>
                        <img src="<?=$path?>" style="width: 200px;height: 200px;border-radius: 2em;">
                      </li>
                      <li>
                        <a href="/inbox/create?type=1" role="modal-remote">
                          <div class="row">
                            <div class="col s4 right-align">
                              <span class="material-icons" style="font-size: large;">create
                              </span>
                            </div>
                            <div class="col s8 left-align">
                              Написать
                            </div>
                          </div>
                        </a>
                      </li>
                      <li style="background-color:rgba(0,0,0,0.09);border-radius: 8px;">
                        <a href="/inbox/index">
                          <div class="row">
                            <div class="col s4 right-align">
                              <span class="material-icons"style="font-size: large;">inbox
                                </span>  
                                <?php if($inbox>0):?>
                                <small class="notification-badge">
                                <?= $inbox ?>
                                </small>
                                <?php endif;?>
                            </div>
                            <div class="col s8 left-align">
                              Входящие
                            </div>
                          </div>  
                        </a>
                      </li>
                      <!-- <li>
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
                      </li> -->
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
                              <span class="material-icons" style="font-size: large;">
                                delete
                              </span>
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
              <div class="col s12 m9">
                <div class="row">
                  <div class="card-panel"> 
                    <?php 
                    $models = $dataProvider->getModels();
                    if(count($models)){
                    ?>
                    <ul class="collection hover-sms" >
                    <?php
                        foreach($models as $model):
                        if($model->starred == 1) $starred = 'yellow-text';
                            else $starred = 'black-text';
                    ?>
                <li class="collection-item avatar" style="padding: 12px 20px 0px 20px;margin:0;">
                  <div class="row">
                    <div class="col s2">
                        <?php 
                          if($model->from0->image == null) $images = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
                          else $images = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $model->from0->image;
                        ?>
                        <img src="<?= $images ?>"  style="border-radius: 1em;width: 60px;height: 60px;">
                    </div>
                    <div class="col s4 left-align">
                        <b><?=$model->from0->fio?></b><br>
                        <a class="mail-text" title="Просмотр" role="modal-remote" href="<?=Url::toRoute(['/inbox/view',"id" => $model->id,"type" => 1])?>"><?=$model->title . ($model->is_read == 0 ? ' <i style="color:red;">(new)</i>' : '')?>
                        </a>
                    </div>
                    <div class="col s2">
                        <?php 
                        $paths = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/inbox/' . $model->file;
                        echo $model->file;
                        ?>
                        <?php if($paths != null){ $paths;}?>
                        <br>
                        <?php if($model->file != null){ ?>
                        <a data-pjax="0" href=" <?=Url::toRoute(['/inbox/download-file','id' => $model->id,])?>">
                        <div class="row">
                          <div class="col s3 right-align">
                            <i class="material-icons">
                            cloud_download</i>
                          </div>
                          <div class="col s9 left-align">
                            Скачать
                          </div>
                        </div>
                        </a>
                        <?php }?>
                    </div>
                    <div class="col s2 right-align">
                      <span><?= date( 'H:i:m', strtotime($model->date_cr) ) ?></span><br>
                      <span><?= date( 'd.m.Y', strtotime($model->date_cr) ) ?></span>
                    </div>
                    <div class="col s2 left-align">
                      <?= Html::a('<i class="glyphicon glyphicon-trash"></i>',
                      ["/inbox/check-delete", 'id' => $model->id,"type" => 1] ,
                      [
                        "class" => "text-danger right",
                        'role' => 'modal-remote',
                        'data-confirm' => false, 'data-method' => false,
                        'data-request-method' => 'post',
                        'data-confirm-title' => 'Подтвердите действие',
                        'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?'
                      ])?>
                    </div>
                  </div>
                    </li>
                        <?php endforeach;?>
                    </ul>
                        <?php }
                        else{
                          echo 
                          '<div id="card-alert" class="card purple lighten-5">
                          <div class="card-content purple-text">
                            <p>Нет полученных сообщений.</p>
                          </div>
                          </div>';
                        } ?>
                  </div>
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
