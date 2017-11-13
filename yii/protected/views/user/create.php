<?php
$this->breadcrumbs=array(
    'User',
	'Create User',
);
?>
<h1>Create User</h1>

<?php echo $this->renderPartial('_formCreate', array('model' => $model)); ?>