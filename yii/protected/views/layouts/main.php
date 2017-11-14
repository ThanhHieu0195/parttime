<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <!--<link rel="stylesheet" type="text/css" href="<?php /*echo Yii::app()->request->baseUrl; */?>/css/menu.css" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/header.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome-4.7.0/css/font-awesome.min.css">



<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/libs/bootstrap/css/bootstrap.css" />-->
<!--    <script src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/libs/bootstrap/js/bootstrap.js"></script>-->
    <?php if ( method_exists($this, 'getAssets') ) $this->getAssets() ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <?php
    /* @var $this SiteController */
    $path = $this->getLayoutFile('menu');
    $this->renderFile($path);
    ?><!-- menu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
        <div class="block-footer-1">
            <div class="footer-left">
                <div class="title">ĐƠN VỊ TÀI TRỢ KIM CƯƠNG</div>
                <div class="block-logo">
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/cannon.png') ?></div>
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/Sam-sung.png') ?></div>
                </div>
            </div>
            <div class="footer-right">
                <div class="title">ĐƠN VỊ TÀI TRỢ VÀNG</div>
                <div class="block-logo">
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/cannon.png') ?></div>
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/Sam-sung.png') ?></div>
                </div>
            </div>
        </div>
        <div class="block-footer-2">
            <div class="footer-full">
                <div class="title">ĐƠN VỊ ĐỒNG TÀI TRỢ</div>
                <div class="block-logo">
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/cannon.png') ?></div>
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/Sam-sung.png') ?></div>
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/Oppo.png') ?></div>
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/Sony.png') ?></div>
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/cannon.png') ?></div>
                    <div class="logo-footer"><?php echo CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/Sam-sung.png') ?></div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-left">Copyright &copy; <?php echo date('Y'); ?> Nghenhinvietnam.vn.</div>
            <div class="footer-bottom-right">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>'Về Nghe Nhìn Việt Nam', 'url'=>array('site/page', 'view' => 'home')),
                        array('label'=>'Về Editor’s Choice', 'url'=>array('site/page', 'view'=>'about')),
                        array('label'=>'Liên Hệ', 'url'=>array('site/contact')),
                    ),
                )); ?>
            </div>
        </div>
	</div><!-- footer -->

    <!--    modal-->
    <div class="modal fade" id="modalController" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    </div>
</div><!-- page -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modal.js"></script>
</body>
</html>