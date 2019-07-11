<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\Menu;
use common\models\User;
$pathInfo = Yii::$app->request->pathInfo;
?>
<aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
          <div class="brand-sidebar">
            <h1 class="logo-wrapper">
              <a href="index.html" class="brand-logo darken-1">
                <img src="../images/logo/materialize-logo.png" alt="materialize logo">
                <span class="logo-text hide-on-med-and-down">Materialize</span>
              </a>
              <a href="#" class="navbar-toggler">
                <i class="material-icons">radio_button_checked</i>
              </a>
            </h1>
          </div>
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="no-padding">
                    <?= Menu::widget(
                [
                    'options' => [
                     'class' => 'collapsible',
                     'data-collapsible' => 'accordion'
                   ],
                    'items' => [
                        ['label' => 'Домашняя страница', 'icon' => 'dashboard', 'url' => ['/site/index'],],
                        ['label' => 'Пользователи', 'icon' => 'account_circle', 'url' => ['/user/index']],
                        ['label' => 'Курсы', 'icon' => 'school', 'url' => ['/courses/index']],
                        ['label' => 'Предметы', 'icon' => 'book', 'url' => ['/subjects/index']],
                        (Yii::$app->user->identity->company->type==1)?
                        ['label' => 'Super Company','options'=>['class'=>($pathInfo=='company/index'||$pathInfo=='filials/index')?'active':''], 'icon' => '','url' => [''],
                            'items' => [                            
                                ['label' => 'Компания', 'icon' => 'store', 'url' => ['/companies/index']],
                                ['label' => 'Филиалы', 'icon' => 'portrait', 'url' => ['/filials/index']],
                                            
                            ],
                        ]
                      :
                        ['label' => 'Филиалы', 'icon' => 'school', 'url' => ['/filials/index']],
                        
                    ],
                ]
            ) ?>      
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
            <i class="material-icons">menu</i>
          </a>
        </aside>