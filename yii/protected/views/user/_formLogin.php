<?php
/**
 * @var \CActiveForm $form
 * @var \UserController $this
 * @var \User $model
 */
?>
<div class="form" id="form-login">

	<?php $form=$this->beginWidget('CActiveForm'); ?>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->emailField($model, 'email', array('placeholder' => 'Email')) ?>
		<?php echo $form->error($model, 'email') ?>
	</div>

	<div class="row">
		<?php echo $form->passwordField($model,'password', array('placeholder' => 'mật khẩu')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::link('quên mật khẩu', '#') ?>
		<?php echo CHtml::checkBox('autologin') ?>
	</div>

    <div class="row">
        <?php echo CHtml::tag('a', ['href' => $this->createUrl('create')], 'Đăng ký') ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Đăng Nhập'); ?>
	</div>
	<?php  ?>
	<?php $this->endWidget(); ?>
</div>


<script>

</script>