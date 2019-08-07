<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\ScheduleGraph;
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScheduleGraphSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'График занятий';
$this->params['breadcrumbs'][] = $this->title;

$models = $dataProvider->getModels();
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<div class="ScheduleGraph-index">
  <div id="ajaxCrudDatatable">
    <div class="row">
      <div class="col s12 m12">
        <div class="card">
          <?=$this->render('header')?>
          <?php Pjax::begin(['enablePushState' => false,'id' => 'crud-datatable-pjax'])?>
            <div class="section" >
              <div id="row-grouping" class="section">
                <div class="row">
                  <div class="col s11" style="margin:  20px 40px 20px 40px">
                    <table class="bordered highlight centered" cellspacing="0" width="100%">
                      <thead>
                        <?=$this->render('search',['searchModel'=>$searchModel])?>
                      </thead>
                      <tbody id="myTableschedulegraph">
                        <?=$this->render('tbody',['dataProvider'=>$dataProvider])?>
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
