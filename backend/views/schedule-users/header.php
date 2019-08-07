<?php
use yii\helpers\Html;
?>
<nav class=" purple">
	<div class="nav-wrapper ">
		<a href="#!" class="brand-logo">
			<p style="font-size: 22px;margin-left: 20px;">
				<i class="material-icons">view_list</i>
				<?=Html::encode($this->title)?>
			</p>
		</a>
		<ul class="right hide-on-med-and-down">
			<li>
				<?=Html::a('Сортировка', ['columns'],['role' => 'modal-remote','title' => 'Сортировка с колонок'])?>
			</li>
			<li>
				<?= Html::a('<i class="material-icons">add</i>', ['create'],['title' => 'Создать','role' => 'modal-remote'])?>
			</li>
			<li>
				<?=Html::a('<i class="material-icons">refresh</i>',[''],
			        ['title' => 'Обновить'])?>
			</li>
			<li>
				<input type="search" name="search" style="display: none;" id="searchscheduleusers">
			</li>
			<li>
				<a href="#" id="showSearchscheduleusers" title='Поиск'>
					<i class="material-icons">search</i>
				</a>
			</li>
		</ul>
	</div>
</nav>