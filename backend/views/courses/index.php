<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\models\Courses;
use yii\widgets\Pjax;
use backend\models\User; 
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы';
$models = $dataProvider->getModels();

$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
CrudAsset::register($this);
?>
<div class="courses-index">
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
                    <table class="bordered highlight centered" cellspacing="0"  width="100%">
                      <thead>
                        <?=$this->render('search',['searchModel'=>$searchModel])?> 
                      </thead>
                      <tbody id="myTablecourses">
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
          
