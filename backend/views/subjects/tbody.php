<?php
use common\models\User;
use yii\helpers\Html;

$session = Yii::$app->session;
		foreach ($dataProvider->getModels() as $value) {
	if (!file_exists('uploads/avatar/'.$value->image) || $value->image == '') {
	  $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/no-user.jpg';
	} else {
	  $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/avatar/'.$value->image;
	}
			echo "<tr><td>".$value->id."</td>";
			if($session['Subjects[name]'] === null || $session['Subjects[name]'] == 1)
			echo "<td>".$value->name."</td>";
			if(Yii::$app->user->identity->company->type == 1){
			if($session['Subjects[company_id]'] === null || $session['Subjects[company_id]'] == 1)
			echo "<td>".$value->company->name."</td>";}
			if(Yii::$app->user->identity->company->type == 1){
			if($session['Subjects[filial_id]'] === null || $session['Subjects[filial_id]'] == 1)
			echo "<td>".$value->filial->filial_name."</td>";}
			echo 
			"<td class='align-center' style='width: 100px;'>".
			Html::a('<i class="material-icons view-u">visibility</i>', ['view','id' => 
			$value->id],['role' => 'modal-remote','title' => 'Просмотр']).
			Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id' => 
			$value->id],['role' => 'modal-remote','title' => 'Изменить']).
			Html::a('<i class="material-icons red-u">delete_forever</i>', ['delete','id' => $value->id],['role' => 'modal-remote','title' => 'Удалить', 
			        'data-confirm' => false, 'data-method' => false,
			            'data-request-method' => 'post',
			            'data-toggle' => 'tooltip',
			            'data-confirm-title' => 'Подтвердите действие',
			            'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?'])."
			</td>
			</tr>";} ?>  
