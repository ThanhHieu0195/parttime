<?php
?>
<div id="header-main">
    <div class="banner row">
        <div class="background"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/banner.jpg') ?>
    </div>

    <div id="mainmenu" class="row">
        <div id="logo" class="col-md-3">
            <span class="sub">Việt Nam</span>
            <span class="main">nghenhìn</span>
        </div>
		<div class="menu-content col-md-9">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Trang chu', 'url'=>array('site/page', 'view' => 'home')),
					array('label'=>'Tham gia binh chon', 'url'=>array('site/page', 'view'=>'about')),
					array('label'=>'Doc gia danh gia', 'url'=>array('site/contact')),
					array('label'=>'Thong tin san pham', 'url'=>array('site/contact')),
					array('label'=>'Login', 'url'=>array('user/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Dashboard ('.Yii::app()->user->name.')', 'url'=>array('user/dashboard'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			)); ?>
        </div>
    </div><!-- mainmenu -->
</div>
    <style>
        #header-main {
            position: relative;
        }
        #header-main .banner img {
            width: 100%;
        }

        #mainmenu {
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
