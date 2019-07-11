<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Filials */
?>
<div class="filials-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'filial_name',
            [
            'attribute' => 'logo',
            'format'=>'raw', 
            'value' => function ($data) {
            if($data->logo != null) 
                {
            $path = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/filial_logos/' . $data->logo;
            return '<img style="width: 55px;height:55px; border-radius: 1em;border: solid 1px #cecece;" src="' . $path . '" >';
                }
            else 
                return "";
            }
             ],
            [
                'attribute'=>'name',
                'label'=>'Имя директора',
                'value'=>function($data){
                    return $data->getAdmin();
                }
            ],
            'phone',
            [
                'attribute'=>'region_id',
                'value'=>function($data){
                    return $data->region->name;
                }
            ],
            [
                'attribute'=>'district_id',
                'value'=>function($data){
                    return $data->district->name;
                }
            ],
            'address:ntext',
            'site',
            'email:email',
            [
                'attribute'=>'company_id',
                'value'=>function($data){
                    return $data->company->name;
                }
            ]
        ],
    ]) ?>

</div>
