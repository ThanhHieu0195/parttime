<?php
/** @var  $this ProductController*/
$this->breadcrumbs=array(
	'product' => $this->createUrl(' '),
	$model->title,
);
$this->pageTitle=$model->title;
$this->renderPartial('_detail', array(
	'data' => $model
));
?>
