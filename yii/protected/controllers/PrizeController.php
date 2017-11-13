<?php

class PrizeController extends Controller {
	public function filters() {
		return array(
			'accessControl'
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions' => array(),
				'users' => array('@'),
				'expression'=>'Yii::app()->user->isAdmin()',
			),
			array('deny',  // deny all users
				'users' => array('*'),
				'deniedCallback' => function() {
					echo 'You are not permission to page';
				},
			),
		);
	}

	public function actionCreate() {
		$model = new Prize();
		if ( isset($_GET['action']) && isset($_POST['Prize']) ) {
			$action = $_GET['action'];
			$data = $_POST['Prize'];
			switch ($action) {
				case '_miniForm':
					if ($model->saveTypeMini($data)) {
						$this->render('successCreate', ['model' => $model]);
					} else {
						$this->render('failCreate', ['model' => $model]);
					}
					exit();
				case '_mediumForm':
					if ($model->saveTypeMedium($data)) {
						$this->render('successCreate', ['model' => $model]);
					} else {
						$this->render('failCreate', ['model' => $model]);
					}
					exit();
			}
		}
		$this->render('create', ['model' => $model]);
	}
}