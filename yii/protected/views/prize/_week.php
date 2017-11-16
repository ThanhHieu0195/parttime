<?php
/** @var $week integer
 * @var $criteria CDbCriteria
 * @var $start integer
 */
$criteria->params[':start'] = strtotime(str_replace('/', '-', $start));
$criteria->params[':end'] = $criteria->params[':start'] + 7*24*60*60;
$prizes = new Prize();
$prizes = $prizes->findAll($criteria);
$classActive = '';
if ($week == 1) {
    $classActive = 'active';
}
?>
<div role="tabpanel" class="tab-pane <?php echo $classActive ?>" id="week-<?php echo $week ?>">
    <div class="list-winner">
        <table style="width:100%">
            <?php for ($i=0; $i<count($prizes); $i++): ?>
            <?php
	            $prize = $prizes[$i];
	            $optionUser = json_decode($prize->getDataUser('profile'), true);
            ?>
            <tr>
                <td><?php echo $i+1 ?></td>
                <td><?php echo $prize->getDataUser('username') ?></td>
                <td><?php echo isset($optionUser['phone']) ? $optionUser['phone'] : '' ?></td>
                <td><?php echo Category::getNameFullCategory($prize->getDataOption('category')) ?></td>
                <td><?php echo $prize->getDataOption('prize') ?></td>
            </tr>
            <?php endfor;?>
        </table>
    </div>
</div>