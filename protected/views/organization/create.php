<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'Manage Organization', 'url'=>array('admin')),
);
?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
		</div>
		<div class="span9">
		<h1>Create Organization</h1>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>

