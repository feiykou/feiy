<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dept_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dept_id), array('view', 'id'=>$data->dept_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organ_id')); ?>:</b>
	<?php echo CHtml::encode($data->organ_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />


</div>