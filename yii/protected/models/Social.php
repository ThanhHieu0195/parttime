<?php

/**
 * Class Vote
 * @property integer $id
 * @property string $config
 */
class Social extends CActiveRecord {
	public function rules() {
		return array(
			array('id_user, config', 'required'),
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
			'id_user'       => 'Id User',
			'config' => 'Config',
		);
	}

	protected function beforeSave() {
		return true;
	}

	public function save() {
		$is_save = parent::save();
		return $is_save;
	}

	public static function getAddress($id_user) {
		return $id_user.'@facebook.com';
	}

}