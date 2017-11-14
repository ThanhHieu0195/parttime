<?php
/** @var $listCat array
 * @var $catCurrent integer
 */
?>
<div class="content-value-product">
	<div class="title-content-product">ĐỘC GIẢ ĐÁNH GIÁ</div>
	<div id="exTab1" class="container">
		<ul  class="nav nav-pills left">
			<li class="<?php echo empty($catCurrent) ? 'active' : '' ?>">
				<a  href="">Tất cả</a>
			</li>
			<?php foreach ($listCat as $cat => $nameCat): ?>
			<li><a href="?cat=<?php echo $cat ?>" class="<?php echo ($catCurrent == $cat ? 'active' : '') ?>"><?php echo $nameCat ?></a></li>
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
			<div class="tab-pane active" id="1a">
				<div class="block-value-product">
					<div class="block-value">
						<div class="block-content-value">
							<div class="author">
								<div class="logo">
									<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo-1.png') ?></div>
								</div>
								<div class="name-author">Phạm Thái Bình An</div>
							</div>
							<div class="description">
								<div class="category">
									<strong>Hạng mục: </strong><a href="#" class="color_1">Điện thoại cao cấp tốt nhất</a>
								</div>
								<div class="category">
									<strong>Dự đoán: </strong><a href="#" class="color_2">SAMSUNG GALAXY S7 EDGE</a>
								</div>
								<div class="category">
									<strong>Đánh giá: </strong><span>dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và<br> sắc nét. Camera chụp ảnh rất đẹp.</span>
								</div>
							</div>
						</div>
						<div class="block-image-value">
							<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/sp_1.png') ?></div>
						</div>
					</div>
					<div class="block-value">
						<div class="block-content-value">
							<div class="author">
								<div class="logo">
									<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo-1.png') ?></div>
								</div>
								<div class="name-author">Phạm Thái Bình An</div>
							</div>
							<div class="description">
								<div class="category">
									<strong>Hạng mục: </strong><a href="#" class="color_1">Điện thoại cao cấp tốt nhất</a>
								</div>
								<div class="category">
									<strong>Dự đoán: </strong><a href="#" class="color_2">SAMSUNG GALAXY S7 EDGE</a>
								</div>
								<div class="category">
									<strong>Đánh giá: </strong><span>dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và<br> sắc nét. Camera chụp ảnh rất đẹp.</span>
								</div>
							</div>
						</div>
						<div class="block-image-value">
							<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/sp_2.png') ?></div>
						</div>
					</div>
					<div class="block-value">
						<div class="block-content-value">
							<div class="author">
								<div class="logo">
									<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo-1.png') ?></div>
								</div>
								<div class="name-author">Phạm Thái Bình An</div>
							</div>
							<div class="description">
								<div class="category">
									<strong>Hạng mục: </strong><a href="#" class="color_1">Điện thoại cao cấp tốt nhất</a>
								</div>
								<div class="category">
									<strong>Dự đoán: </strong><a href="#" class="color_2">SAMSUNG GALAXY S7 EDGE</a>
								</div>
								<div class="category">
									<strong>Đánh giá: </strong><span>dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và<br> sắc nét. Camera chụp ảnh rất đẹp.</span>
								</div>
							</div>
						</div>
						<div class="block-image-value">
							<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/sp_1.png') ?></div>
						</div>
					</div>
					<div class="block-value">
						<div class="block-content-value">
							<div class="author">
								<div class="logo">
									<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo-1.png') ?></div>
								</div>
								<div class="name-author">Phạm Thái Bình An</div>
							</div>
							<div class="description">
								<div class="category">
									<strong>Hạng mục: </strong><a href="#" class="color_1">Điện thoại cao cấp tốt nhất</a>
								</div>
								<div class="category">
									<strong>Dự đoán: </strong><a href="#" class="color_2">SAMSUNG GALAXY S7 EDGE</a>
								</div>
								<div class="category">
									<strong>Đánh giá: </strong><span>dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và<br> sắc nét. Camera chụp ảnh rất đẹp.</span>
								</div>
							</div>
						</div>
						<div class="block-image-value">
							<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/sp_2.png') ?></div>
						</div>
					</div>
					<div class="block-value">
						<div class="block-content-value">
							<div class="author">
								<div class="logo">
									<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo-1.png') ?></div>
								</div>
								<div class="name-author">Phạm Thái Bình An</div>
							</div>
							<div class="description">
								<div class="category">
									<strong>Hạng mục: </strong><a href="#" class="color_1">Điện thoại cao cấp tốt nhất</a>
								</div>
								<div class="category">
									<strong>Dự đoán: </strong><a href="#" class="color_2">SAMSUNG GALAXY S7 EDGE</a>
								</div>
								<div class="category">
									<strong>Đánh giá: </strong><span>dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và<br> sắc nét. Camera chụp ảnh rất đẹp.</span>
								</div>
							</div>
						</div>
						<div class="block-image-value">
							<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/sp_1.png') ?></div>
						</div>
					</div>
					<div class="block-value">
						<div class="block-content-value">
							<div class="author">
								<div class="logo">
									<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo-1.png') ?></div>
								</div>
								<div class="name-author">Phạm Thái Bình An</div>
							</div>
							<div class="description">
								<div class="category">
									<strong>Hạng mục: </strong><a href="#" class="color_1">Điện thoại cao cấp tốt nhất</a>
								</div>
								<div class="category">
									<strong>Dự đoán: </strong><a href="#" class="color_2">SAMSUNG GALAXY S7 EDGE</a>
								</div>
								<div class="category">
									<strong>Đánh giá: </strong><span>dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và<br> sắc nét. Camera chụp ảnh rất đẹp.</span>
								</div>
							</div>
						</div>
						<div class="block-image-value">
							<div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/sp_2.png') ?></div>
						</div>
					</div>
				</div>
				<div class="button">
					<a href="#" class="btn-c">xem ngay<i class="fa fa-angle-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>