<div role="tabpanel" class="tab-pane active" id="tab-content">
	<div class="search">
		<form action="" method="post" class="f">
			<label class="is-vishidden">Tìm bằng số điện thoại</label>
			<input type="search" placeholder="Tìm bằng số điện thoại" name="search" value="<?php echo $searchPhone ?>"/>
			<button type="submit" class="btn search-submit" value="Search"> </button>
		</form>
	</div>
    <div class="represent-img">
        <div class="block-image"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/group-3.png')?></div>
    </div>
	<div class="list-winner">
		<table style="width:100%">
			<tr>
				<th>STT</th>
				<th>HỌ VÀ TÊN</th>
				<th>SỐ ĐIỆN THOẠI</th>
                <th>HẠNG MỤC</th>
                <th>GIẢI THƯỞNG</th>
			</tr>
			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_itemSpecial',
				'template'=>"{items}\n{pager}",
			)); ?>
		</table>
	</div>

</div>