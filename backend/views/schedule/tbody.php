<?php

use yii\helpers\Html;
use backend\models\Schedule;

$session = Yii::$app->session;
foreach ($dataProvider->getModels() as $value) {
			echo "<tr><td><input type='checkbox' name='check".$value->id."'></td>     
      <td>".$value->id."</td>";
      if($session['Schedule[course_id]'] === null || $session['Schedule[course_id]'] == 1)
      echo "<td>".$value->courses->name."</td>";
      if(Yii::$app->user->identity->company->type == 1){
      if($session['Schedule[company_id]'] === null || $session['Schedule[company_id]'] == 1)
      echo "<td>".$value->company->name."</td>";}
      if(Yii::$app->user->identity->company->type == 1){
      if($session['Schedule[filial_id]'] === null || $session['Schedule[filial_id]'] == 1)
      echo "<td>".$value->filial->filial_name."</td>";}
      if($session['Schedule[subject_id]'] === null || $session['Schedule[subject_id]'] == 1)
      echo "<td>".$value->subject->name."</td>";
      if($session['Schedule[teacher_id]'] === null || $session['Schedule[teacher_id]'] == 1)
      echo "<td>".$value->teacher->fio."</td>";
      if($session['Schedule[price]'] === null || $session['Schedule[price]'] == 1)
      echo "<td>".$value->price."</td>";
      if($session['Schedule[sum_of_teacher]'] === null || $session['Schedule[sum_of_teacher]'] == 1)
      echo "<td>".$value->sum_of_teacher."</td>";
      if($session['Schedule[begin_date]'] === null || $session['Schedule[begin_date]'] == 1)
      echo "<td>".Schedule::getDate($value->begin_date)."</td>";
      if($session['Schedule[end_date]'] === null || $session['Schedule[end_date]'] == 1)
      echo "<td>".Schedule::getDate($value->end_date)."</td>";
      if($session['Schedule[status]'] === null || $session['Schedule[status]'] == 1)
      echo "<td>".$value->getStatusDescription()."</td>";
      echo 
      "<td class='align-center' style='width: 100px;'>".
      Html::a('<i class="material-icons view-u">visibility</i>', ['view','id' => $value->id],['role' => 'modal-remote',
        'title' => 'Просмотр']).
      Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id' => $value->id],['role' => 'modal-remote',
        'title' => 'Изменить']).
      Html::a('<i class="material-icons red-u">delete_forever</i>', ['delete','id' => $value->id],['role' => 'modal-remote',
        'title' => 'Удалить', 
        'data-confirm' => false, 'data-method' => false,
        'data-request-method' => 'post',
        'data-toggle' => 'tooltip',
        'data-confirm-title' => 'Подтвердите действие',
        'data-confirm-message' => 'Вы уверены что хотите удалить 
        этого элемента?'])."
      </td>
      </tr>";
		} 
?>  
