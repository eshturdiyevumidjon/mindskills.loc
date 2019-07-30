<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Companies */
?>
<div class="companies-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         'name',
         'tarifs.name'
        ],
    ]) ?>

</div>
