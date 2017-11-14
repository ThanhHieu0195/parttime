<?php /** @var $this PostController */ ?>
<div class="content-product">
	<div class="title-content-product">THÔNG TIN SẢN PHẨM</div>
	<?php $this->renderPartial('_topPosts', ['num' => 3]) ?>
	<div class="block-imfomation-product">
		<div class="block-product">
			<?php
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_itemNew',
				'template'=>"{items}\n{pager}",
			));
			?>
		</div>
	</div>
</div>