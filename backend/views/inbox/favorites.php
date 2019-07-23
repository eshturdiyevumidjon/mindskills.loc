<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

$this->title = 'Почтовый ящик';
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);
?>
<?php Pjax::begin(['enablePushState' => false, 'id' => 'inbox-pjax']) ?>
<div class="content-frame">                                    
    <div class="content-frame-top">                        
        <div class="page-title">                    
            <h2><span class="fa fa-inbox"></span> Почтовый ящик <small>(<?=$inbox?> не прочитан)</small></h2>
        </div>                   
    </div>
    <div class="content-frame-left" style="height: 581px;">
        <div class="block">
            <?= Html::a('<span class="fa fa-edit"></span> Написать', ['/inbox/create'],
            ['data-pjax'=>'0','title'=> 'Написать', 'class'=>'btn btn-danger btn-block btn-lg']) ?>
        </div>
        <?= $this->render('left', [
            'starred' => $starred,
            'inbox' => $inbox,
            'send' => $send,
            'deleted' => $deleted,
            'turn' => 2,
        ]) ?>
    </div>
    <div class="content-frame-body" style="height: 641px;">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <div class="pull-right" style="width: 150px;">
                    <div class="input-group">
                        
                        <?= kartik\date\DatePicker::widget([
                            'name' => 'date_cr',
                            'value' => $date_cr,
                            'options' => ['id' => 'date_cr', 'placeholder' => 'Выберите'],
                            'size' => kartik\select2\Select2::SMALL,
                            'layout' => '{picker}{input}',
                            'pluginEvents' => [
                                "changeDate" => "function(e) { window.location.href = '/inbox/favorites?date_cr='+$('#date_cr').val();   }",
                            ],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                            ]
                        ]);?>
                    </div>
                </div>
            </div>
            <div class="panel-body mail">
                <?php
                    foreach ($dataProvider->getModels() as $model) 
                    {   
                   
                        if($model->starred == 1) $starred = 'starred';
                        else $starred = '';

                        if($model->is_read == 1) { $unread = ''; $mail = 'mail-info'; }
                        else { $unread = 'mail-unread'; $mail = 'mail-danger'; }

                        if($model->file !== null) $file = '<a data-pjax="0" href="'.Url::toRoute(['/inbox/download-file',"id" => $model->id]).'"' . '><div class="mail-attachments"><span class="fa fa-paperclip"></span> ' . $model->format_size(filesize('uploads/inbox/'.$model->file)) .'</div></a>';
                        else $file = '';
                ?>
                    <div class="mail-item <?=$unread?> <?=$mail?>">
                        <div class="mail-star <?=$starred?>">
                            <span onclick="$.get('/inbox/set-star', {'id':<?=$model->id?>}, function(data){$.pjax.reload({container:'#inbox-pjax', async: false});} );" class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user" style="font-weight: 700;"><?=$model->to0->fio?></div>

                         <a class="mail-text" title="Просмотр" role="modal-remote" href="<?=Url::toRoute(['/inbox/view',"id" => $model->id])?>"><?=$model->title . ($model->is_read == 0 ? ' <i style="color:red;">(new)</i>' : '')?></a> 

                        <div class="mail-date">
                            <?= date( 'H:i d.m.Y', strtotime($model->date_cr) ) ?>
                            <?=Html::a('<i class="glyphicon glyphicon-trash"></i>',
                                        ["/inbox/check-delete", 'id' => $model->id,] ,
                                        [
                                            "class"=>"text-danger",
                                            'role'=>'modal-remote',
                                            'data-confirm'=>false, 'data-method'=>false,
                                            'data-request-method'=>'post',
                                            'data-confirm-title'=>'Подтвердите действие',
                                            'data-confirm-message'=>'Вы уверены что хотите удалить этого элемента?'
                                        ])?>
                        </div>
                        <?=$file?>
                    </div>
                    <?php
                    }
                    ?>
            </div>
            <div class="panel-footer">
                <span class="pull-right">
                    <?=LinkPager::widget(['pagination'=>$dataProvider->pagination,])?>                    
                </span>
            </div>                            
        </div>
    </div>
</div>
<?php Pjax::end() ?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
