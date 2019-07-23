<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rules */
?>
<div class="rules-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'users_create',
            'users_view',
            'users_update',
            'users_delete',
            'inbox_create',
            'inbox_view',
            'inbox_update',
            'inbox_delete',
        ],
    ]) ?>

</div>
