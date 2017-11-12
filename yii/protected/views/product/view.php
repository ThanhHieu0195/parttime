<?php
/** @var  $this ProductController*/
$this->breadcrumbs=array(
	'product' => $this->createUrl(' '),
	$model->title,
);
$this->pageTitle=$model->title;
?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>