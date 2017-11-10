<?php
/**
 * @var \CActiveForm $form
 * @var \UserController $this
 * @var \User $model
 */
?>
<div class="form" id="form-user">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>80,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>80,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->emailField($model,'email',array('size'=>80,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'email'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    <?php  ?>
<?php $this->endWidget(); ?>
</div>
