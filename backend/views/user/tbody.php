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
				if($session['User[image]'] === null || $session['User[image]'] == 1)
				echo "<td><img src='$path' style='width: 60px;border-radius: 1em;border: solid 1px #cecece;'></td>";
				if($session['User[fio]'] === null || $session['User[fio]'] == 1)
				echo "<td>".$value->fio."</td>";
				if($session['User[username]'] === null || $session['User[username]'] == 1)
				echo "<td>".$value->username."</td>";
				if($session['User[status]'] === null || $session['User[status]'] == 1)
				echo "<td>".$value->getStatusDescription()."</td>";
				if($session['User[birthday]'] === null || $session['User[birthday]'] == 1)
				echo "<td>".User::getDate($value->birthday)."</td>";
				if($session['User[phone]'] === null || $session['User[phone]'] == 1)
				echo "<td>".$value->phone."</td>";
				if($session['User[balanc]'] === null || $session['User[balanc]'] == 1)
				echo "<td>".$value->balanc."</td>";
				if(Yii::$app->user->identity->company->type == 1){
				if($session['User[company_id]'] === null || $session['User[company_id]'] == 1)
				echo "<td>".$value->company->name."</td>";}
				if(Yii::$app->user->identity->company->type == 1){
				if($session['User[filial_id]'] === null || $session['User[filial_id]'] == 1)  
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
