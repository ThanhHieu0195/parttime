<?php
$this->breadcrumbs=array(
	'Login User',
);
?>
<div class="modal-dialog form-guess" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Đặng Nhập</h5>
        </div>
        <div class="modal-body">
            <div class="title-form">Vui lòng nhập thông tin Đặng Nhập</div>
			<?php $form=$this->beginWidget('CActiveForm'); ?>
            <div class="form-group">
				<?php echo $form->emailField($model, 'email', array('placeholder' => 'Email', 'class' => 'form-control')) ?>
				<?php echo $form->error($model, 'email') ?>
            </div>
            <div class="form-group">
				<?php echo $form->passwordField($model,'password', array('placeholder' => 'mật khẩu', 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'password'); ?>
            </div>
            <div class="form-group">
				<?php echo CHtml::link('quên mật khẩu', '#') ?>
				<?php echo CHtml::checkBox('autologin') ?>
            </div>
            <div class="form-group submit">
                <input type="submit" name="login" value="Đăng Nhập">
            </div>
            <div class="form-group or">Hoặc</div>
            <div class="form-group facebook">
                <a href="#" class="btn"><i class="fa fa-facebook" aria-hidden="true"></i>Đăng nhập bằng Facebook</a>
            </div>
            <div class="form-group google">
                <a href="#" class="btn"><i class="fa fa-google-plus" aria-hidden="true"></i>Đăng nhập bằng
                    Google</a>
            </div>
			<?php $this->endWidget() ?>
        </div>
    </div>
</div>

