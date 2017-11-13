<?php
/** @var $this PrizeController
 * @var $model Prize
 */
$this->breadcrumbs = array(
	'prize', 'create'
);
?>
<h1>Tạo giải thưởng</h1>
<div id="form-product-create">
	<?php
	if ( isset($_GET['action']) ):
		echo $this->renderPartial($_GET['action'], ['model' => $model]);

	else: ?>
		<?php echo CHtml::tag('a', array('href' => $this->createUrl('create', ['action' => '_miniForm'])), 'Mini') ?>
		<?php echo CHtml::tag('a', array('href' => $this->createUrl('create', ['action' => '_mediumForm'])), 'Hàng tuần') ?>
		<?php echo CHtml::tag('a', array('href' => $this->createUrl('create', ['action' => '_specialForm'])), 'Đặc biệt') ?>
	<?php endif; ?>

</div>