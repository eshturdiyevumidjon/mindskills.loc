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
   
    <div class="card-content" style="height: 220px;">
      <div class="row pt-2">
        <div class="col s12 m3 offset-m2">
           <h4 class="card-title grey-text text-darken-4"><?=$user->fio?></h4>
          <p class="medium-small grey-text"><?=$user->getTypeDescription()?></p>
        </div>
        <div class="col s12 m3 center-align">
          <h4 class="card-title grey-text text-darken-4"><?=$user->phone?></h4>
          <p class="medium-small grey-text"><?=$user->getAttributeLabel('phone')?></p>
        </div>
        <div class="col s12 m2 center-align">
          <h4 class="card-title grey-text text-darken-4">6</h4>
          <p class="medium-small grey-text">Completed Projects</p>
        </div>
        <div class="col s12 m2 center-align">
          <h4 class="card-title grey-text text-darken-4">$<?=$user->balanc?></h4>
          <p class="medium-small grey-text"><?=$user->getAttributeLabel('balanc')?></p>
        </div>
      </div>
        <div class="col s12 m1 right-align">
          <a class="btn-floating activator waves-effect waves-light rec accent-2 right">
            <i class="material-icons">create</i>
          </a>
        </div><br><br>
    </div>
    <div class="card-reveal" style="display: none; transform: translateY(0px);">
        <span class="card-title grey-text text-darken-4">
            <i class="material-icons right">close</i>
        </span>
       <div class="row center-align">
          <h3><?=$user->fio?></h3> 
       </div>
      <div class="row">
        <div class="col s4 center-align">
          <img src="<?=$path?>" style="border-radius:10%;width: 50%;height: 50%;">
        </div>
        <div class="col s8">
                    </span><br>
                    <div class="row">
                        <div class="col s1">
                          <i class="material-icons cyan-text text-darken-2">perm_identity</i>
                        </div>
                        <div class="col s11">
                      <?=$user->getTypeDescription()?>
                      </div>
                    </div>
                  <p>
                    <div class="row">
                        <div class="col s1">
                      <i class="material-icons cyan-text text-darken-2">phone</i>
                      </div>
                        <div class="col s11">
                         <?=$user->phone?>
                      </div>
                    </div>
                  </p>
                  <p>
                     <div class="row">
                        <div class="col s1">
                    <i class="material-icons cyan-text text-darken-2">email</i>
                    </div>
                        <div class="col s11">
                          <?=$user->username?>
                       </div>
                    </div>
                  </p>
                  <p>
                     <div class="row">
                        <div class="col s1">
                    <i class="material-icons cyan-text text-darken-2">cake</i>
                    </div>
                        <div class="col s11">
                         <?=$user->getDate($user->birthday)?>
                           </div>
                    </div>
                  </p>
                  <p>
                     <div class="row">
                        <div class="col s1">
                    <i class="material-icons cyan-text text-darken-2">attach_money</i>
                    </div>
                        <div class="col s11">
                         <?=$user->balanc?>
                           </div>
                    </div>
                  </p>
                  <?= Html::a('<i class="material-icons">mode_edit</i>', ['change','id'=>$user->id],['role'=>'modal-remote','title'=>'Изменить','class'=>'btn-floating right'])?>
        </div>
      </div>
    </div>
</div>
<?php Pjax::end()?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>


