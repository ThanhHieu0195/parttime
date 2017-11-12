<h1><D></D>anh sách bình chọn</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_itemIndex',
	'template'=>"{items}\n{pager}",
)); ?>
