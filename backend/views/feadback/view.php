<?php

use yii\widgets\DetailView;
use backend\models\Feadback;

/* @var $this yii\web\View */
/* @var $model backend\models\Feadback */
?>
<div class="feadback-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email:email',
            'message:ntext',
            [
                'attribute' => 'date_cr',
                'value' => function($data)
                {
                    return Feadback::getDate($data->date_cr);
                }
            ],
        ],
    ]) ?>

</div>
