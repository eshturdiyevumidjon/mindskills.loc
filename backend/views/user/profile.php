<?php
use yii\widgets\Pjax;
use yii \helpers\Html;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset; 
  if($user->image == null) $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
            else $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $user->image;

CrudAsset::register($this);
?>
 <?php Pjax::begin(['enablePushState' => false,'id'=>'profile-pjax'])?>
<div id="profile-page-header" class="card" style="overflow: hidden;">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../../images/gallary/23.png" alt="user background">
                </div>
                <figure class="card-profile-image">
                  <img src="<?=$path?>" alt="profile image" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan gradient-shadow">
                </figure>
               
                <div class="card-content">
                  <div class="row pt-2">
                    <div class="col s12 m3 offset-m2">
                      <h4 class="card-title grey-text text-darken-4"><?=$user->fio?></h4>
                      <p class="medium-small grey-text"><?=$user->getTypeDescription()?></p>
                    </div>
                    <div class="col s12 m2 center-align">
                      <h4 class="card-title grey-text text-darken-4">10+</h4>
                      <p class="medium-small grey-text">Work Experience</p>
                    </div>
                    <div class="col s12 m2 center-align">
                      <h4 class="card-title grey-text text-darken-4">6</h4>
                      <p class="medium-small grey-text">Completed Projects</p>
                    </div>
                    <div class="col s12 m2 center-align">
                      <h4 class="card-title grey-text text-darken-4">$ 1,253,000</h4>
                      <p class="medium-small grey-text">Busness Profit</p>
                    </div>
                    <div class="col s12 m1 right-align">
                      <a class="btn-floating activator waves-effect waves-light rec accent-2 right">
                        <i class="material-icons">perm_identity</i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-reveal" style="display: none; transform: translateY(0px);">
                  <p>
                    <span class="card-title grey-text text-darken-4"><?=$user->fio?>
                    <?= Html::a('<i class="material-icons">mode_edit</i>', ['change','id'=>$user->id],['role'=>'modal-remote','title'=>'Изменить','class'=>'btn-floating'])?>
                      <i class="material-icons right">close</i>
                    </span>
                    <span>
                      <i class="material-icons cyan-text text-darken-2">perm_identity</i><?=$user->username?></span>
                  </p>
                  <p>
                    <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> <?=$user->phone?></p>
                  <p>
                    <i class="material-icons cyan-text text-darken-2">email</i></p>
                  <p>
                    <i class="material-icons cyan-text text-darken-2">cake</i> <?=$user->getDate($user->birthday)?></p>
                  <p>
                   
                </div>
              </div>
<?php Pjax::end()?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>