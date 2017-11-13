<?php
/** @var  $data Vote */
$date = date('d/m/y', $data->date_create);
/** @var  $product Product */
$product = Product::model()->findByPk($data->product);
?>
<tr>
    <td><?php echo $date ?></td>
    <td>Bạn đã bình chọn cho sản phẩm <span class="sanpham"><?php echo $product->title ?></span>với mã bình chọn <span class ="mabinhchon"><?php echo $data->code ?></span></td>
</tr>