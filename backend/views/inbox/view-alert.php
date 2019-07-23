<div class="row">
	<div class="col-md-12">
		<h4 class="text-danger"><?=$model->title?></h4>
		<p class="text-info"><?=$model->text?></p>
	</div>
</div>
<?php
$model->status = 2;
$model->save();

?>