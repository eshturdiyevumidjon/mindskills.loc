<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\DashboardAsset;

if (Yii::$app->controller->action->id === 'login' ||Yii::$app->controller->action->id === 'register' ) {     echo $this->render(
        'main_login',
        ['content' => $content]
    );
} else {
    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        backend\assets\AppAsset::register($this);
    }
  DashboardAsset::register($this);
  $session = Yii::$app->session;
  if($session['dark_theme'] != null) $dark_theme = $session['dark_theme'];
        else $dark_theme = 0;
  if($session['semi_dark'] != null) $semi_dark = $session['semi_dark'];
        else $semi_dark = 0;
  if($session['light'] != null) $light = $session['light'];
        else $light = 0;
  if($session['foot'] != null) $foot = $session['foot'];
        else $foot = 0;
  if($session['asside'] != null) $asside = $session['asside'];
        else $asside = 0;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <?php $this->registerCsrfMetaTags() ?>
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    </head>
    <body>
      <?php $this->beginBody() ?>
        <!-- Start Page Loading -->
        <div id="loader-wrapper">
          <div id="loader"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START HEADER -->
        <?= $this->render(
              'header.php')
        ?>  
        <!-- END HEADER -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START MAIN -->
          <div id="main">
          <!-- START WRAPPER -->
          <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV-->
            <?= $this->render(
                'left_side_bar.php'
            ) ?>  
            <input type="hidden" name="dark_theme" id="dark_theme" value="<?=$dark_theme?>" >
            <input type="hidden" name="semi_dark" id="semi_dark" value="<?=$semi_dark?>" >
            <input type="hidden" name="light" id="light" value="<?=$light?>" >
            <input type="hidden" name="foot" id="foot" value="<?=$foot?>" >
            <input type="hidden" name="asside" id="asside" value="<?=$asside?>" >
            <!-- END LEFT SIDEBAR NAV-->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START CONTENT -->
            <?= $this->render(
              'content.php',
              ['content' => $content]
            ) ?>  
            <!-- END CONTENT -->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
            <?= $this->render(
                'right_side_bar.php'
            ) ?>  
            <!-- END RIGHT SIDEBAR NAV-->
            </div>
            <!-- END WRAPPER -->
          </div>
          <!-- END MAIN -->
          <!-- //////////////////////////////////////////////////////////////////////////// -->
          <!-- START FOOTER -->
          <footer class="page-footer gradient-45deg-purple-deep-orange">
            <div class="footer-copyright">
              <div class="container">
                <span>&copy; Kibera <?= date('Y') ?></span>
                <span class="right hide-on-small-only"><?= Yii::powered() ?></span>
              </div>
            </div>
          </footer>
          <!-- END FOOTER -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
<?php } ?>