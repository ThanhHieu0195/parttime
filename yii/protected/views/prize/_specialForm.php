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

<div class="row" id="field-type">
	<?php echo CHtml::label('Loại', 'type'); ?>
	<?php
	$types = Category::model()->getOptionByParent();
	$typleselected = key($types);
	if (isset($types) && !empty($types)) {
		echo CHtml::dropDownList('type', $typleselected, $types);
	}
	?>
</div>

<div class="row" id="field-cat">
	<?php echo CHtml::label('Hạng mục', 'category') ?>
	<?php
	$categories = Category::model()->getOptionByParent($typleselected);
	if (isset($categories) && !empty($categories)) {
		echo CHtml::dropDownList('category', '', $categories);
	}
	?>
</div>

<?php echo CHtml::hiddenField('Prize[type]', Prize::TYPE_SPECIAL) ?>
<div class="row">
	<?php echo CHtml::submitButton('Tạo') ?>
</div>
<?php $this->endWidget() ?>
<?php
Yii::app()->clientScript->registerScript("get-option", "
    $('#form-product-create #field-type select').on('change', function (object) {
        var id = $(this).val();
        var data = {action:'get_option', id:id};
        $.post('".Yii::app()->createUrl('product/ajax')."', data, function (res) {
            $('#field-cat select').replaceWith(res);
        })
    });
");
?>
