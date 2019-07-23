<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 
use yii\helpers\Arrayhelper;
use backend\models\Filials;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['method' => 'post', 'enctype' => 'multipart/form-data']]); ?>

    <div class="row">
       <div class="col s4">
        <div class="row">
                <div class="col s12">
                    <div id="image" style="float: left;">
                     <?= $model->image != null ? '<img style="width:225px;border-radius:10%; " src="http://' . $_SERVER["SERVER_NAME"] . "/uploads/avatar/" . $model->image .' ">' : '<img style="width:225px;border-radius:10%; "  class="img-circle" src="http://' . $_SERVER["SERVER_NAME"].'/uploads/no-user.jpg">' ?>
                    </div>
                </div>
                <div class="col s12">
                 <?= $form->field($model, 'photoOfUser')->fileInput(['class'=>"image_input"]); ?>
                </div>
            </div>       
        </div>
       <div class="col s8">
         <div class="row">
                <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="<?= ($model->isNewRecord)?'input-field col s6':'col s6'?>" >
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                    <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>">
                         <?= $form->field($model, ($model->isNewRecord)?'auth_key':'new_password')->textInput(['maxlength' => true]) ?>
                    </div>
                <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>" >
                      <?= $form->field($model, 'birthday')->widget(DatePicker::className(), [
                        'language' => 'ru',
                        'size' => 'sm', 
                        'type'=>DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                        'todayHighlight' => true,
                        'format'=>'dd.mm.yyyy',
                        ]
                    ]) ?>
                </div>
                <div class="<?= ($model->isNewRecord)?'input-field col s4':'col s4'?>">
                    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [ 'mask' => '+\9\9899-999-99-99']) ?>
                </div> 
            </div>
            <div class="row">
                    <div class="col s4" >
                    <?= $form->field($model, 'balanc')->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '9',
                                'clientOptions' => ['repeat' => 10, 'greedy' => false]
                            ]) ?>
                    </div>
                    <div class="col s4" >  
                            <?=$form->field($model, 'status')->dropDownList($model->getStatus(), ['prompt' => 'Выберите...','style'=>'margin-top:12px;'])?>
                    </div>   
                    <div class="col s4">
                        <?=$form->field($model, 'filial_id')->dropDownList($model->getAvailableFilials(), ['prompt' => 'Выберите','style'=>'margin-top:12px;'])?>
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
                var template = '<img style="width:225px; max-height:225px;"class="img-circle" src="'+e.target.result+'"> ';
                $('#image').html('');
                $('#image').append(template);
            };
        });
    });

    
});
JS
);
?>
