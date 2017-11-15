<?php /** @var $this PrizeController */ ?>
<?php /** @var $typeCurrent integer */ ?>
<?php /** @var $searchPhone string */ ?>

<div class="winnings">
	<div class="main-title">DANH SÁCH TRÚNG THƯỞNG</div>

	<div class="tab-winnings tab-custom">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="<?php echo ($typeCurrent == Prize::TYPE_MINI ? 'active' : '') ?>">
                <a href="?type=<?php echo Prize::TYPE_MINI ?>&auto_scroll=content">GIẢI MINIGAME</a>
            </li>
			<li role="presentation" class="<?php echo ($typeCurrent == Prize::TYPE_MEDIUM ? 'active' : '') ?>">
                <a href="?type=<?php echo Prize::TYPE_MEDIUM ?>&auto_scroll=content">GIẢI THƯỞNG TUẦN</a>
            </li>
			<li role="presentation" class="<?php echo ($typeCurrent == Prize::TYPE_SPECIAL ? 'active' : '') ?>">
                <a href="?type=<?php echo Prize::TYPE_SPECIAL ?>&auto_scroll=content">GIẢI ĐẶC BIỆT</a>
            </li>
		</ul>
	</div>
	<div class="tab-content">
        <?php
        if ($typeCurrent == Prize::TYPE_MINI) {
            $this->renderPartial('tabMini', array(
	            'dataProvider' => $dataProvider,
	            'typeCurrent' => $typeCurrent,
	            'searchPhone' => $searchPhone
            ));
        }

        if ($typeCurrent == Prize::TYPE_MEDIUM) {
	        $this->renderPartial('tabMedium', array(
		        'dataProvider' => $dataProvider,
		        'typeCurrent' => $typeCurrent,
		        'searchPhone' => $searchPhone
	        ));
        }

        if ($typeCurrent == Prize::TYPE_SPECIAL) {
	        $this->renderPartial('tabSpecial', array(
		        'dataProvider' => $dataProvider,
		        'typeCurrent' => $typeCurrent,
		        'searchPhone' => $searchPhone
	        ));
        }
        ?>
	</div>

</div>