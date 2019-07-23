<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

CrudAsset::register($this);
?>
    <div class="panel panel-default" style="margin-top: 20px; width: 100%;">
        <div class="panel-body" style="width: 100%; height: 300px; position: relative; overflow-y:auto;">
                <?=$model->text?>
        </div>
    </div>
    <?php if($model->file != null) {  ?>
        <div class="pull-left">
            <a class="fa fa-download" href=" <?=Url::toRoute(['/inbox/download-file','id' => $model->id,])?>">Скачать</a>
        </div>
    <?php }?>
    
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>


