<?php /** @var $this PrizeController */ ?>
<?php /** @var $typeCurrent integer */ ?>
<?php /** @var $searchPhone string */ ?>
<?php
$w1       = Helper::getDateInWeek( 1 );
$w1       = date( $w1 . '/m/Y' );

$w2       = Helper::getDateInWeek( 2 );
$w2       = date( $w2 . '/m/Y' );

$w3       = Helper::getDateInWeek( 3 );
$w3       = date( $w3 . '/m/Y' );

$w4       = Helper::getDateInWeek( 4 );
$w4       = date( $w4 . '/m/Y' );

$criteria = $dataProvider->getCriteria();
?>

<div role="tabpanel" class="tab-pane active" id="tab-content">
    <div class="search">
        <form action="" method="post" class="f">
            <label class="is-vishidden">Tìm bằng số điện thoại</label>
            <input type="search" placeholder="Tìm bằng số điện thoại" name="search" value="<?php echo $searchPhone ?>"/>
            <button type="submit" class="btn search-submit" value="Search"></button>
        </form>
    </div>

    <div class="tab-weeks tab-custom">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#week-1" aria-controls="week-1" role="tab"
                                                      data-toggle="tab">Tuần 1 (<?php echo $w1 ?>)</a></li>
            <li role="presentation"><a href="#week-2" aria-controls="week-2" role="tab" data-toggle="tab">Tuần 2
                    (<?php echo $w2 ?>)</a></li>
            <li role="presentation"><a href="#week-3" aria-controls="week-3" role="tab" data-toggle="tab">Tuần 3
                    (<?php echo $w3 ?>)</a></li>
            <li role="presentation"><a href="#week-4" aria-controls="week-4" role="tab" data-toggle="tab">Tuần 4
                    (<?php echo $w4 ?>)</a></li>
        </ul>
    </div>
    <div class="tab-content">
		<?php
		$criteria->addCondition('date_create >= :start');
		$criteria->addCondition('date_create < :end');

		$this->renderPartial( '_week', array(
			'week'     => 1,
			'criteria' => $criteria,
            'start' => $w1,
		) );

		$this->renderPartial( '_week', array(
			'week'     => 2,
			'criteria' => $criteria,
			'start' => $w2,
		) );

		$this->renderPartial( '_week', array(
			'week'     => 3,
			'criteria' => $criteria,
			'start' => $w3,
		) );

		$this->renderPartial( '_week', array(
			'week' => 4,
	        'criteria' => $criteria,
            'start' => $w4,
        ));
        ?>
    </div>

</div>