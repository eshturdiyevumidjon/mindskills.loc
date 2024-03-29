<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Districts;
use backend\models\Regions;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Filials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filials-form">
    <?php $form = ActiveForm::begin(['options' => ['method' => 'post', 'enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col s4">
                    <br>
                    <div class="row">
                            <div class="col s12">
                                <div id="image" style="float: left;">
                                 <?= $model->logo != null ? '<img style="width:200px; max-height:200px;"class="img-circle"  src="http://' . $_SERVER["SERVER_NAME"] . "/uploads/filial_logos/" . $model->logo .' ">' : '<img style="width:200px; max-height:200px;"class="img-circle" src="http://' . $_SERVER["SERVER_NAME"].'/uploads/7.jpg">' ?>
                                </div>
                            </div>
                            <div class="col s12">
                             <?= $form->field($model, 'image')->fileInput(['class' => "image_input"]); ?>
                            </div>
                    </div>       
            </div>
            <div class="col s8">
                    <div class="row">
                            <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                                <?= $form->field($model, 'filial_name')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            </div>
                    </div>
                    <div class="row">
                            <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>">
                                <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>" >
                                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>">
                                <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
                            </div> 
                    </div>
                    <div class="row">
                                <div class="col s6" >
                                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                                                 'mask' => '+\9\9899-999-99-99',
                                                 'options' => [
                                                 'placeholder' => '+998-99-999-99-99',
                                                 'class'=>'form-control',
                                                 ]
                                    ]) ?>
                                </div>
                                <div class="col s6" >  
                                        <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
                                </div>                
                    </div>
                    <div class="row">
                                <div class="col s6" >
                                <?= $form->field($model, 'region_id')->label()->widget(\kartik\select2\Select2::classname(), [
                                    'data' => Arrayhelper::map(Regions::find()->all(),'id','name'),
                                    'options' => [
                                    'placeholder' => 'Выберите',
                                        'onchange'=>'
                                            $.post( "/filials/districts?id='.'"+$(this).val(), function( data ){
                                                $( "select#districts_id" ).html( data);
                                            });' 
                                        ],
                                    'pluginOptions' => [ 
                                    'allowClear' => true
                                    ],
                                    ]); ?>
                                </div>
                                <div class="col s6" >  
                                 <?= $form->field($model, 'district_id')->label()->widget(\kartik\select2\Select2::classname(), [
                                    'data' => Arrayhelper::map(Districts::find()->where(['region_id'=>$model->region_id])->all(),'id','name'),
                                    'options' => [
                                        'placeholder' => 'Выберите',
                                        'id' => 'districts_id',],
                                        'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                    ]); ?>
                                </div>                
                    </div>
            </div>
        </div>
    	<?php if (!Yii::$app->request->isAjax){ ?>
    	  	<div class="form-group">
    	       <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	    </div>
    	<?php } ?>
    <?php ActiveForm::end(); ?>
</div>
<?php 
$this->registerJs(<<<JS
$(document).ready(function(){
    var fileCollection = new Array();
    $(document).on('change', '.image_input', function(e){
        var files = e.target.files;
        $.each(files, function(i, file){
            fileCollection.push(file);
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
         var template = '<img style="width:200px; height:200px;" class="img-circle"src="'+e.target.result+'"> ';
         $('#image').html('');
         $('#image').append(template);
            };
        });
    });
});
JS
);
?>
