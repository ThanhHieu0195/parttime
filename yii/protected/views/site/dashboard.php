<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Dashboard',
);
?>
<?php if(!Yii::app()->user->isGuest) $this->widget( 'ProductMenu' ); ?>
<?php if(!Yii::app()->user->isGuest) $this->widget( 'PostMenu' ); ?>
<?php if(!Yii::app()->user->isGuest) $this->widget( 'PrizeMenu' ); ?>
