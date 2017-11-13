<?php /** @var $this PostController */ ?>
<div class="content-product">
	<div class="title-content-product">THÔNG TIN SẢN PHẨM</div>
	<?php $this->renderPartial('_topPosts', ['num' => 3]) ?>
	<div class="block-imfomation-product">
		<div class="block-product">
			<?php
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_itemIndex',
				'template'=>"{items}\n{pager}",
			));
			?>
		</div>
		<div class="wp-pagenavi">
			<a class="first" rel="prev" href="#">Pre</a>
			<a class="page current">1</a>
			<a class="page larger" href="#">2</a>
			<a class="page larger" href="#">3</a>
			<a class="page larger" href="#">4</a>
			<a class=" last opa" rel="next" href="#">Next</a>
		</div>
	</div>
</div>