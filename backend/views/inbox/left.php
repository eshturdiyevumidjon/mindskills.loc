<?php

use yii\helpers\Html;

$class = "list-group-item";
$class1 = "list-group-item";
$class2 = "list-group-item";
$class3 = "list-group-item";

if($turn == 1) $class .= " active";
if($turn == 2) $class1 .= " active";
if($turn == 3) $class2 .= " active";
if($turn == 4) $class3 .= " active";
?>

<div class="block">
    <div class="list-group border-bottom">
    	<?= Html::a('<span class="fa fa-inbox"></span> Входящие <span class="badge badge-success">'.$inbox.'</span>', ['/inbox/index'],
            ['data-pjax'=>'0','title'=> 'Входящие', 'class'=>"{$class}"]) ?>
        <?= Html::a('<span class="fa fa-star"></span> Избранные <span class="badge badge-warning"></span>', ['/inbox/favorites'],
            ['data-pjax'=>'0','title'=> 'Избранные', 'class'=>"{$class1}"]) ?>
        <?= Html::a('<span class="fa fa-rocket"></span> Отправленные <span class="badge badge-danger"></span>', ['/inbox/sends'],
            ['data-pjax'=>'0','title'=> 'Отправленные', 'class'=>"{$class2}"]) ?>
        <?= Html::a('<span class="fa fa-trash-o"></span> Удаленные <span class="badge badge-default"></span>', ['/inbox/deleting'],
            ['data-pjax'=>'0','title'=> 'Удаленные', 'class'=>"{$class3}"]) ?>
    </div>
</div>