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
			array('username, password, email', 'required'),
			array('username, password, email', 'length', 'max'=>128),
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
			return $user->saveAttributes(array('password' => $newPassWord));
		}
		return 0;
	}
}
