<?php
/** @var integer $type [1, 2, 3] : 1 success, 2: warning, 3: danger*/
$class = '';
switch ($type) {
	case 1:
		$class = 'text-success';
		break;
	case 2:
		$class = 'text-warning';
		break;
	case 3:
		$class = 'text-danger';
		break;
}
?>
<span class="<?php echo $class ?>"><?php echo $message ?></span>
