<?php /** @var $data Post */ ?>
<div class="block-content-product">
	<div class="block-image">
		<?php echo CHtml::image(Helper::getPathUpload() . $data->thumnail, $data->title) ?>
	</div>
	<div class="block-content">
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url, array('class' => 'title')); ?>
		<div class="content">
			<?php
//			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo Helper::cutText($data->content, 500);
//			$this->endWidget();
			?>
		</div>
		<div class="link-detail">
			<a href="<?php echo $data->url ?>">Xem chi tiết<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
		</div>
	</div>
</div>