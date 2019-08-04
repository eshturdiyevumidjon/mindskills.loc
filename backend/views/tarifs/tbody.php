<?php
use yii\helpers\Html;

$session = Yii::$app->session;
		foreach ($dataProvider->getModels() as $value) {
			echo "<tr>
                    <td><input type='checkbox' name='check".$value->id."'></td>     
                    <td>".$value->id."</td>";
                    if($session['Tarifs[name]'] === null || 
                      $session['Tarifs[name]'] == 1)
                    echo "<td>".$value->name."</td>";
                    if($session['Tarifs[days]'] === null || 
                      $session['Tarifs[days]'] == 1)
                    echo "<td>".$value->days."</td>";
                    if($session['Tarifs[price]'] === null || 
                      $session['Tarifs[price]'] == 1)
                    echo "<td>".$value->price."</td>";
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
