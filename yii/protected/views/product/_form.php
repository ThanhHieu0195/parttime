<?php
/**
 * @var \CActiveForm $form
 * @var \PostController $this
 */
?>
<div class="form" id="form-product">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo CHtml::activeTextArea($model,'content',array('rows'=>10, 'cols'=>70)); ?>
		<p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>
		<?php echo $form->error($model,'content'); ?>
	</div>

    <div class="row" id="field-type">
		<?php echo CHtml::label('Type', 'type'); ?>
        <?php
        $types = Category::model()->getOptionByParent();
        if (isset($types) && !empty($types)) {
            echo CHtml::dropDownList('type', '', $types);
        }
        ?>
    </div>

    <div class="row" id="field-cat">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php
        $key = key($types);
		$categories = Category::model()->getOptionByParent($key);
		if (isset($categories) && !empty($categories)) {
			echo $form->dropDownList($model, 'category', $categories);
		}
		?>
		<?php echo $form->error($model,'category'); ?>
    </div>

    <div class="row" id="field-config">
		<?php echo $form->labelEx($model,'Configs'); ?>
        <table>
            <tr><th>Key</th><th>Value</th></tr>
            <?php $this->renderPartial('config-field/row') ?>
        </table>
        <?php echo CHtml::button('Add Row', array('id' => 'add-field-config')) ?>
		<?php echo $form->error($model,'config'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'thumnail'); ?>
		<?php echo CHtml::fileField('uploadfile'); ?>
		<?php echo $form->hiddenField($model, 'thumnail', $categories); ?>
		<?php echo $form->error($model,'thumnail'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    <?php  ?>
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
Yii::app()->clientScript->registerScript("get-option", "
    $('#form-product #field-type select').on('change', function (object) {
        var id = $(this).val();
        var data = {action:'get_option', id:id};
        $.post('ajax', data, function (res) {
            $('#field-cat select').replaceWith(res);
        })
    });
    $('#add-field-config').on('click', function(){
        var row = $('#field-config table tr:last-child').clone();
        row.find('input').val('');
        $('#field-config table').append(row); 
    });
    $('#uploadfile').on('change', function(){
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            imgURL = reader.result;
            console.log(imgURL);
            $('#Product_thumnail').val(imgURL);
        }
    });    
");
?>