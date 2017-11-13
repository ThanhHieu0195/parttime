<?php
/** @var  $data Vote */
$date = date('d/m/y', $data->date_create);
/** @var  $product Product */
$product = Product::model()->findByPk($data->product);
?>
<li>
	<span><?php echo $date ?></span>
	<span>Bạn đã bình chọn cho sản phảm <a href="<?php echo $product->getUrl() ?>"><?php echo $product->title ?></a> với mã số bình chọn </span>
	<span><?php echo $data->code ?></span>
</li>
