<div class="content-wrapper" style="min-height: 150px;">
    <input type="hidden" id="page_type" value="student">
    <div class="box margin-bottom-0">
        <div class="row panel-body">
            <div class="col-md-2 text-center">
                <div class="form-group ">
                    <img src="/static/null.png" class="profile-user-img img-150 img-responsive img-circle">
                    <div class="panel-body hidden">
                        <input type="file" name="photo">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label class="h2" for="action">qwerty qwer qwerty
                    
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_student_create_edit"><i class="fa fa-pencil"></i></a>

                    </label>
                <h5>Логин:  qwerty_qwer1</h5>
                <h5>Телефон:  +998912343232</h5>
                <h5>Дата рождения: </h5>
                <h5>e-mail:  </h5>
            </div>
                <div class="col-md-6">
                    <form action="/students/api/comment_save/">
                        <input type="hidden" name="csrfmiddlewaretoken" value="JlewBZx9ulwRJrPdBtTUhsBB4OAquwWKGIlWmEDtqwvXeQGezHN9toHnXk74jTrO">
                        <input type="hidden" name="pk" value="31115">
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
            <script>
                $(document).ready(function () {
                    $("#btn_comment_save").on("click", function (e) {
                        e.preventDefault();
                        $form = $(this).closest("form");
                        data = $form.serializeObject();
                        $.ajax({
                            data: data,
                            type: "post",
                            url: $form.attr("action"),
                            success: function (data) {
                                if (data.res === true){
                                    modal_alert("success", data.message)
                                }
                                else {
                                    modal_alert("danger", data.message)
                                }
                            },
                            error: function () {
                                modal_alert("danger", $("#messages").data("server_error"))
                            }
                        })
                    })
                })
            </script>
        </div>
            <div class="row panel-body">
                <div class="col-md-12">
                    <form action="" method="post" class="form-inline">
                        <input type="hidden" name="csrfmiddlewaretoken" value="JlewBZx9ulwRJrPdBtTUhsBB4OAquwWKGIlWmEDtqwvXeQGezHN9toHnXk74jTrO">
                        <label class="h2" for="date"> Посещаемость и оплата за месяц
                            <div class="input-group date datepicker-month_show">
                                <input type="hidden" class="form-control date_change" id="date" name="date" value="17.08.2019">
                                <span class="input-group-addon cursor-pointer">
                                            <i class="fa fa-calendar"></i>
                                        Август 2019
                                    </span>
                                <input type="hidden">
                            </div>
                                <a href="#" class="btn btn-success" id="btn_accept_to_course" data-toggle="modal" data-target="#modal_accept_to_course">Записать на курс</a>
                        </label>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered panel panel-primary">
                            <thead class="panel-heading">
                            <tr>
                                <th>
                                    Название курса
                                </th>
                                <th>
                                    Посещения
                                </th>
                                <th>
                                    Стоимость
                                </th>
                                <th>
                                    Внесенная оплата за месяц
                                </th>
                                <th>
                                    Нужно оплатить за месяц
                                </th>

                                <th>
                                    Баланс
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr class="info">
                                <td colspan="3">
                                    Сумма по всем курсам
                                </td>

                                <td class="summary_month_payment">
                                    0
                                </td>

                                <td class="summary_this_month_should_pay">
                                    156000
                                </td>
                                <td class="danger">
                                    <span class="summary_balance">-156000</span>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        <div class="row panel-body">
            <div class="col-md-12">
                <label class="h2" for="date"> Посещаемость и оплата за месяц Август 2019
                </label>
                    <h3>
                        Курс: sssss
                    </h3>
                    <div class="table-responsive" style="padding-bottom: 150px">
                        <table class="table table-hover table-bordered panel panel-primary">
                            <thead class="panel-heading">
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
                                    </td>
                                    <td class="text-center custom-dropdown-toggle  td_lesson  lesson_651690 " id="lesson_651690" data-change_status_url="/lessons/api/lesson/651690/change_status" data-pk="651690">
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
                            <tbody>
                            <tr class="tr_course_student_32469" data-student_fio="qwerty qwer qwerty" data-cs_pk="32469">
                                
                                    

