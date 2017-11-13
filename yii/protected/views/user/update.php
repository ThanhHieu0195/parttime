<?php
/** @var $this UserController
 * @var $model User
 */

$this->breadcrumbs = array(
	'user',
	$model->username
);
?>
<h1>Cập nhật thông tin tài khoản</h1>
<?php echo $this->renderPartial('_formUpdate', ['model' => $model, 'msgPassword' => $msgPassword]);  ?>