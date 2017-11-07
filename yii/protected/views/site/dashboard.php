<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Dashboard',
);
?>
<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
