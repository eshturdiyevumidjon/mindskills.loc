<?php
use kartik\date\DatePicker; 
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
?>

<tr style="font-size: 14px;">
  	<th>ID</th>
  <?php if($session['Filials[logo]'] === null || $session['Filials[logo]'] == 1)
  { ?>
  	<th>Логотип</th>
  <?php }?>
  <?php if($session['Filials[filial_name]'] === null || $session['Filials[filial_name]'] == 1)
  { ?>
  	<th>Наименование</th>
  <?php }?>
  <?php if($session['Filials[admin]'] === null || $session['Filials[admin]'] == 1)
  { ?>
  	<th>ФИО</th>
  <?php }?>
  <?php if($session['Filials[phone]'] === null || $session['Filials[phone]'] == 1)
  { ?>
  	<th>Телефон</th>
  <?php }?>
  <?php if($session['Filials[region_id]'] === null || $session['Filials[region_id]'] == 1)
  { ?>
  	<th>Область</th>
  <?php }?>
  <?php if($session['Filials[district_id]'] === null || $session['Filials[district_id]'] == 1)
  { ?>
  	<th>Район</th>
  <?php }?>
  <?php if($session['Filials[address]'] === null || $session['Filials[address]'] == 1)
  { ?>
  	<th>Адрес</th>
  <?php }?>
  <?php if($session['Filials[site]'] === null || $session['Filials[site]'] == 1)
  { ?>
  	<th>Сайт филиала</th>
  <?php }?>
  <?php if($session['Filials[email]'] === null || $session['Filials[email]'] == 1)
  { ?>
  	<th>Эмаил</th>
  <?php }?>
  <?php if($session['Filials[company_id]'] === null || $session['Filials[company_id]'] == 1)
  { ?>
  	<th>Компания</th>
  <?php }?>
  	<th>Действия</th>
</tr>
<tr>
  <?php $form= ActiveForm::begin(['options' => ['id' => 'searchForm2']])?>
	  <?php if($session['Filials[logo]'] === null || $session['Filials[logo]'] == 1)
	    { ?>
	  	<td></td>
	  <?php }?>
	    <td>
	   	  <?=$form->field($searchModel,'search')->hiddenInput(['class'=>'search','style'=>'padding-bottom:14px;','form'=>'searchForm2','value'=>'1'])->label(false)?>
	    </td>
	  <?php if($session['Filials[filial_name]'] === null || $session['Filials[filial_name]'] == 1)
	    { ?>
	    <td>
	       <?=$form->field($searchModel,'filial_name')->textInput(['class'=>'search',
	      'style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>  
	    </td>
	  <?php }?>
	  <?php if($session['Filials[admin]'] === null || $session['Filials[admin]'] == 1)
	    { ?>
	    <td>
	       <?=$form->field($searchModel,'admin')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	  <?php if($session['Filials[phone]'] === null || $session['Filials[phone]'] == 1)
	    { ?>
	    <td>
	       <?=$form->field($searchModel,'phone')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	  <?php if($session['Filials[district_id]'] === null || $session['Filials[district_id]'] == 1)
	    { ?>
	    <td>
	       <?=$form->field($searchModel,'district_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	  <?php if($session['Filials[region_id]'] === null || $session['Filials[region_id]'] == 1)
	    { ?>
	    <td>
	       <?=$form->field($searchModel,'region_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	  <?php if($session['Filials[address]'] === null || $session['Filials[address]'] == 1)
	    { ?>
	    <td>
	       <?=$form->field($searchModel,'address')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	  <?php if($session['Filials[site]'] === null || $session['Filials[site]'] == 1)
	    { ?>
	    <td>
	      <?=$form->field($searchModel,'site')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	  <?php if($session['Filials[email]'] === null || $session['Filials[email]'] == 1)
	    { ?>
	    <td>
	      <?=$form->field($searchModel,'email')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	  <?php if($session['Filials[company_id]'] === null || $session['Filials[company_id]'] == 1)
	    { ?>
	    <td>
	      <?=$form->field($searchModel,'company_id')->textInput(['class'=>'search','style'=>'width:100%;padding-bottom:0px;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;height:32px !important;','form'=>'searchForm2'])->label(false)?>
	    </td>
	  <?php }?>
	    <td></td>
    <?php ActiveForm::end()?>
</tr>