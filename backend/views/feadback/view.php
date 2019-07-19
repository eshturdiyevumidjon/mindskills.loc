<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Feadback */
?>
<div class="feadback-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'message:ntext',
            [
                'attribute'=>'date_cr',
                'value'=>function($data)
                {
                    return Schedule::getDate($data->date_cr);
                }
            ],
        ],
    ]) ?>

</div>
