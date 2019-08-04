<?php
use yii\helpers\Html;

$session = Yii::$app->session;
		foreach ($dataProvider->getModels() as $value) {
			 if (!file_exists('uploads/filial_logos/'.$value->logo) || $value->logo == '') {
                      $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/7.jpg';
                  } else {
                      $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/filial_logos/'.$value->logo;
                  }
                echo "<tr><td>".$value->id."</td>";
                if($session['Filials[logo]'] === null || $session['Filials[logo]'] == 1)
                echo "<td><img src='$path' style='width:55px; max-height:55px;'class='img-circle'></td>";
                if($session['Filials[filial_name]'] === null || 
                  $session['Filials[filial_name]'] == 1)
                echo "<td>".$value->filial_name."</td>";
                if($session['Filials[surname]'] === null || $session['Filials[surname]'] == 1)
                echo "<td>".$value->surname."</td>";
            	  if($session['Filials[name]'] === null || $session['Filials[name]'] == 1)
                echo "<td>".$value->name."</td>";
            	  if($session['Filials[middle_name]'] === null || $session['Filials[middle_name]'] == 1)
                echo "<td>".$value->middle_name."</td>";
                if($session['Filials[phone]'] === null || $session['Filials[phone]'] == 1)
                echo "<td>".$value->phone."</td>";
                if($session['Filials[region_id]'] === null || 
                  $session['Filials[region_id]'] == 1)
                echo "<td>".$value->region->name."</td>";
                if($session['Filials[district_id]'] === null || 
                  $session['Filials[district_id]'] == 1)
                echo "<td>".$value->district->name."</td>";
                if($session['Filials[address]'] === null || $session['Filials[address]'] == 1)
                echo "<td>".$value->address."</td>";
                if($session['Filials[site]'] === null || $session['Filials[site]'] == 1)
                echo "<td>".$value->site."</td>";
                if($session['Filials[email]'] === null || $session['Filials[email]'] == 1)
                echo  "<td>".$value->email."</td>";
                if($session['Filials[company_id]'] === null || 
                  $session['Filials[company_id]'] == 1)
                echo  "<td>".$value->company->name."</td>";
                echo "<td class='align-center' style='width: 100px;'>".
                Html::a('<i class="material-icons view-u">visibility</i>', ['view','id' => $value->id],['role' => 'modal-remote','title' => 'Просмотр']).
                Html::a('<i class="material-icons blue-u">mode_edit</i>', ['update','id' => $value->id],['role' => 'modal-remote','title' => 'Изменить']).
                Html::a('<i class="material-icons red-u">delete_forever</i>', 
                  ['delete','id' => $value->id],
                  ['role' => 'modal-remote','title' => 'Удалить', 
                                          'data-confirm' => false, 'data-method' => false,
                                          'data-request-method' => 'post',
                                          'data-toggle' => 'tooltip',
                                          'data-confirm-title' => 'Подтвердите действие',
                                          'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?'])."
                </td>
                </tr>";

			;} ?>  