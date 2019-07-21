<?php

use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>
<div class="user-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'fio',
            'username',
            [
                'attribute'=>'type',
                'value'=>function($data){
                    return $data->getTypeDescription();
                }
            ],
            [
                'attribute'=>'birthday',
                'value'=>function($data)
                {
                    return User::getDate($data->birthday);
                }
            ],
            'phone',
            'balanc',
            [
            'attribute' => 'image',
            'format'=>'raw', 
            'value' => function ($data) {
            if($data->image == null) $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/no-user.jpg';
            else $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/avatar/' . $data->image;
            return '<img style="width: 55px;height:55px; border-radius: 1em;border: solid 1px #cecece;" src="' . $path . '" >';
            }
             ],
            [
                'attribute'=>'created_at',
                'value'=>function($data)
                {
                    return User::getDate($data->created_at);
                }
            ],
            // [
            //     'attribute'=>'updated_at',
            //     'value'=>function($data)
            //     {
            //         return User::getDate($data->updated_at);
            //     }
            // ],
            // 'auth_key',
            // 'filial_id',
            // 'company_id',
        ],
    ]) ?>

</div>
