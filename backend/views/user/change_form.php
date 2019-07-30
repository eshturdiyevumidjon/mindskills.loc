<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 

if (!file_exists('uploads/avatar/'.$model->image) || $model->image == '') {
    $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/no-user.jpg';
} else {
    $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/avatar/'.$model->image;
}

?>

<div class="users-form">

    <?php $form = ActiveForm::begin([ 'options' => ['method' => 'post', 'enctype' => 'multipart/form-data']]); ?>
   
    <div class="row">
        <div class="col s4">
            <div class="col s12">
                <center>
                      <div id="image">
                            <?=Html::img($path, [
                                'style' => 'width:180px; height:180px;',
                                'class' => 'img-circle',
                            ])?>
                      </div>
                </center>
            </div>
            <div class="col s12">
                <?= $form->field($model, 'photoOfUser')->fileInput(['class'=>"image_input"]); ?>
            </div>
        </div>
        <div class="col s8">
            <div class="row">
                <div class="col s6">
                    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s6">
                    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [ 'mask' => '+\9\9899-999-99-99']) ?>
                
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s6">
                    <?= $form->field($model, 'new_password')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                        <?= $form->field($model, 'birthday')->widget(DatePicker::className(), [
                        'language' => 'ru',
                        'size' => 'sm', 
                        'type'=> DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                        'todayHighlight' => true,
                        'format'=>'dd.mm.yyyy',
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
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
                var template = '<img style="width:100%; max-height:180px;" src="'+e.target.result+'"> ';
                $('#image').html('');
                $('#image').append(template);
            };
        });
    });
});
JS
);
?>