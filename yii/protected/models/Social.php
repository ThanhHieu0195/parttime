<?php

/**
 * Class Vote
 * @property integer $id
 * @property string $data
 */
class Social extends CActiveRecord {
	public function rules() {
		return array(
			array('data', 'required'),
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
		return '{{social}}';
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id'       => 'Id',
			'data' => 'Data',
		);
	}

	protected function beforeSave() {
		$this->id = time();
	}

}