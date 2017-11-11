<?php
/**
 * The followings are the available columns in table 'tbl_post':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
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
	public static function model( $className = __CLASS__ ) {
		return parent::model( $className );
	}

	/**
	 * @return string the associated database table name
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
		);
	}

	protected function beforeSave() {
		/** @var  $SM CSecurityManager */
		if ( parent::beforeSave() ) {
			$SM = Yii::app()->getSecurityManager();
			$this->code = $SM->generateRandomString(10);
			return true;
		}
		return false;
	}
}