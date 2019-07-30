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
            'schedule.name',
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
        ],
    ]) ?>
</div>
