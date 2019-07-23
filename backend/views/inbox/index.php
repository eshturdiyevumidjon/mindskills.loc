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
              </div>
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
                <a href="/inbox/create" class="tooltipped" data-position="right" data-delay="50" data-tooltip="I am a tooltip" role="modal-remote">
                <i class="material-icons">create</i>
                </a>
              </li>
              <li>
                <a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="I am a tooltip">
                <i class="material-icons">inbox</i>
                 <small class="notification-badge">5</small>
                </a>
              </li>
              <li>
                <a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="I am a tooltip">  <i class="material-icons">star</i>
                </a>
              </li>
              <li>
                 <a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="I am a tooltip"> 
                  <i class="material-icons">error</i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col s9 m10">
            <div class="card-panel"> 
                <ul class="collection">
                <?php if($inbox>0):
                 foreach($models as $mail):?>
                <li class="collection-item avatar">
             
                <span class="circle grey darken-1">
                  <img src="">
                </span>
                <span class="email-title"><?=$mail->title?></span>
                <p class="truncate grey-text ultra-small">Update your code skill, free tutorial for web development.</p>
                <a href="#!" class="secondary-content email-time">
                  <span class="blue-text ultra-small">2:05 am</span>
                </a>
                </li>
                <?php endforeach;
                else:
                ?>
                No message
            <?php endif;?>
                </ul>

            </div>
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
