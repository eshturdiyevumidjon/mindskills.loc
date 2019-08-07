<?php
use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use common\widgets\Alert;

?>  
<section id="content">
  <!--start container-->
  	<div class="container">
      	<?= Alert::widget() ?>
      	<?= $content ?> 
  	</div>
  <!--end container-->
</section>