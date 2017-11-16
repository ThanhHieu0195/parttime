<?php
/** @var $product Product
 * @var $this VoteController
 */
?>
<div class="modal-dialog form-guess" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Bình chọn</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="title-form"><?php echo $product->title ?></div>
			<?php $this->beginWidget('CActiveForm', array('id' => 'form-modal-vote')) ?>
				<div class="image-vote">
					<div class="vote"><img src="<?php echo $product->getUrlThumnail() ?>" alt=""></div>
				</div>
				<div class="form-group text-vote">
					<label for="message-text" class="form-control-label">Vì sao bạn lại bình chọn sản phẩm này?</label>
					<?php echo CHtml::textArea('Vote[content]', '', array('placeholder' => 'Vui lòng nhập nội dung')) ?>
				</div>
				<div class="form-group submit conform">
					<input type="submit" value="Xác Nhận">
				</div>
			<?php $this->endWidget() ?>
		</div>
	</div>
</div>