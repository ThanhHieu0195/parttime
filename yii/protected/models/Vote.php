<?php

/**
 * Class Vote
 * @property integer $id
 * @property string $code
 * @property string $content
 * @property string $author
 * @property string $product
 * @property integer $date_create
 */
class Vote extends CActiveRecord {

	public function rules() {
		return array(
			array('content, product', 'required'),
			array('code', 'safe')
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return static the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated databpase table name
	 */
	public function tableName() {
		return '{{vote}}';
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id'       => 'Id',
			'code' => 'Code',
			'content'     => 'Content',
			'product' => 'Product',
			'author' => 'Author',
			'date_create' => 'Date Create',
		);
	}

	protected function beforeSave() {
		/** @var  $SM CSecuNrityManager */
		if ( parent::beforeSave() ) {
			$SM = Yii::app()->getSecurityManager();
			$this->code = $SM->generateRandomString(10);
			$this->date_create = time();
			$this->author = Yii::app()->user->id;
			return true;
		}
		return false;
	}
}