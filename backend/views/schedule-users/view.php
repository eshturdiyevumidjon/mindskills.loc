<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ScheduleUsers */
?>
<div class="schedule-users-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'schedule.name',
            'pupil.fio',
            'payed',
            'comment:ntext',
            [
                'attribute' => 'unsubscribe',
                'value' => function($data){
                    return $data->getUnsubscribeDescription();
                }
            ],
        ],
    ]) ?>

</div>
