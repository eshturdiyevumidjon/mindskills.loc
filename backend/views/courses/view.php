<?php

use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Courses */
?>
<div class="courses-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'subject_id',
                'value' => function($data){
                    return $data->subject->name;
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => function($data){
                    return $data->user->fio;
                }
            ],
            [   
                'attribute' => 'begin_date',
                'value' => function($data){
                    return User::getDate($data->begin_date);
                }
            ],
            [   
                'attribute' => 'end_date',
                'value' => function($data){
                    return User::getDate($data->end_date);
                }
            ],
            'cost',
            'prosent_for_teacher',
        ],
    ]) ?>
</div>
