<?php


/**
 * Class Prize
 * @property integer $id
 * @property integer $user
 * @property string $option
 * @property integer $type
 * @property integer $date_create
 */
class Prize extends CActiveRecord {
	const TYPE_MINI = 3;
	const TYPE_MEDIUM = 2;
	const TYPE_SPECIAL = 1;

	public function rules() {
		return array(
			array(
				'user, type, option', 'required'
			),
			array(
				'type', 'in', 'range' => [self::TYPE_SPECIAL, self::TYPE_MEDIUM, self::TYPE_MINI]
			)
		);
	}

	public function tableName() {
		return '{{prize}}';
	}

	public function attributeLabels() {
		return array(
			'id' => 'Id',
			'user' => 'Người dùng',
			'type' => 'Loại',
			'option' => 'Dữ liêu',
			'date_create' => 'Ngày tạo'
		);
	}

	public function saveTypeMini($data) {
		$data['option'] = json_encode($data['option']);
		$this->attributes = $data;
		$this->date_create = time();
		return $this->save();
	}

	public function saveTypeMedium($data) {
		$date_create = $data['option']['week'];
		$data['option'] = json_encode($data['option']);
		$this->attributes = $data;
		$this->date_create = $date_create;
		return $this->save();
	}

}