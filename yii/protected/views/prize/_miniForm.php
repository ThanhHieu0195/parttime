<?php
/**
 * @var $this PrizeController
 *@var $model Prize
 * @var $form CActiveForm
 */

/** @var  $criteria CDbCriteria */
$criteria = new CDbCriteria();
?>
<?php $form = $this->beginWidget('CActiveForm') ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'user') ?>
		<?php echo $form->dropDownList($model, 'user', User::model()->getAllOptionUser() ) ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Giải thưởng', 'Prize_option_prize') ?>
		<?php echo CHtml::textArea('Prize[option][prize]', '', array('required' => 'required')) ?>
	</div>
	<?php echo CHtml::hiddenField('Prize[type]', Prize::TYPE_MINI) ?>
	<div class="row">
		<?php echo CHtml::submitButton('Tạo') ?>
	</div>
<?php $this->endWidget() ?>

