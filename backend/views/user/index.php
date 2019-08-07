<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;
use yii\helpers\Arrayhelper;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;
use common\models\User;
use models\models\Companies;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$pathInfo = Yii::$app->request->pathInfo;
if($pathInfo=='user/admin'){
  $type=1;
  $this->title = 'Администраторы';
}
if($pathInfo=='user/teacher'){
  $type=2;
  $this->title = 'Предподователи';
}
if ($pathInfo=='user/pupil'){
  $type=3;
  $this->title = 'Ученики';
}
$this->params['breadcrumbs'][] = $this->title;
$models = $dataProvider->getModels();
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<div class="user-index">
  <div id="ajaxCrudDatatable">
    <div class="row">
      <div class="col s12 m12">
        <div class="card">
          <?=$this->render('header',['type'=>$type])?>
          <?php Pjax::begin(['enablePushState' => false,'id'=>'crud-datatable-pjax'])?>
          <div class="section">
            <div id="row-grouping" class="section">
              <div class="row">
                <div class="col s11" style="margin:  20px 40px 20px 40px">
                  <table class="bordered highlight centered" cellspacing="0" id="MyTableuser" width="100%">
                    <thead>
                        <?=$this->render('search',['searchModel'=>$searchModel])?>
                    </thead>
                    <tbody id="myTableuser">
                        <?=$this->render('tbody',['dataProvider'=>$dataProvider, 'type' => $type ])?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php Pjax::end()?>
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
<?=$this->render('js.php')?>