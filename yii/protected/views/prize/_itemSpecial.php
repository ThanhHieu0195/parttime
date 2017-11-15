<?php
/** @var $data Prize*/
$optionUser = json_decode($data->getDataUser('profile'), true);
?>
<tr>
	<td><?php echo $index+1 ?></td>
	<td><?php echo $data->getDataUser('username') ?></td>
	<td><?php echo isset($optionUser['phone']) ? $optionUser['phone'] : '' ?></td>
	<td><?php echo Category::getNameFullCategory($data->getDataOption('category')) ?></td>
	<td><?php echo $data->getDataOption('prize') ?></td>
</tr>