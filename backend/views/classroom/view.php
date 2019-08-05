<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Classroom */
?>
<div class="classroom-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'company.name',
            'filial.filial_name',
        ],
    ]) ?>
</div>
