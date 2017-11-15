<div class="block-content" style="text-align: center">
	<?php if(Yii::app()->user->isGuest): ?>
		<?php echo CHtml::button($this->facebookButtonTitle, array('id' => $this->fbLoginButtonId)) ?>
	<?php endif; ?>
</div>