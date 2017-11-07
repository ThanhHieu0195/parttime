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
			$product = $_POST['Product'];
			if ( isset($product['config']) ) {
				$product['config'] = json_encode($product['config']);
			}

			if (isset($product['thumnail']) && isset($product['uploadfile'])) {
				$file_path = Helper::UploadFile($product['thumnail'], $product['uploadfile']);
				$product['thumnail'] = $file_path;
			}

			$model->attributes=$product;

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionView() {
		if ( isset($_GET['id']) ) {
			$product_id = $_GET['id'];
			$model = Product::model()->findByPk($product_id);
			$this->render('view', ['model' => $model]);
		}
	}

	public function actionUpdate() {
		if ( isset($_GET['id']) ) {
			$product_id = $_GET['id'];
		}
		if ( isset($_POST['Product']) && isset($product_id)) {
			$product = $_POST['Product'];
			$model = Product::model()->findByPk($product_id);
			if ( isset($product['config']) ) {
				$product['config'] = json_encode($product['config']);
			}

			if ($product['thumnail'] !== $model->thumnail) {
				$file_path = Helper::UploadFile($product['thumnail'], $product['uploadfile']);
				$product['thumnail'] = $file_path;
			}
			$model->attributes = $product;
			$model->save();
		}

		if ( isset($product_id) ) {
			$product_id = $_GET['id'];
			$model = Product::model()->findByPk($product_id);
			$this->render('update', ['model' => $model]);
		}
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
