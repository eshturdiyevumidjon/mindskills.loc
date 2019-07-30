<?php

use yii\widgets\DetailView;
use backend\models\Schedule;
/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
?>
<div class="schedule-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'company.name',
            'filial.filial_name',
            'subject.name',
            'teacher.fio',
            'price',
            'sum_of_teacher',
            [
                'attribute' => 'begin_date',
                'value' => function($data)
                {
                    return Schedule::getDate($data->begin_date);
                }
            ],
            [
                'attribute' => 'end_date',
                'value' => function($data)
                {
                    return Schedule::getDate($data->end_date);
                }
            ],
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->getStatusDescription();
                }
            ],
            [
                'attribute' => 'type',
                'value' => function($data){
                    return $data->getTypeDescription();
                }
            ],
        ],
    ]) ?>
</div>
