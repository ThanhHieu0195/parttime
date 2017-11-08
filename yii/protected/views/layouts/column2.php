<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
	<div class="span-24">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-6 last">
		<div id="sidebar">
			<?php if(!Yii::app()->user->isGuest) $this->widget( 'ProductMenu' ); ?>
			<?php if(!Yii::app()->user->isGuest) $this->widget( 'PostMenu' ); ?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>