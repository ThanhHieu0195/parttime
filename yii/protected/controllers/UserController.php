<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/8/17
 * Time: 11:27 PM
 */

class UserController extends Controller {
	private $_model;
	public function actionCreate() {
		$model = new User();
		if ( isset($_POST['User']) ) {
			$user = $_POST['User'];
			$model->attributes = $user;
			if ( $model->save() ) {
				$this->redirect( array( 'view', 'id' => $model->id ) );
			}
		}
		$this->render('create', ['model' => $model]);
	}

	public function view() {
		if ( isset($_GET['id']) ) {
			$user_id = $_GET['id'];
			$model = $this->loadUser($user_id);
			$this->render('view', ['model' => $model]);
		}
 	}
// 	action
	public function actionForm() {

		if ( isset($_POST['User']) ) {
			$user = $_POST['User'];
			$model = new UserLoginForm();
			$model->attributes = $user;
			if($model->validate() && $model->login()) {
				$this->redirect( array( 'view') );
			}
		}
		if ( isset($_GET['type']) ) {
			switch ($_GET['type']) {
				case 'login':
					$model = new User();
					echo $this->renderPartial('_formLogin', ['model' => $model]);
					break;
			}
		}
	}

// 	extra

	public function loadUser($user_id = null) {
		return Yii::app()->user->loadUser($user_id);
	}
}