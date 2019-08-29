<?php

use yii\widgets\DetailView;
use backend\models\ScheduleGraph;
/* @var $this yii\web\View */
/* @var $model backend\models\ScheduleGraph */
?>
<div class="schedule-graph-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'schedule.courses.name',
            'classroom.name',
            [
                'attribute' => 'begin_date',
                'value' => function($data)
                {
                    return ScheduleGraph::getDate($data->begin_date);
                }
            ],
            [
                'attribute' => 'end_date',
                'value' => function($data)
                {
                    return ScheduleGraph::getDate($data->end_date);
                }
            ],
            [
                'attribute' => 'class_date',
                'value' => function($data)
                {
                    return ScheduleGraph::getDate($data->class_date);
                }
            ],
            [
                'attribute' => 'type',
                'value' => function($data){
                    return $data->getTypeDescription();
                }
            ],
            'week',
            'class_start',
            'class_duration',
            'period',
        ],
    ]) ?>
</div>
