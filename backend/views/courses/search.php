<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>
<tr style="font-size: 14px;">
   		<th>ID</th>
    <?php if($session['Courses[name]'] === null || $session['Courses[name]'] == 1){ ?>
    	<th>Наименование</th>
    <?php }?>
    <?php if($session['Courses[subject_id]'] === null || $session['Courses[subject_id]'] == 1){ ?>
    	<th>Предметы</th>
    <?php }?>
    <?php if($session['Courses[user_id]'] === null || $session['Courses[user_id]'] == 1){ ?>
        <th>Пользователи</th>
    <?php }?>
    <?php if($session['Courses[begin_date]'] === null || $session['Courses[begin_date]'] == 1){ ?>
    	<th>Время начало</th>
    <?php }?>
    <?php if($session['Courses[end_date]'] === null || $session['Courses[end_date]'] == 1){ ?>
    	<th>Время заканчало</th>
    <?php }?>
    <?php if($session['Courses[cost]'] === null || $session['Courses[cost]'] == 1){ ?>
    	<th>Цена</th>
    <?php }?>
    <?php if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1){ ?>
    	<th>Зарплата предподаватела</th>
    <?php }?>
    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
    <?php if($session['Courses[company_id]'] === null || $session['Courses[company_id]'] == 1){ ?>
    	<th>Компания</th>
    <?php }?>
    <?php }?>
    <?php if(Yii::$app->user->identity->company->type == 1){ ?>
    <?php if($session['Courses[filial_id]'] === null || $session['Courses[filial_id]'] == 1){ ?>
    	<th>Филиал</th>
    <?php }?>
    <?php }?>
    	<th>Действия</th>
</tr>
<tr>
    <?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
        	<td>
          		<?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
        	</td>
        <?php if($session['Courses[name]'] === null || $session['Courses[name]'] == 1){ ?>
        	<td>
          		<?=$form->field($searchModel,'name')->textInput(['class'=>'search',
            	'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
        	</td>
        <?php }?>
        <?php if($session['Courses[subject_id]'] === null || $session['Courses[subject_id]'] == 1){ ?>
        	<td>
          		<?=$form->field($searchModel,'subject_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        	</td>
        <?php }?>
        <?php if($session['Courses[user_id]'] === null || $session['Courses[user_id]'] == 1){ ?>
        	<td>
          		<?=$form->field($searchModel,'user_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        	</td>
        <?php }?>
        <?php if($session['Courses[begin_date]'] === null || $session['Courses[begin_date]'] == 1){ ?>
        	<td>
    	      	<?=$form->field($searchModel,'begin_date')->widget(DatePicker::className(), [
    		        'language' => 'ru',
    		        'size' => 'sm',
    		        'type'=> DatePicker::TYPE_INPUT,
    		        'pluginOptions' => [
    		        'todayHighlight' => true,
    		        'format'=>'dd.mm.yyyy',
    		            ],
    		        'options'=>[
    		          'id'=>'begin_date',
    		          'form'=>'searchForm2',
    		          'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;text-align:center !important;'
    		        ]])->label(false) ?>
        	</td>
        <?php }?>
        <?php if($session['Courses[end_date]'] === null || $session['Courses[end_date]'] == 1){ ?>
        	<td>
            	<?=$form->field($searchModel,'end_date')->widget(DatePicker::className(), [
    	          'language' => 'ru',
    	          'size' => 'sm', 
    	          'type'=> DatePicker::TYPE_INPUT,
    	          'pluginOptions' => [
    	          'todayHighlight' => true,
    	          'format'=>'dd.mm.yyyy',
    	          ],
    	          'options'=>[
    	            'id'=>'end_date',
    	            'form'=>'searchForm2',
    	            'style'=>'padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;text-align:center !important;'
    	          ]])->label(false) ?>
        	</td>
        <?php }?>
        <?php if($session['Courses[cost]'] === null || $session['Courses[cost]'] == 1){ ?>
        	<td>
            	<?=$form->field($searchModel,'cost')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        	</td>
        <?php }?>
        <?php if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1){ ?>
        	<td>
            	<?=$form->field($searchModel,'prosent_for_teacher')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        	</td>
        <?php }?>
        <?php if(Yii::$app->user->identity->company->type == 1){ ?>
        <?php if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1){ ?>
        	<td>
            	<?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        	</td>
        <?php }?>
        <?php if($session['Courses[filial_id]'] === null || $session['Courses[filial_id]'] == 1){ ?>
        	<td>
            	<?=$form->field($searchModel,'filial_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
        	</td>
        <?php }?>
        <?php }?>
    	   <td></td>
    <?php ActiveForm::end()?>
</tr>