<?php /** @var \Product $data */ ?>
<?php
$configs = $data->getDataConfig();
?>
<div class="product-info product-1">
    <div class="img-product">
        <div class="block-image"><?php echo CHtml::image( $data->getUrlThumnail() )?></div>
    </div>
    <div class="detail-product">
        <div class="title-product"><?php echo $data->title ?></div>
        <div class="detail-abstract">
            <div class="title">Thông tin sản phẩm:</div>
            <div class="description"><?php echo Helper::cutText($data->content, 200) ?></div>
        </div>

        <div class="configuration">
            <div class="title">Cấu hình về sản phẩm:</div>
            <div class="list-configuration">
                <table style="width:100%">
	                <?php
	                $row = '<tr>';
	                for ($i=0; $i<count($configs['key']); $i++) {
		                $key = $configs['key'][$i];
		                $value = $configs['value'][$i];

		                if (($i+1)%3 == 1) {
			                $row .= '<tr>';
		                }
		                $row .= '<td><span>'.$key.':</span>'.$value.'</td>';
		                if (($i+1)%3 == 0 || $i == count($configs['key']) -1 ) {
		                    $row .= '</tr>';
	                    }
                    }
	                ?>
                    <?php echo $row ?>
                </table>
            </div>

            <button class="btn-modal" type="button" data-action="vote" data-ajax="<?php echo Yii::app()->createUrl('vote/ajax') ?>" data-product="<?php echo $data->id  ?>">BÌNH CHỌN NGAY</button>
        </div>


    </div>
</div>