<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    
    td_presence
    lesson_651692
    presence_lesson_651692" data-presence_pk="390376" data-lesson_pk="651692" data-change_status_url="/presences/api/presence/390376/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    
    
    <span class="presence">?</span>
    
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>

            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>

            
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390376/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
            
        </ul>
    
</td>

                                
                                    

<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    
    td_presence
    lesson_651688
    presence_lesson_651688" data-presence_pk="390372" data-lesson_pk="651688" data-change_status_url="/presences/api/presence/390372/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    
    
    <span class="presence">?</span>
    
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>

            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390372/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presencelesson_651287presence_lesson_651287" data-presence_pk="390216" data-lesson_pk="651287" data-change_status_url="/presences/api/presence/390216/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>
            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390216/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presencelesson_651693presence_lesson_651693" data-presence_pk="390377" data-lesson_pk="651693" data-change_status_url="/presences/api/presence/390377/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>
            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390377/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presence
    lesson_651689
    presence_lesson_651689" data-presence_pk="390373" data-lesson_pk="651689" data-change_status_url="/presences/api/presence/390373/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>
            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390373/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    
    td_presence
    lesson_651288
    presence_lesson_651288" data-presence_pk="390217" data-lesson_pk="651288" data-change_status_url="/presences/api/presence/390217/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    
    
    <span class="presence">?</span>
    
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>

            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>

            
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390217/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
            
        </ul>
    
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    
    td_presence
    lesson_651694
    presence_lesson_651694" data-presence_pk="390378" data-lesson_pk="651694" data-change_status_url="/presences/api/presence/390378/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    
    
    <span class="presence">?</span>
    
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>

            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>

            
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390378/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
            
        </ul>
    
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    
    td_presence
    lesson_651690
    presence_lesson_651690" data-presence_pk="390374" data-lesson_pk="651690" data-change_status_url="/presences/api/presence/390374/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
    
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>

            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390374/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presence
    lesson_651289
    presence_lesson_651289" data-presence_pk="390218" data-lesson_pk="651289" data-change_status_url="/presences/api/presence/390218/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>
            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>            
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390218/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presence
    lesson_651695
    presence_lesson_651695" data-presence_pk="390379" data-lesson_pk="651695" data-change_status_url="/presences/api/presence/390379/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>
            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390379/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presence
    lesson_651691
    presence_lesson_651691" data-presence_pk="390375" data-lesson_pk="651691" data-change_status_url="/presences/api/presence/390375/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>
            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390375/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presence
    lesson_651290
    presence_lesson_651290" data-presence_pk="390219" data-lesson_pk="651290" data-change_status_url="/presences/api/presence/390219/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    <span class="presence">?</span>
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>

            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390219/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
<td class="text-center custom-dropdown-toggle other_td_course_student_32469
    td_presence
    lesson_651696
    presence_lesson_651696" data-presence_pk="390380" data-lesson_pk="651696" data-change_status_url="/presences/api/presence/390380/change_status" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Стоимость посещения: 12000">
    
        <span class="td_payment_info label-primary label-left presence_payment_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-info label-right presence_payment_extra_amount  should_hidden hidden ">0</span>
        <span class="td_payment_info label-warning label-right label_discount  should_hidden hidden ">%</span>
    
    
    <span class="presence">?</span>
    
        <ul class="dropdown-menu custom-dropdown-menu">
            <li><a class="presence-change-status" data-status="1"> <b style="color: darkgreen; margin-right: 5px;">П </b> Присутствовал </a></li>

            <li><a class="presence-change-status" data-status="-1"> <b style="color: darkred; margin-right: 5px;">Н </b> Отсутствовал </a></li>
            
                <li><a class="presence-change-status" data-status="2"><b style="color: purple; margin-right: 5px;">У </b> Отсутствовал по уважительной причине </a>
                </li>
            
            <li><a class="presence-change-status" data-status="0"><b style="color: black; margin-right: 5px;">О</b> Отменить статус присутствия </a>
            </li>
                <li class="divider"></li>
                <li><a class="edit_presence_payment" data-presence_payments_info_url="/presences/api/presence/390380/payments_info"><i class="fa fa-dollar" aria-hidden="true" style="color: darkgreen;"></i>Оплата</a>
                </li>
        </ul>
</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
