<div class="modal-dialog form-guess" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Đặng Nhập</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="title-form">Vui lòng nhập thông tin Đặng Nhập</div>
	        <?php $form=$this->beginWidget('CActiveForm', array('id' => 'form-modal-login')); ?>
                <div class="form-group">
	                <?php echo $form->emailField($model, 'email', array('placeholder' => 'Email', 'class' => 'form-control')) ?>
	                <?php echo $form->error($model, 'email') ?>
                </div>
                <div class="form-group">
	                <?php echo $form->passwordField($model,'password', array('placeholder' => 'mật khẩu', 'class' => 'form-control')); ?>
	                <?php echo $form->error($model,'password'); ?>
                </div>
                <div class="form-group">
	                <?php echo CHtml::link('quên mật khẩu', '#', array(
	                        'class' => 'btn-modal',
                            'data-action' => 'resetmail',
                            'data-ajax' => Yii::app()->createUrl('user/ajax')
                    )) ?>
	                <?php echo CHtml::checkBox('autologin') ?>
                </div>
                <div class="form-group submit">
                    <input type="submit" name="login" value="Đăng Nhập">
                </div>
                <div class="form-group or">Hoặc</div>
                <div class="form-group facebook">
                    <a href="<?php echo Yii::app()->createUrl('social/login?auto_scroll=content') ?>" class="btn"><i class="fa fa-facebook" aria-hidden="true"></i>Đăng nhập bằng Facebook</a>
                </div>
                <div class="form-group google">
                    <a href="#" class="btn"><i class="fa fa-google-plus" aria-hidden="true"></i>Đăng nhập bằng
                        Google</a>
                </div>
            <button type="button" class="btn btn-primary btn-modal" data-action="register" data-ajax="<?php echo $this->createUrl('ajax') ?>" >Đăng ký</button>
            <?php $this->endWidget() ?>
        </div>
        <!--<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Send message</button>
		</div>-->
    </div>
</div>

