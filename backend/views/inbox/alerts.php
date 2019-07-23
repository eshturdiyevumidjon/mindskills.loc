<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

$this->title = 'Список уведомлений';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="goods-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'rowOptions' => function ($model){
                if($model->status == 1){
                  return ['style'=>'background:#A0ECA6'];
                }
                else if($model->status == 2) {
                  return ['style'=>'background:#B2E1FF'];
                }
            },
            'pjax'=>true,
            'columns' => require(__DIR__.'/_alerts_column.php'),
            'toolbar'=> [
                ['content'=>
                    '<div style="margin-top:10px;">' .
                            '<ul class="panel-controls">
                                <li>{export}</li>
                            </ul>'.
                    '</div>'
                ],
            ],          
            'striped' => false,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Список уведомлений',
                'before'=>'',
                'after'=>'',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    "options" => [
        "tabindex" => false,
    ],
])?>
<?php Modal::end(); ?>
