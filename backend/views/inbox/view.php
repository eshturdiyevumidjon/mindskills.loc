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
            <div class="row">
               <div class="col s12">
                Отправитель:<?php echo " ".$model->from0->fio; ?>
               </div>
            </div>
            <?php $form = yii\widgets\ActiveForm::begin();?>
            <div class="row">
                <div class="col s12">    
               <?= $form->field($model, 'text')->textarea(['rows'=>6]) ?>
               </div>
            </div>
                <?php yii\widgets\ActiveForm::end();?>

                <?php if($model->file != null) {  ?>
            <div class="row">
                <div class="col s9">
                    
                       <?php if($model->file!=null){ ?>
                    <a  href=" <?=Url::toRoute(['/inbox/download-file','id' => $model->id,])?>"><?php echo $model->file;?><br>
                        <i class="material-icons" style="font-size: large;">
                          cloud_download</i>Скачать
                    </a>
                      <?php }?>
                </div>
            </div>
            <div class="row">
                <div class="col s9">
                </div>
                <div class="col s3">
                    <span class="bottom"><?= date( 'H:i d.m.Y', strtotime($model->date_cr) ) ?></span>
                </div>
            </div>
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


