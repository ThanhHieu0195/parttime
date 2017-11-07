<?php

class ProductController extends Controller
{
	public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCreate() {
		$model=new Product();
		if(isset($_POST['Product']))
		{
			print_r($_POST);
			print_r($_FILES);die;
			$model->attributes=$_POST['Product'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionAjax() {
		if ( isset($_POST['action']) ) {
			switch ($_POST['action']) {
				case 'get_option':
					$id = $_POST['id'];
					$option = Category::model()->getOptionByParent($id);
					$form = new CActiveForm();
					$content = $form->dropDownList(Product::model(), 'category', $option);
					echo $content;
					break;
			}
		}
		exit;
	}
}
