<?php

Yii::import('zii.widgets.CPortlet');

class PrizeMenu extends CPortlet
{
	public $title='Prize';
	protected function renderContent()
	{
		$this->render( 'prizeMenu' );
	}
}