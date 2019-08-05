 <?php

use yii\helpers\Html;
use backend\models\Courses;

$session = Yii::$app->session;
		foreach ($dataProvider->getModels() as $value) {
          echo "<tr><td>".$value->id."</td>";
              if($session['Courses[name]'] === null || $session['Courses[name]'] == 1)
              echo "<td class='name'>".$value->name."</td>";
              if($session['Courses[subject_id]'] === null || $session['Courses[subject_id]'] == 1)
              echo "<td>".$value->subject->name."</td>";
              if($session['Courses[user_id]'] === null || $session['Courses[user_id]'] == 1)
              echo "<td>".$value->user->fio."</td>";
              if($session['Courses[begin_date]'] === null || $session['Courses[begin_date]'] == 1)
              echo "<td>".Courses::getDate($value->begin_date)."</td>";
              if($session['Courses[end_date]'] === null || $session['Courses[end_date]'] == 1)
              echo "<td>".Courses::getDate($value->end_date)."</td>";
              if($session['Courses[cost]'] === null || $session['Courses[cost]'] == 1)
              echo"<td class='cost'>".$value->cost."</td>";
              if($session['Courses[prosent_for_teacher]'] === null || $session['Courses[prosent_for_teacher]'] == 1)
              echo "<td>".$value->prosent_for_teacher."</td>";
              if(Yii::$app->user->identity->company->type == 1){
              if($session['Courses[company_id]'] === null || $session['Courses[company_id]'] == 1)
              echo "<td>".$value->company->name."</td>";}
              if(Yii::$app->user->identity->company->type == 1){
              if($session['Courses[filial_id]'] === null || $session['Courses[filial_id]'] == 1)
              echo "<td>".$value->filial->filial_name."</td>";}
              echo "<td class='align-center' style='width: 100px;'>".
              Html::a('<i class="material-icons view-u">visibility</i>', ['view','id' =>  $value->id],['role' => 'modal-remote','title' => 'Просмотр']).
              Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id' => $value->id],['role' => 'modal-remote','title' => 'Изменить']).
              Html::a('<i class="material-icons red-u">delete_forever</i>', 
                ['delete','id' => $value->id],
                ['role' => 'modal-remote','title' => 'Удалить', 
                    'data-confirm' => false, 'data-method' => false,
                    'data-request-method' => 'post',
                    'data-toggle' => 'tooltip',
                    'data-confirm-title' => 'Подтвердите действие',
                    'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?']).        "</td>
              </tr>";
      } 
?>  