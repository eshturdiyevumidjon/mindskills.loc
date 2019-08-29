<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use backend\models\Schedule;
use common\models\User;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

$this->title = 'Курсы';
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);
?><br>
<?php
if (!file_exists('uploads/avatar/'.$user->image) || $user->image == '') {
    $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/null.png';
} else {
    $path = 'http://' . $_SERVER['SERVER_NAME'].'/uploads/avatar/'.$user->image;
}
?>
<?php Pjax::begin(['enablePushState' => false, 'id' => 'crud-datatable-pjax']) ?>
    <div class="card light-white">
        <div class="card-content black-text">
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="col-md-4 text-center">
                        <div class="form-group ">
                            <img src="<?= $path;?>" class="profile-user-img img-150 img-responsive img-circle">
                            <div class="panel-body hidden">
                                <input type="file" name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label class="h3" for="action" class="purple"><?= $user->fio?>
                            <?= Html::a('<i class="material-icons">mode_edit</i>', ['/user/update','id'=>$user->id],['role' => 'modal-remote','title' => 'Редактировать курс','class'=>"purple  btn"])?>
                        </label>
                        <h6>Телефон: <?= $user->phone?></h6>
                        <h6>Дата рождения: <?= User::getDate($user->birthday);?></h6>
                        <h6>E-mail: <?= $user->username?></h6><br>
                    </div>
                </div>
                <div class="col s12 m12 l6">
                    <div class="col-md-12">
                        <form action="/teachers/api/comment_save/">
                            <input type="hidden" name="csrfmiddlewaretoken" value="72NsjAOPvtHcA58fPjMhFPTgRMq2IirT4pUS4fU9rEGi5uZgNxGwRLZ2KiXGxFWX">
                            <input type="hidden" name="pk" value="31113">
                            <div class="form-group">
                                <label for="textArea" class="control-label h3">Дополнительные сведения
                                    <a href="#" class="btn btn-success btn-flat" id="btn_comment_save"><i class="fa fa-save"></i></a>
                                </label>
                            <div>
                                <textarea class="form-control" rows="5" id="textArea" name="comment"></textarea>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="col-md-12">
                        <nav class="purple">
                          <div class="nav-wrapper ">
                            <a href="#!" class="brand-logo">
                                <p style="font-size: 22px;margin-left: 20px;">
                                    <i class="material-icons">local_atm</i><?php echo "Посещаемость и оплата за месяц";?>
                                </p>
                            </a>
                            <ul class="right hide-on-med-and-down" style="margin-right: 10px;">
                             <li>
                                <?php echo DatePicker::widget([
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
                            </ul>
                          </div>
                        </nav>
                        <table class="table table-hover table-bordered panel panel-primary">
                            <thead>
                                <tr>
                                    <th>Название курса</th>
                                    <th>Расписание</th>
                                    <th>Занятия</th>
                                    <th>Плата за занятие</th>
                                    <th>Зарплата</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="custom-dropdown-toggle6">
                                        <a href="/courses/course/7623"> sssss </a>
                                        <br>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        Планируемые: 0
                                        <br>
                                        Проведенные: 0
                                        <br>
                                        Отмененные занятия: 0
                                    </td>
                                    <td>
                                        0 + 0% за пришедшего ученика
                                    </td>
                                    <td>
                                        Планируемая: 0
                                        <br>
                                        Актуальная: 0
                                    </td>
                                </tr>
                                <tr class="timesheet_ custom-dropdown-toggle6">
                                    <td class="custom-dropdown-toggle6">
                                        <a href="/courses/course/7584"> dasturlashni organish </a>
                                        <br>
                                    </td>
                                    <td>
                                        Чт (ед) (10:00-11:00)<br>Пн (10:00-11:00)<b <="" td="">
                                    </b></td><td>
                                        Планируемые: 5
                                        <br>
                                        Проведенные: 1
                                        <br>
                                        Отмененные занятия: 0
                                    </td>
                                    <td>
                                        5000 + 10% за пришедшего ученика
                                    </td>
                                    <td>
                                        Планируемая: 26000
                                        <br>
                                        Актуальная: 6000
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr class="info">
                                <td colspan="2">
                                    Сумма по всем курсам:  4  курсов
                                </td>
                                <td>
                                    Планируемые: 28
                                    <br>
                                    Проведенные: 5
                                    <br>
                                    Отмененные занятия: 0
                                </td>
                                <td>
                                </td>
                                <td>
                                    Планируемая: 104400
                                    <br>
                                    Актуальная: 25400
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="col-md-12">
                        <nav class="purple">
                          <div class="nav-wrapper ">
                            <a href="#!" class="brand-logo">
                                <p style="font-size: 22px;margin-left: 20px;">
                                    <?= Html::a('Курс: sssss', ['/courses/course/7587','id'=>$course->id],['role' => 'modal-remote','title' => 'Создать','style'=>"margin-bottom"])?>
                                </p>
                            </a>
                          </div>
                        </nav>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651692 " id="lesson_651692" data-change_status_url="/lessons/api/lesson/651692/change_status" data-pk="651692">
                                    Пт<br>
                                    <b>02</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651688 " id="lesson_651688" data-change_status_url="/lessons/api/lesson/651688/change_status" data-pk="651688">
                                    Вс<br>
                                    <b>04</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651287 " id="lesson_651287" data-change_status_url="/lessons/api/lesson/651287/change_status" data-pk="651287">
                                    Пн<br>
                                    <b>05</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651693 " id="lesson_651693" data-change_status_url="/lessons/api/lesson/651693/change_status" data-pk="651693">
                                    Пт<br>
                                    <b>09</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651689 " id="lesson_651689" data-change_status_url="/lessons/api/lesson/651689/change_status" data-pk="651689">
                                    Вс<br>
                                    <b>11</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651288 bg-green" id="lesson_651288" data-change_status_url="/lessons/api/lesson/651288/change_status" data-pk="651288">
                                    Пн<br>
                                    <b>12</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651694 " id="lesson_651694" data-change_status_url="/lessons/api/lesson/651694/change_status" data-pk="651694">
                                    Пт<br>
                                    <b>16</b>
                                </td>                            <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651690 " id="lesson_651690" data-change_status_url="/lessons/api/lesson/651690/change_status" data-pk="651690">
                                    Вс<br>
                                    <b>18</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651289 " id="lesson_651289" data-change_status_url="/lessons/api/lesson/651289/change_status" data-pk="651289">
                                    Пн<br>
                                    <b>19</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651695 " id="lesson_651695" data-change_status_url="/lessons/api/lesson/651695/change_status" data-pk="651695">
                                    Пт<br>
                                    <b>23</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651691 " id="lesson_651691" data-change_status_url="/lessons/api/lesson/651691/change_status" data-pk="651691">
                                    Вс<br>
                                    <b>25</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651290 " id="lesson_651290" data-change_status_url="/lessons/api/lesson/651290/change_status" data-pk="651290">
                                    Пн<br>
                                    <b>26</b>
                                </td>
                                <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651696 " id="lesson_651696" data-change_status_url="/lessons/api/lesson/651696/change_status" data-pk="651696">
                                    Пт<br>
                                    <b>30</b>
                                </td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php Pjax::end() ?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
                        