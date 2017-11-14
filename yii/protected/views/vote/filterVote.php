<?php
/** @var $listCat array
 * @var $catCurrent integer
 */
?>
<div class="content-value-product">
	<div class="title-content-product">ĐỘC GIẢ ĐÁNH GIÁ</div>
	<div id="exTab" class="container">
		<ul  class="nav nav-pills left">
			<li class="<?php echo empty($catCurrent) ? 'active' : '' ?>">
				<a  href="?auto_scroll=exTab">Tất cả</a>
			</li>
			<?php foreach ($listCat as $cat => $nameCat): ?>
			<li class="<?php echo ($catCurrent == $cat ? 'active' : '') ?>"><a href="?cat=<?php echo $cat ?>&auto_scroll=exTab"><?php echo $nameCat ?></a></li>
			<?php endforeach; ?>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Tìm kiếm</a></li>
				<li>
					<div class="search">
						<form action="#" method="post" class="f">
							<label class="is-vishidden">Tìm bằng số điện thoại</label>
							<input type="search">
							<button type="submit" class="btn search-submit" value="Search"> </button>
						</form>
					</div>
				</li>
			</ul>
		</ul>

		<div class="tab-content clearfix">
			<div class="tab-pane active">

				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_itemFilterVote',
					'template'=>"{items}\n{pager}",
				)); ?>

				<div class="button">
					<a href="#" class="btn-c">xem ngay<i class="fa fa-angle-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>