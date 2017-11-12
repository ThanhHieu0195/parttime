<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="form form-login">
    <div class="form-toggle"></div>
    <div class="form-panel one">
        <h1>Login</h1>
        <p>Please fill out the following form with your login credentials:</p>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableAjaxValidation'=>true,
        )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <div class="row">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
            <p class="hint">
                Hint: You may login with <tt>demo/demo</tt>.
            </p>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton('Login'); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
   <div class="form-panel two">
        <!--<div class="form-header">
            <h1>Register Account</h1>
        </div>
        <div class="form-content">
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required="required">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required="required">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="cpassword" required="required">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required="required">
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>-->
    </div>
</div><!-- form -->
