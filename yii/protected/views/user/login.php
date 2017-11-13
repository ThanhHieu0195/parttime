<?php
$this->breadcrumbs=array(
	'Login User',
);
?>
<h1>Login User</h1>

<?php echo $this->renderPartial('_formLogin', array('model' => $model)); ?>