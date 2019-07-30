<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tarifs */
?>
<div class="tarifs-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'days',
            'price',
        ],
    ]) ?>

</div>
