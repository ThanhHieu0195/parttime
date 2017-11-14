<?php
/** @var $data Vote
 *@var $product Product
 *@var $user User
 *@var $cat Category
 */
$product = Product::model()->findByPk($data->product);
$user = User::model()->findByPk($data->author);
?>
<div class="block-value-product">
	<div class="block-value">
		<div class="block-content-value">
			<div class="author">
				<div class="logo">
					<div class="logo-main"><?php echo Helper::getLogo() ?></div>
				</div>
				<div class="name-author"><?php echo $user->username ?></div>
			</div>
			<div class="description">
				<div class="category">
					<strong>Hạng mục: </strong><a href="#" class="color_1"><?php echo Category::getNameFullCategory($product->category) ?> tốt nhất</a>
				</div>
				<div class="category">
					<strong>Dự đoán: </strong><a href="#" class="color_2"><?php echo $product->title ?></a>
				</div>
				<div class="category">
					<strong>Đánh giá: </strong><span><?php echo $data->content ?></span>
				</div>
			</div>
		</div>
		<div class="block-image-value">
			<div class="logo-main"><?php echo CHtml::image($product->getUrlThumnail()) ?></div>
		</div>
	</div>
</div>