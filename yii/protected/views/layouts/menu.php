<?php
?>
<div id="header-main">
    <!--<div class="banner row">
        <div class="background"><?php /*echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/banner.jpg') */?>
    </div>-->

    <div id="mainmenu" class="row">
        <div id="logo">
            <!--<span class="sub">Việt Nam</span>
            <span class="main">nghenhìn</span>-->
            <div class="logo-main"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo.png') ?></div>
        </div>
		<div class="menu-content">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Trang chủ', 'url'=>array('site/page', 'view' => 'home')),
					array('label'=>'Tham gia bình chọn', 'url'=>array('site/page', 'view'=>'about')),
					array('label'=>'Đọc giả đánh giá', 'url'=>array('site/page','view'=>'value-product')),
					array('label'=>'Thông tin sản phẩm', 'url'=>array('site/page', 'view' => 'product')),
                    array('label'=>'Tỉ lệ & giải thưởng', 'url'=>array('site/page','view' => 'ratio')),
                    array('label'=>'Danh sách trúng giải', 'url'=>array('site/page', 'view' => 'winnings')),
					array('label'=>'', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest, 'items'=>array(
                        array('label'=>'Thông tin tài khoản', 'url'=>array('site/page', 'view' => 'account')),
                        array('label'=>'Danh sách bình chọn', 'url'=>array('site/contact')),
                        array('label'=>'Thoát', 'url'=>array('site/contact')),
                    )),
					array('label'=>'Dashboard ('.Yii::app()->user->name.')', 'url'=>array('site/dashboard'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			)); ?>
        </div>
    </div><!-- mainmenu -->
    <div class="block-content-main">
        <div class="link-main">
            <a href="#" class="link">www.nghenhinvietnam.vn</a>
        </div>
        <div class="sologan">
            <div class="title-solagan">Bình chọn sản phẩm công nghệ nổi bật nhất</div>
            <div class="year">2017</div>
        </div>
        <div class="button">
            <a href="#" class="btn">Bình chọn ngay</a>
        </div>
    </div>
</div>
