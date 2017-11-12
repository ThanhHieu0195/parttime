<?php
/**
 * @var $product Product
 * @var $model Vote
 * @var $this VoteController
 * @var $form CActiveForm

 */
$ajaxUrl = $this->createUrl('ajaxform');
?>
<div class="form" id="form-vote">
	<?php $form=$this->beginWidget('CActiveForm'); ?>
	<?php echo CHtml::hiddenField('product_id', $product->id) ?>
	<div class="row">
		<p>Cám ơn bạn đã chọn sản phẩm <?php echo $product->title ?></p>
		<?php echo CHtml::image($product->getUrlThumnail(Helper::getThumnailDefault()), $product->title, array('height' => 200)) ?>
	</div>
	<div class="row">
		<p>Vì sao bạn chọn sản phẩm này</p>
		<?php echo CHtml::activeTextArea($model, 'content') ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Xác nhận') ?>
	</div>
	<?php $this->endWidget() ?>
</div>
<?php
Yii::app()->clientScript->registerScript("get-option", "
    $('#form-vote form').on('submit', function(){
        var current = $(this);
        current.find('input').prop('disabled', true);
        current.find('textarea').prop('readonly', true);
        var product_id = current.find('input[name=product_id]').val();
        var content = current.find('#Vote_content').val();
        var data = {action:'createVote', data:{product:product_id, content:content}};
        $.post('{$ajaxUrl}', data, function(res){
            $('#form-vote').replaceWith(res);
        })
        return false;
    });
");
?>