<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>
<div class="inbox-form">

<?php $form = ActiveForm::begin(['class'=>"form-horizontal", 'options' => ['method' => 'post', 'enctype' => 'multipart/form-data'] ]); ?>
    
    <div class="row">
        <div class="col s12">
            <?=$form->field($model, 'to')->widget(Select2::classname(), [
              'data' => $model->getUsersList(),
                'size' => Select2::SMALL,
                'language' => 'ru',
                'options' => ['placeholder' => 'Выберите',],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?>
        </div>
    </div>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'files')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows'=>5]) ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
          <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

<?php ActiveForm::end(); ?>
</div>