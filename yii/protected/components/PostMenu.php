<?php

Yii::import('zii.widgets.CPortlet');

class PostMenu extends CPortlet
{
	public $title='post';
	protected function renderContent()
	{
		$this->render( 'postMenu' );
	}
}