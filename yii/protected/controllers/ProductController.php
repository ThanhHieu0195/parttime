<?php

class ProductController extends Controller {
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array(
				'allow',
				'actions' => ['create', 'update', 'admin', 'ajax'],
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->isAdmin()',
			),
			array(
				'allow',
				'actions' => ['view', 'index'],
				'users' => array('*')
			),
			array('deny',  // deny all users
				'users' => array('*'),
				'deniedCallback' => array($this, 'accessDenied'),
			),
		);
	}

	public function accessDenied()
	{
		$this->render('//site/info', array(
			'message' => 'You not permission access to page'
		));
		Yii::app()->end(); // not really neccessary
	}

//	action
	public function actionCreate() {
		$model = new Product();
		if ( isset( $_POST['Product'] ) ) {
			$product = $_POST['Product'];
			if ( isset( $product['config'] ) ) {
				$product['config'] = json_encode( $product['config'] );
			}

			if ( isset( $product['thumnail'] ) && isset( $product['uploadfile'] ) ) {
				$file_path           = Helper::UploadFile( $product['thumnail'], $product['uploadfile'] );
				$product['thumnail'] = $file_path;
			}

			$model->attributes = $product;

			if ( $model->save() ) {
				$this->redirect( array( 'view', 'id' => $model->id ) );
			}
		}

		$this->render( 'create', array(
			'model' => $model,
		) );
	}

	public function actionView() {
		if ( isset( $_GET['id'] ) ) {
			$product_id = $_GET['id'];
			$model      = Product::model()->findByPk( $product_id );
			$this->render( 'view', [ 'model' => $model ] );
		}
	}

	public function actionUpdate() {
		if ( isset( $_GET['id'] ) ) {
			$product_id = $_GET['id'];
		}
		if ( isset( $_POST['Product'] ) && isset( $product_id ) ) {
			$product = $_POST['Product'];
			$model   = Product::model()->findByPk( $product_id );
			if ( isset( $product['config'] ) ) {
				$product['config'] = json_encode( $product['config'] );
			}

			if ( $product['thumnail'] !== $model->thumnail ) {
				$file_path           = Helper::UploadFile( $product['thumnail'], $product['uploadfile'] );
				$product['thumnail'] = $file_path;
			}
			$model->attributes = $product;
			$model->save();
		}

		if ( isset( $product_id ) ) {
			$product_id = $_GET['id'];
			$model      = Product::model()->findByPk( $product_id );
			$this->render( 'update', [ 'model' => $model ] );
		}
	}

	public function actionAdmin() {
		$model = new Product( 'search' );
		if ( isset( $_GET['Product'] ) ) {
			$model->attributes = $_GET['Product'];
		}
		$this->render( 'admin', array(
			'model' => $model,
		) );
	}

//	ajax
	public function actionAjax() {
		if ( isset( $_POST['action'] ) ) {
			switch ( $_POST['action'] ) {
				case 'get_option':
					$id      = $_POST['id'];
					$option  = Category::model()->getOptionByParent( $id );
					$form    = new CActiveForm();
					$content = $form->dropDownList( Product::model(), 'category', $option );
					echo $content;
					break;
			}
		}
		exit;
	}

	public function actionDelete() {
		if ( isset( $_GET['id'] ) ) {
			$product_id = $_GET['id'];

			return Product::model()->deleteByPk( $product_id );
		}

		return false;
	}

	public function actionIndex() {
		$listCat = Category::model()->getOptionByParent();
		$catCurrent = key($listCat);
		if ( isset($_GET['cat']) ) {
			$catCurrent = $_GET['cat'];
		}

		$this->render('index',array(
			'listCat' => $listCat,
			'catCurrent' => $catCurrent,
		));
	}
}
