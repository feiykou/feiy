<?php
//print_r($model->getOrgList());

$this->widget('system.web.widgets.CTreeView',array(
		'data' =>$model->getOrgList()
	)
);
?>