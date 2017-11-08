<?php

Yii::import('zii.widgets.CPortlet');

class ProductMenu extends CPortlet
{
	public $title='Product';
	protected function renderContent()
	{
		$this->render( 'productMenu' );
	}
}