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
			array('allow',
				'actions' => array('index'),
				'users' => array('*'),
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
				case '_specialForm':
					if ($model->saveTypeSpecial($data)) {
						$this->render('successCreate', ['model' => $model]);
					} else {
						$this->render('failCreate', ['model' => $model]);
					}
					exit();
			}
		}
		$this->render('create', ['model' => $model]);
	}

	public function actionIndex() {
		$typeCurrent = Prize::TYPE_MINI;
		$userIds = [];
		$searchPhone = '';
		$params = [];
		if ( isset($_GET['type']) ) {
			$typeCurrent = $_GET['type'];
		}

		if ( isset($_POST['search']) && $_POST['search'] ) {
			$searchPhone = $_POST['search'];
			$users = User::model()->findAll('profile like :phone', array(
				':phone' => '%phone%' . $searchPhone . '%'
			));
			if ( empty($users) ) {
				$userIds[] = User::USER_EMPTY;
			} else {
				foreach ($users as $user) {
					$userIds[] = $user->id;
				}
			}

			$params[':listuser'] =implode(',', $userIds);

		}

		$criteria = new CDbCriteria();
		$criteria->addCondition('type=:type');
		if ( !empty($userIds) ) {
			$criteria->addCondition('user in (:listuser)');
		}
		$params[':type'] =$typeCurrent;

//
//		if ($typeCurrent == Prize::TYPE_MEDIUM || $typeCurrent == Prize::TYPE_SPECIAL) {
//			$criteria->addCondition('date_create > :time');
//			$day = Helper::getDateInWeek();
//			$params[':time'] = strtotime(date($day.'/m/Y'));
//		}
		$criteria->params = $params;
		$dataProvider=new CActiveDataProvider('Prize', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('listprize', array(
			'dataProvider' => $dataProvider,
			'typeCurrent' => $typeCurrent,
			'searchPhone' => $searchPhone
		));
	}
}