<?php
/** @var $this UserController
 * @var $model User
 */

$this->breadcrumbs = array(
	'user',
	$model->username
);
?>
<div class="account">

    <div class="tab-account tab-custom">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Thông tin tài khoản</a></li>
            <li role="presentation"><a href="#vote" aria-controls="vote" role="tab" data-toggle="tab">Danh sách bình chọn</a></li>
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="info">

            <div class="enterInfo">
                <div class="sub-title">Cập nhật thông tin</div>
	            <?php $this->beginWidget('CActiveForm', ['action' => $this->createUrl('profile', array('action' => 'profile', 'class' => 'enterInfo'))]) ?>
                    <label><b>Họ và tên</b></label>
	                <?php echo CHtml::textField('Profile[username]', $model->getChildProfile('username'), array('placeholder' => 'Vui lòng nhập họ và tên')) ?>

                    <label><b>Số điện thoại</b></label>
    	            <?php echo CHtml::textField('Profile[phone]', $model->getChildProfile('phone'), array('placeholder' => 'Vui lòng nhập số điện thoại')) ?>

                    <label><b>Email</b></label>
    	            <?php echo CHtml::textField('Profile[email]', $model->getChildProfile('email'), array('placeholder' => 'Vui lòng nhập email')) ?>

                    <label><b>CMND</b></label>
    	            <?php echo CHtml::textField('Profile[code]', $model->getChildProfile('code'), array('placeholder' => 'Vui lòng nhập cmnd')) ?>

                    <label><b>Địa chỉ</b></label>
    	            <?php echo CHtml::textField('Profile[address]', $model->getChildProfile('address'), array('placeholder' => 'Vui lòng nhập địa chỉ')) ?>
                    <button type="submit">Lưu thay đổi</button>
	            <?php $this->endWidget() ?>
            </div>

            <?php if ($model->haveResetPassword() ):  ?>
            <div class="changePass">
                <div class="sub-title">Thay đổi mật khẩu</div>
	            <?php $this->beginWidget('CActiveForm', ['action' => $this->createUrl('profile', array('action' => 'password'))]) ?>
                    <label><b>Mật khẩu cũ</b></label>
    	            <?php echo CHtml::passwordField('Password[oldpassword]', '', array('placeholder' => 'Vui lòng nhập mật khẩu củ')) ?>

                    <label><b>Mật khẩu mới</b></label>
    	            <?php echo CHtml::passwordField('Password[password]', '', array('placeholder' => 'Vui lòng nhập mật khẩu mới')) ?>

                    <label><b>Nhập lại</b></label>
	                <?php echo CHtml::passwordField('Password[repassword]', '', array('placeholder' => 'Vui lòng nhập lại mật khẩu mới')) ?>
                    <button type="submit">Lưu thay đổi</button>
	            <?php $this->endWidget() ?>
            </div>
            <?php endif; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="vote">

	        <?php
	        $criteria=new CDbCriteria(array(
		        'condition' => 'author='.Yii::app()->user->id,
		        'order'=>'id DESC',
	        ));

	        $dataProvider=new CActiveDataProvider('Vote', array(
		        'pagination'=>array(
			        'pageSize'=>Yii::app()->params['postsPerPage'],
		        ),
		        'criteria'=>$criteria,
	        ));
	        $this->renderPartial('../vote/listvote', ['dataProvider' => $dataProvider]);
	        ?>
        </div>
    </div>
</div>
