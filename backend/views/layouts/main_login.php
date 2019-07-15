<?php

use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\DashboardAsset;

DashboardAsset::register($this);
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
     <?=$content?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
