<?php
class VoteController extends Controller {
	public function filters() {
		return array(
			'accessControl'
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions' => array(),
				'users' => array('@')
			),
			array('deny',  // deny all users
				'users' => array('*'),
				'deniedCallback' => function() {
					echo 'You are not permission to page';
				},
			),
		);
	}
	public function actionIndex() {
		if ( isset($_GET['id']) ) {
			$id = $_GET['id'];
			$product = Product::model()->findByPk($id);
			$model = Vote::model();
			$this->render('create', ['model' => $model, 'product' => $product]);
		}
	}

	public function actionAjaxForm() {
		if ( !Yii::app()->user->isGuest && isset($_POST['action']) ) {
			$action = $_POST['action'];
			switch ($action) {
				case 'createVote':
					if ( isset($_POST['data']) ) {
						$data = $_POST['data'];
						$model = Vote::model();
						$model->attributes = $data;
						$result = $model->save();
						echo $result;
					}
					break;
			}
		}
		exit();
	}
}