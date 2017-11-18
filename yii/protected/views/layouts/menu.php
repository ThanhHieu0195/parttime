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
					array('label'=>'Tham gia bình chọn', 'url'=>array('product/index', 'view'=>'vote_product')),
					array('label'=>'Đọc giả đánh giá', 'url'=>array('vote/index')),
					array('label'=>'Thông tin sản phẩm', 'url'=> array('post/news/')),
                    array('label'=>'Tỉ lệ & giải thưởng', 'url'=>array('site/page','view' => 'ratio')),
                    array('label'=>'Danh sách trúng giải', 'url'=>array('prize/index', 'view' => 'winnings')),
					array('label'=>'Đặng nhập', 'url'=>array('#'), 'visible' => Yii::app()->user->isGuest, 'itemOptions' => array('class' => 'btn-modal no-login', 'data-action' => 'login', 'data-ajax' => Yii::app()->createUrl('user/ajax'))),
					array('label'=>'', 'url'=>array('site/login'), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                        array('label'=>'Thông tin tài khoản', 'url'=>array('user/profile')),
						array('label'=>'Danh sách bình chọn', 'url'=>array('vote/listvote')),
						array('label'=>'Quản lý website', 'url'=>array('site/dashboard'), 'visible'=>Yii::app()->user->isAdmin()),
                        array('label'=>'Thoát', 'url'=>array('site/logout')),
                    )),
				),
			)); ?>
        </div>
    </div><!-- mainmenu -->
    <div class="block-content-main">
        <div class="link-main">
            <a href="#" class="link">www.nghenhinvietnam.vn</a>
        </div>
        <div class="sologan">
            <div class="title-solagan">Bình chọn sản phẩm <br>công nghệ nổi bật nhất</div>
            <div class="year">2017</div>
        </div>
        <div class="button">
            <a href="#" class="btn">Bình chọn ngay</a>
        </div>
    </div>
</div>
