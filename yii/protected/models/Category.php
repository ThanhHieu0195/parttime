<?php
/**
 * The followings are the available columns in table 'tbl_tag':
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property integer $count
 */
class Category extends CActiveRecord
{
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
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>128),
			array('content', 'length', 'max'=>128),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
			'content' => 'Content',
			'parent' => 'Parent',
		);
	}

	/**
	 * @return array
	 */
	public function getOptionByParent($parent=null) {
		if (empty($parent)) {
			$categories = $this->findAll('parent is :parent', array('parent' => null ));
		} else {
			$categories = $this->findAll('parent =:parent', array('parent' => $parent ));
		}
		$arr = [];
		for ($i=0; $i<count($categories); $i++) {
			$arr[$categories[$i]->id] = $categories[$i]->name;
		}
		return $arr;
	}

	public function getType($category_id) {
		$model = $this->findByPk($category_id);
		if (isset($model->parent) && $model->parent) {
			return $model->parent;
		}
		return '';
	}

	public static function getNameFullCategory($catId) {
		$cat = self::model()->findByPk($catId);
		$catParent = self::model()->findByPk($cat->parent);
		$name = '';
		if ( isset($catParent->name) ) {
			$name .= $catParent->name . ' ';
		}

		if ( isset($cat->name) ) {
			$name .= $cat->name;
		}
		return $name;
	}
}