<?php
use yii\helpers\Html;

$session = Yii::$app->session;
		foreach ($dataProvider->getModels() as $value) {
			echo "<tr>
                      <td><input type='checkbox' name='check".$value->id."'></td>     
                      <td>".$value->id."</td>";
                      if($session['ScheduleUsers[schedule_id]'] === null || $session['ScheduleUsers[schedule_id]'] == 1)
                      echo "<td>".$value->schedule->name."</td>";
                      if($session['ScheduleUsers[pupil_id]'] === null || $session['ScheduleUsers[pupil_id]'] == 1)
                      echo "<td>".$value->pupil->fio."</td>";
                      if($session['ScheduleUsers[payed]'] === null || $session['ScheduleUsers[payed]'] == 1)
                      echo "<td>".$value->payed."</td>";
                      if($session['ScheduleUsers[comment]'] === null || $session['ScheduleUsers[comment]'] == 1)
                      echo "<td>".$value->comment."</td>";
                      if($session['ScheduleUsers[unsubscribe]'] === null || $session['ScheduleUsers[unsubscribe]'] == 1)
                      echo "<td>".$value->getUnsubscribeDescription()."</td>";
                      echo 
                      "<td class='align-center' style='width: 100px;'>".
                      Html::a('<i class="material-icons view-u">visibility</i>', ['view','id' => $value->id],['role' => 'modal-remote','title' => 'Просмотр']).
                      Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id' => $value->id],['role' => 'modal-remote','title' => 'Изменить']).
                      Html::a('<i class="material-icons red-u">delete_forever</i>', ['delete','id' => $value->id],['role' => 'modal-remote','title' => 'Удалить', 
                        'data-confirm' => false, 'data-method' => false,
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Подтвердите действие',
                        'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?'])."
                      </td>
                    </tr>";
		} ?>  
