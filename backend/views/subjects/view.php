<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */
?>
<div class="subjects-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'company_id',
            //'filial_id',
            'name',
        ],
    ]) ?>

</div>
