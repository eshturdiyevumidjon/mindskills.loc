<?php
use yii\helpers\Html;
use backend\models\ScheduleGraph;
$session = Yii::$app->session;
		foreach ($dataProvider->getModels() as $value) {
echo 
	"<tr>
            <td><input type='checkbox' name='check".$value->id."'></td>     
            <td>".$value->id."</td>";
            if($session['ScheduleGraph[schedule_id]'] === null || $session['ScheduleGraph[schedule_id]'] == 1)
            echo "<td>".$value->schedule->name."</td>";
            if($session['ScheduleGraph[classroom_id]'] === null || $session['ScheduleGraph[classroom_id]'] == 1)
            echo "<td>".$value->classroom->name."</td>";
            if($session['ScheduleGraph[begin_date]'] === null || $session['ScheduleGraph[begin_date]'] == 1)
            echo "<td>".ScheduleGraph::getDate($value->begin_date)."</td>";
            if($session['ScheduleGraph[end_date]'] === null || $session['ScheduleGraph[end_date]'] == 1)
            echo "<td>".ScheduleGraph::getDate($value->end_date)."</td>";
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
                      'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?'])."
            </td>
    </tr>";
        } ?> 