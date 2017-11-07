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
			if ( isset($_POST['Product']['config']) ) {
				$_POST['Product']['config'] = json_encode($_POST['Product']['config']);
			}

//			upload file
			$webroot = Yii::getPathOfAlias('webroot');
			$date=new DateTime(); //this returns the current date time
			$current_date = $date->format('Y-m-d');

			$local_thumnail_url = $model->attributes['thumnail'];
			$pathfile = '/uploads/' . $current_date;
			$server_thumnail_url = $webroot . $pathfile;
			$dirname = $_POST['uploadfile'];
			if ( !is_dir($server_thumnail_url) ) {
				mkdir($server_thumnail_url);
			}

			$server_thumnail_url .= '/' . $dirname;
			if ( !file_exists($server_thumnail_url) ) {
				copy($local_thumnail_url, $server_thumnail_url);
			}

			$is_upload = file_exists($server_thumnail_url);

			if ($is_upload) {
				$_POST['Product']['thumnail'] = $pathfile . '/' . $dirname;
			}
//			endupload

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
