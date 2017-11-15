<?php
/**
 * @var \CActiveForm $form
 * @var \UserController $this
 * @var \User $model
 */
?>
<div class="modal-dialog form-guess" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lấy lại mật khẩu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
			<?php $form=$this->beginWidget('CActiveForm', array('id' => 'form-modal-reset')); ?>
            <div class="form-group">
	            <?php echo $form->emailField($model, 'email', ['placeholder' => 'Email đã đăng ký']) ?>
            </div>
            <div class="form-group submit">
                <input type="submit" name="login" value="Lấy Lại Mật Khẩu">
            </div>
            <?php $this->endWidget() ?>
        </div>
    </div>
</div>

