<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'order_id',
        'content' => function($data){
            $url = Url::to(['/orders/view', 'id' => $data->order_id]);
            return Html::a('<button type="button" class="btn btn-info btn-xs">№ '.$data->order_id.'</button>', $url, [ 'data-pjax'=>'0','title'=>'Просмотр заказа', 'data-toggle'=>'tooltip',]);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'content' => function($data){
            return $data->getStatusDescription();
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'datetime',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'template' => '{leadUpdate} {leadDelete}',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'buttons'  => [
            'leadUpdate' => function ($url, $data) {
                $url = Url::to(['/inbox/view-alert', 'id' => $data->id]);
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [ 'role'=>'modal-remote','title'=>'Просмотр', 'data-toggle'=>'tooltip',]);
            },
            'leadDelete' => function ($url, $data) {
                $url = Url::to(['/inbox/delete-alert', 'id' => $data->id]);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                    'role'=>'modal-remote','title'=>'Удалить', 
                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                    'data-request-method'=>'post',
                    'data-toggle'=>'tooltip',
                    'data-confirm-title'=>'Подтвердите действие',
                    'data-confirm-message'=>'Вы уверены что хотите удалить этого элемента?',
                ]);
            },
        ]
    ],

];   