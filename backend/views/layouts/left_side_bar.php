<?php 
$pathInfo = $this->context->id;
?>
<aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
      <div class="brand-sidebar">
          <h1 class="logo-wrapper">
              <a href="index.html" class="brand-logo darken-1">
                <img src="../../images/logo/materialize-logo.png" alt="materialize logo">
                <span class="logo-text hide-on-med-and-down">Materialize</span>
              </a>
                <a href="#" class="navbar-toggler">
                <i class="material-icons">radio_button_checked</i>
              </a>
          </h1>
      </div>
  <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="transform: translateX(0%);">
      <li class="no-padding">
          <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <a href="/site/index">
                    <i class="material-icons">dashboard</i>
                    <span>Домашняя страница</span>
                  </a>
                </li>
                <li>
                  <a href="/user/index">
                    <i class="material-icons">account_circle</i>
                    <span>Пользователи</span>
                  </a>
                </li>
                <li>
                  <a href="/subjects/index">
                    <i class="material-icons">book</i>
                    <span>Предметы</span>
                  </a>
                </li>
                <?php if(Yii::$app->user->identity->company->type==1): ?>
                <li class="bold <?= ($pathInfo=='companies'||$pathInfo=='filials')?'active':''?>">
                  <a class="collapsible-header waves-effect waves-cyan <?= ($pathInfo=='companies'||$pathInfo=='filials')?'active':''?>">
                    <i class="material-icons">web</i>
                    <span class="nav-text">Супер Компания</span>
                  </a>
                  <div class="collapsible-body" style="display:<?= ($pathInfo=='companies'||$pathInfo=='filials')?'block':'none'?>;">
                      <ul>
                          <li class="<?= ($pathInfo=='companies')?'active':''?>">
                            <a href="/companies/index">
                              <i class="material-icons">school</i>
                              <span>Компания</span>
                            </a>
                          </li> 
                          <li class="<?= ($pathInfo=='filials')?'active':''?>">
                            <a href="/filials/index">
                              <i class="material-icons">portrait</i>
                              <span>Филиалы</span>
                            </a>
                          </li>
                      </ul>
                  </div>
                  </li><?php else: ?>
                  <li>
                          <a href="/courses/index">
                            <i class="material-icons">school</i>
                            <span>Курсы</span>
                          </a>
                  </li>
                  <?php endif; ?>
          </ul>
      </li>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
      <div class="ps-scrollbar-x" style="left: 0px; width: 0px;">
      </div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 385px; right: 3px;">
      <div class="ps-scrollbar-y" style="top: 0px; height: 126px;"></div>
    </div>
  </ul>
      <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
        <i class="material-icons">menu</i>
      </a>
</aside>


