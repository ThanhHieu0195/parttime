<?php
/**
 * @var \CActiveForm $form
 * @var \UserController $this
 * @var \User $model
 */
?>
<div class="form" id="form-user">

<?php $form=$this->beginWidget('CActiveForm'); ?>
    <div class="row">
		<?php echo $form->emailField($model,'email',array('size'=>80,'maxlength'=>120, 'placeholder' => 'Email')); ?>
		<?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
		<?php echo $form->passwordField($model,'password',array('size'=>80,'maxlength'=>120, 'placeholder' => 'Mật khẩu')); ?>
		<?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
		<?php echo CHtml::passwordField('User[repassword]', '', array('size'=>80,'maxlength'=>120, 'placeholder' => 'Nhập lại mật khẩu')); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    <?php  ?>
<?php $this->endWidget(); ?>
</div>
