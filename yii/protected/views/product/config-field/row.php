
<tr class="item">
	<td>
		<?php echo CHtml::textField('Product[config][key][]', isset($key)?$key:'') ?>
	</td>
	<td>
		<?php echo CHtml::textField('Product[config][value][]', isset($value)?$value:'') ?>
	</td>
    <td><span class="btn-remove"></span></td>
</tr>