<div class="modal-dialog form-guess" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="title-form">Vui lòng nhập thông tin đăng ký</div>
			<?php $form=$this->beginWidget('CActiveForm', array('id' => 'form-modal-register')); ?>
			<div class="form-group">
					<?php echo $form->emailField($model,'email',array('size'=>80,'maxlength'=>120, 'placeholder' => 'Email', 'class' => 'form-control')); ?>
					<?php echo $form->error($model,'email'); ?>
				</div>
				<div class="form-group">
					<?php echo $form->passwordField($model,'password',array('size'=>80,'maxlength'=>120, 'placeholder' => 'Mật khẩu', 'class' => 'form-control')); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>
				<div class="form-group">
					<?php echo CHtml::passwordField('User[repassword]', '', array('size'=>80,'maxlength'=>120, 'placeholder' => 'Nhập lại mật khẩu', 'class' => 'form-control')); ?>
				</div>
				<div class="form-group">
					<input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]">
					<input name="LoginForm[rememberMe]" id="LoginForm_rememberMe" value="1" type="checkbox">
					<label for="LoginForm_rememberMe">Đồng ý với<a herf="#" class="link">điều khoản và chính sách sử dụng</a></label>
					<div class="errorMessage" id="LoginForm_rememberMe_em_" style="display:none"></div>
				</div>
				<div class="form-group submit">
					<input type="submit" name="register" value="Đăng ký">
				</div>
				<div class="form-group or">Hoặc</div>
            <div class="form-group facebook">
                <a href="<?php echo Yii::app()->createUrl('social/login') ?>" class="btn"><i class="fa fa-facebook" aria-hidden="true"></i>Đăng nhập bằng Facebook</a>
            </div>
				<div class="form-group google">
					<a href="#" class="btn"><i class="fa fa-google-plus" aria-hidden="true"></i>Đăng nhập bằng Google</a>
				</div>
				<div class="form-group or">Đã có tài khoản</div>
				<div class="form-group submit">
					<input type="submit" name="yt0" value="Đăng ký">
				</div>
			<?php $this->endWidget(); ?>
		</div>
		<!--<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Send message</button>
		</div>-->
	</div>
</div>