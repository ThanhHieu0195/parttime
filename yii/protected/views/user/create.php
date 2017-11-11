<?php
$this->breadcrumbs=array(
	'Create User',
);
$this->layout = 'column2';
?>
<h1>Create User</h1>

<?php echo $this->renderPartial('_formCreate', array('model' => $model)); ?>