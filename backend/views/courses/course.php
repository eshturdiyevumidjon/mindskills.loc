<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use backend\models\Schedule;
use backend\models\ScheduleGraph;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

$this->title = 'Курсы';
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);
?><br>
<?php Pjax::begin(['enablePushState' => false, 'id' => 'crud-datatable-pjax']) ?>
	<div class="card light-white">
	    <div class="card-content black-text">
			<div class="row">
			    <div class="col s6 m12 l5">
					<div class="row">
		    			<nav class="purple">
						  <div class="nav-wrapper">
						    <a href="#!" class="brand-logo">
						    <p style="font-size: 22px;margin-left: 20px;">
						      	<i class="material-icons">local_library</i><?=Html::encode($this->title)?><?php echo ": ".$course->name." ";?>
						  	</p>
						    </a>
						    <ul class="right hide-on-med-and-down">
						      <li>
						         <?= Html::a('Редактировать курс', ['/schedule/update','id'=>$schedule->id],['role' => 'modal-remote','title' => 'Редактировать курс'])?>
						      </li>
						    </ul>
						  </div>
						</nav>
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td><br>
										<p>Преподаватель: <?= Html::a($schedule->teacher->fio, ['/user/teacher_course','id'=>$schedule->teacher_id],['style'=>"color:purple" ,'data-pjax'=>'0'])?></p>
										<p>Предмет: <?php echo $schedule->subject->name;?></p>
										<p>Продолжительность: <?php echo " c ".Schedule::getDate($schedule->begin_date)." по ".Schedule::getDate($schedule->end_date);?></p>
										<p>Стоимость занятия: <?php echo $schedule->price;?></p><br>
									</td>
								</tr>
							</tbody>
						</table>
			    	</div>
			    </div>
			    <div class="col s6 m12 l1">
			    </div>
			    <div class="col s6 m12 l6">
					<div class="row">
		    			<nav class=" purple">
						  <div class="nav-wrapper ">
						    <a href="#!" class="brand-logo">
						      <p style="font-size: 22px;margin-left: 20px;">
						      	<i class="material-icons">grid_on</i><?php echo "Расписание";?>
						  	  </p>
						    </a>
						    <ul class="right hide-on-med-and-down">
						      <li>
						        <?= Html::a('Добавить занятия', ['/schedule-graph/create','id'=>$course->id],['role' => 'modal-remote','title' => 'Создать','style'=>"margin-bottom"])?>
						      </li>
						    </ul>
						  </div>
						</nav>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>День недели</th>
									<th>Аудитория</th>
									<th>Время</th>
									<th style="width: 80px;">Действия</th>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach ($scheduleGraph as  $value) {
								?>
								<tr>
									<td>
										<?= $value->getWeekDescription()?>
									</td>
									<td>
										<?= $value->classroom->name?>
									</td>
									<td>
										<?php echo date('H:i', strtotime($value->class_start));
										echo "-".date('H:i', strtotime($value->class_start. ' + '.ScheduleGraph::timeToStr($value->class_duration)))
										;?>
									</td>
									<td class='align-center'>
										<?=Html::a('<i class="material-icons blue-u">mode_edit</i>', ['/schedule-graph/update','id' => $value->id],['role' => 'modal-remote','title' => 'Изменить'])?>
										<?=Html::a('<i class="material-icons red-u">delete_forever</i>', 
											['/schedule-graph/delete','id' => $value->id],
											['role' => 'modal-remote','title' => 'Удалить', 
											'data-confirm' => false, 'data-method' => false,
											'data-request-method' => 'post',
											'data-toggle' => 'tooltip',
											'data-confirm-title' => 'Подтвердите действие',
											'data-confirm-message' => 'Вы уверены что хотите удалить этого элемента?'])?>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
			    	</div>
				</div>
				<div class="col s12 m12 l12">
		        	<div class="row">
						<div class="col-md-12 right-align">
							<div class="checkbox pull-right">
								<input type="checkbox"  id="1"> 
							    <label for="1">Показать отписанных</label>
							</div>
						</div>
					</div>
		        	<div class="row">
						<nav class="purple">
                          <div class="nav-wrapper ">
                            <a href="#!" class="brand-logo">
	                            <p style="font-size: 22px;margin-left: 20px;">
	                                <i class="material-icons">local_atm</i><?php echo "Посещаемость и оплата за месяц";?>
	                            </p>
                            </a>
                            <ul class="right hide-on-med-and-down">
                              <li>
                              	<?php 
									echo DatePicker::widget([
										'name' => 'check_issue_date', 
										'value' => date('d-M-Y'),
										'options' => ['placeholder' => 'Select issue date ...',
										'style'=>'
										color:black;border:1px solid gray !important;border-radius: 0.5em;border: solid 1px #cecece;width:120px !important;height:32px !important;
										margin-top:15px!important;text-align:center !important;'],
	                					'type'=> DatePicker::TYPE_INPUT,
										'pluginOptions' => [
											'format' => 'dd-M-yyyy',
											'todayHighlight' => true
										]
								]);?>
                              </li>
                              <li>
	                            <?= Html::a('Добавить ученика', ['/user/create','type'=>2,'id'=>$schedule->id],['role' => 'modal-remote','title' => 'Создать','style'=>"margin-bottom"])?>
                              </li>
                              <li>
                                <?= Html::a('Изменить', ['/schedule-users/update','id'=>$schedule->id],['role' => 'modal-remote','title' => 'Изменить','style'=>"margin-bottom"])?>
                              </li>
                            </ul>
                          </div>
                        </nav>
						<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Телефон</th>
								<th>Стоимость</th>
								<th>Оплата</th>
								<th>Абонемент</th>
								<th>Баланс</th>
								<th> ФИО ученика </th>
								<th>
									Пн<br>
									<b>05</b>
									<ul class="dropdown-menu custom-dropdown-menu" style="display: none;">
										<li><a data-status="1" class="lesson-change-status"> <b style="color: darkgreen; margin-right: 5px;">П </b> Проведено </a></li>
										<li><a data-status="-1" class="lesson-change-status"> <b style="color: darkred; margin-right: 5px;">Н </b> Отменено </a></li>
										<li><a data-status="0" class="lesson-change-status"> <b style="color: black; margin-right: 5px;">О </b> Отменить статус занятия </a>
										</li>
										<li class="divider"></li>
										<li><a class="change_teacher" data-teacher_pk="31113" data-teacher_salary="2000"><i class="fa fa-user"></i>Замена преподавателя</a>
										</li>
										<li><a data-delete_url="/lessons/api/lesson/651287/delete" class="delete-lesson"><i class="fa fa-remove" style="color: darkred"></i>Удалить занятие</a></li>
									</ul>
								</th>
								<th>
									Пн<br>
									<b>12</b>
									<ul class="dropdown-menu custom-dropdown-menu" style="display: none;">
										<li><a data-status="1" class="lesson-change-status"> <b style="color: darkgreen; margin-right: 5px;">П </b> Проведено </a></li>
										<li><a data-status="-1" class="lesson-change-status"> <b style="color: darkred; margin-right: 5px;">Н </b> Отменено </a></li>
										<li><a data-status="0" class="lesson-change-status"> <b style="color: black; margin-right: 5px;">О </b> Отменить статус занятия </a>
										</li>
										<li class="divider"></li>
										<li><a class="change_teacher" data-teacher_pk="31113" data-teacher_salary="2000"><i class="fa fa-user"></i>Замена преподавателя</a>
										</li>
										<li><a data-delete_url="/lessons/api/lesson/651288/delete" class="delete-lesson"><i class="fa fa-remove" style="color: darkred"></i>Удалить занятие</a></li>
									</ul>
								</th>
								<th>
									Пн<br>
									<b>19</b>
									<ul class="dropdown-menu custom-dropdown-menu" style="display: none;">
										<li><a data-status="1" class="lesson-change-status"> <b style="color: darkgreen; margin-right: 5px;">П </b> Проведено </a></li>
										<li><a data-status="-1" class="lesson-change-status"> <b style="color: darkred; margin-right: 5px;">Н </b> Отменено </a></li>
										<li><a data-status="0" class="lesson-change-status"> <b style="color: black; margin-right: 5px;">О </b> Отменить статус занятия </a>
										</li>
										<li class="divider"></li>
										<li><a class="change_teacher" data-teacher_pk="31113" data-teacher_salary="2000"><i class="fa fa-user"></i>Замена преподавателя</a>
										</li>
										<li><a data-delete_url="/lessons/api/lesson/651289/delete" class="delete-lesson"><i class="fa fa-remove" style="color: darkred"></i>Удалить занятие</a></li>
									</ul>
								</th>
								<th>
									Пн<br>
									<b>26</b>
									<ul class="dropdown-menu custom-dropdown-menu" style="display: none;">
										<li><a data-status="1" class="lesson-change-status"> <b style="color: darkgreen; margin-right: 5px;">П </b> Проведено </a></li>
										<li><a data-status="-1" class="lesson-change-status"> <b style="color: darkred; margin-right: 5px;">Н </b> Отменено </a></li>
										<li><a data-status="0" class="lesson-change-status"> <b style="color: black; margin-right: 5px;">О </b> Отменить статус занятия </a>
										</li>
										<li class="divider"></li>
										<li><a class="change_teacher" data-teacher_pk="31113" data-teacher_salary="2000"><i class="fa fa-user"></i>Замена преподавателя</a>
										</li>
										<li><a data-delete_url="/lessons/api/lesson/651290/delete" class="delete-lesson"><i class="fa fa-remove" style="color: darkred"></i>Удалить занятие</a></li>
									</ul>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ScheduleUsers as $value){ ?>
							<tr>
								<td><?php $value->pupil->phone;?></td>
								<td><?php echo $ScheduleUsers->id;?></td>
								<td></td>
								<td></td>
								<td></td>
								<td><?php $value->pupil->fio?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div><br>
<?php Pjax::end() ?>
<?php Modal::begin([
	"id"=>"ajaxCrudModal",
	"footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
