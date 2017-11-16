<?php

/**
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $profile
 * @property string $role
 */
class User extends CActiveRecord
{
	const ROLE_ADMIN = 1;
	const ROLE_MEMBER = 2;

	const USER_EMPTY = -1;

	/**
	 * Returns the static model of the specified AR class.
	 * @return static the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, email', 'required'),
			array('password, email', 'length', 'max'=>128),
			array('role', 'in', 'range' => array(self::ROLE_ADMIN, self::ROLE_MEMBER)),
			array('profile', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'profile' => 'Profile',
			'role' => 'Role',
		);
	}

	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}

	public function beforeSave() {
		$this->role = self::ROLE_MEMBER;
		$this->password = $this->hashPassword($this->password);

		if ( empty($this->username ) ) {
			$arr = explode('@', $this->email);
			$this->username = $arr[0];
		}
		return true;
	}

	public function checkEmail($email) {
		$user = User::find('email=?', [$email]);
		if ( !empty($user) ) {
			return true;
		}
		return false;
	}


	public function resetPassword($email, $newPassWord) {
		$user = User::model()->find('email=?', [$email]);
		if ( !empty($user) ) {
			/** @var  $user User */
			return $user->saveAttributes( array('password' => CPasswordHelper::hashPassword($newPassWord)) );
		}
		return 0;
	}

	public function getChildProfile($key='') {
		if ($this->profile) {
			$arr = json_decode($this->profile, true);
			if ( key_exists($key, $arr) ) {
				return $arr[$key];
			}
		}
		return '';
	}

	public function getAllOptionUser() {
		$objects = $this->findAll('role=:role', ['role' => self::ROLE_MEMBER]);
		$arr = [];
		if (!empty($objects)) {
			foreach ($objects as $object) {
				$arr[$object->id] = $object->username;
			}
		}
		return $arr;
	}

	public static function findUsersLikeName($username) {
		/** @var  $criteria CDbCriteria */
		$criteria = new CDbCriteria();
		$userIds = [];
		$criteria->addCondition('username like :username');
		$criteria->params = array(':username' => '%' . $username . '%');
		$users = self::model()->findAll($criteria);
		foreach ($users as $user) {
			$userIds[] = $user->id;
		}
		return $userIds;
	}
}
