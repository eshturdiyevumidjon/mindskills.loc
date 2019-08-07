<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$user=Yii::$app->user->identity;
if($user->image == null) $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
else $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $user->image;

?>
<header id="header" class="page-topbar">
      <!-- start header nav-->
  <div class="navbar-fixed">
    <nav class="navbar-color gradient-45deg-purple-deep-orange gradient-shadow">
      <div class="nav-wrapper">
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
              <i class="material-icons">settings_overscan</i>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
              <i class="material-icons">notifications_none
                <small class="notification-badge">5</small>
              </i>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
              <span class="avatar-status avatar-online">
                <img src="<?=$path?>"  alt="avatar" style="margin-bottom: 15px; "class="img-circle">
                <i></i>
              </span>
            </a>
          </li>
          <li>
            <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
              <i class="material-icons">format_indent_increase</i>
            </a>
          </li>
        </ul>
        <ul id="notifications-dropdown" class="dropdown-content">
          <li>
            <h6>NOTIFICATIONS
              <span class="new badge">5</span>
            </h6>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#!" class="grey-text text-darken-2">
              <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
          </li>
          <li>
            <a href="#!" class="grey-text text-darken-2">
              <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
          </li>
          <li>
            <a href="#!" class="grey-text text-darken-2">
              <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
          </li>
          <li>
            <a href="#!" class="grey-text text-darken-2">
              <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
          </li>
          <li>
            <a href="#!" class="grey-text text-darken-2">
              <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
          </li>
        </ul>
        <!-- profile-dropdown -->
        <ul id="profile-dropdown" class="dropdown-content">
          <li>
               <?= Html::a('<i class="material-icons">face</i> Профиль', ['/user/profile'], ['class' => 'grey-text text-darken-1']); ?>
          </li>
          <li>
            <a href="#" class="grey-text text-darken-1">
              <i class="material-icons">settings</i> Settings</a>
          </li>
          <li>
            <?= Html::a('<i class="material-icons">email</i>Чат', ['/inbox/index'],['class' => 'grey-text text-darken-1']); ?>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#" class="grey-text text-darken-1">
              <i class="material-icons">lock_outline</i> Lock</a>
          </li>
          <li>
            <?= Html::a(
                          '<i class="material-icons">keyboard_tab</i> Выйти</a>',
                          ['/site/logout'], 
                          ['class' => 'grey-text text-darken-1']   
            ) ?>
              
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>