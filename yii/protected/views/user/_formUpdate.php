<?php
/** @var $this UserController
 * @var $model User
 */
?>
<div class="form" id="form-user-update">
	<?php $this->beginWidget('CActiveForm', ['action' => $this->createUrl('update', array('action' => 'profile'))]) ?>
	<div class="row">
		<?php echo CHtml::label('Họ và tên', 'Profile[username]') ?>
		<?php echo CHtml::textField('Profile[username]', $model->getChildProfile('username'), array('placeholder' => 'Vui lòng nhập họ và tên')) ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Số điện thoại', 'Profile[phone]') ?>
		<?php echo CHtml::textField('Profile[phone]', $model->getChildProfile('phone'), array('placeholder' => 'Vui lòng nhập số điện thoại')) ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Email', 'Profile[email]') ?>
		<?php echo CHtml::textField('Profile[email]', $model->getChildProfile('email'), array('placeholder' => 'Vui lòng nhập email')) ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('CMND', 'Profile[code]') ?>
		<?php echo CHtml::textField('Profile[code]', $model->getChildProfile('code'), array('placeholder' => 'Vui lòng nhập cmnd')) ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Địa chỉ', 'Profile[address]') ?>
		<?php echo CHtml::textField('Profile[address]', $model->getChildProfile('address'), array('placeholder' => 'Vui lòng nhập địa chỉ')) ?>
	</div>
	<?php echo CHtml::submitButton('Lưu thay đổi') ?>
	<?php $this->endWidget() ?>

	<?php $this->beginWidget('CActiveForm', ['action' => $this->createUrl('update', array('action' => 'password'))]) ?>
	<span><?php echo $msgPassword ?></span>
	<div class="row">
		<?php echo CHtml::label('Mật khẩu củ', 'Password[oldpassword]') ?>
		<?php echo CHtml::passwordField('Password[oldpassword]', '', array('placeholder' => 'Vui lòng nhập mật khẩu củ')) ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Mật khẩu mới', 'Password[password]') ?>
		<?php echo CHtml::passwordField('Password[password]', '', array('placeholder' => 'Vui lòng nhập mật khẩu mới')) ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Mật khẩu mới', 'Profile[repassword]') ?>
		<?php echo CHtml::passwordField('Password[repassword]', '', array('placeholder' => 'Vui lòng nhập lại mật khẩu mới')) ?>
	</div>
	<?php echo CHtml::submitButton('Lưu thay đổi') ?>
	<?php $this->endWidget() ?>

</div>