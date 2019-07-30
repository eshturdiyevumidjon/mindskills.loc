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
    <div class="panel-body" style="width: 100%; height: 320px; position: relative; overflow-y:auto;">
        <div class="row">
            <div class="col s12">    
                Получатель:<?php echo " ".$model->to0->fio; ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col s12">
                Отправитель:<?php echo " ".$model->from0->fio; ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col s12">
                <p class="title"><?=$model->title?></p>
                <p class="left-align"><?php echo $model->text;?></p>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col s2">
                 <?php  echo $model->file;
                 if($model->file!=null){ ?>
                 <a  href=" <?=Url::toRoute(['/inbox/download-file','id' => $model->id,])?>"><br>
                    <div class="row">
                      <div class="col s4 right-align">
                        <i class="material-icons">
                        cloud_download</i>
                      </div>
                      <div class="col s5 left-align">
                        Скачать
                      </div>
                    </div>
                </a>
                <?php }?>
            </div>
            <div class="col s10 right-align">
                <span><?= date( 'H:i:m', strtotime($model->date_cr) ) ?></span><br>
                <span><?= date( 'd.m.Y', strtotime($model->date_cr) ) ?></span>
            </div>
        </div>
    </div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>


