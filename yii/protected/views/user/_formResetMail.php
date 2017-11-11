<?php
/**
 * @var \CActiveForm $form
 * @var \UserController $this
 * @var \User $model
 */
?>
<div class="form" id="form-reset-mail">
<?php $form=$this->beginWidget('CActiveForm'); ?>
    <div class="row">
        <?php echo $form->emailField($model, 'email', ['placeholder' => 'Email']) ?>
    </div>
    <div class="row buttons">
		<?php echo CHtml::submitButton('Lấy lại mật khẩu'); ?>
    </div>
<?php $this->endWidget(); ?>
</div>
