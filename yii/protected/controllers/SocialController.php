<?php
class SocialController extends Controller {
	public function actionLogin() {
		if (isset($_GET['action']) && $_GET['action'] == 'login') {
			$data = $_GET;
			/** @var  $model Social */
			$model = new Social();
			if ($data['session'] == Yii::app()->session->sessionID) {
				$obj = Social::model()->find('id_user=:id_user', array(
					':id_user' => $data['id']
				));

				if ($obj) {
					$model = $obj;
					$model->setIsNewRecord(false);
				}

				$attributes = array(
					'id_user' => $data['id'],
					'config' => json_encode($data)
				);

				$model->attributes = $attributes;
				$model->save();

				if ( empty($model->getErrors()) ) {
					$user = new User();
					$email = Social::getAddress($data['id']);
					$result = $user->find('email=:email', array(
						':email' => $email
					));

					if ( empty($result) ) {
						$user->attributes = array(
							'email' => $email,
							'password' => $email,
							'username' => isset($data['username']) ? $data['username'] : ''
						);
						$user->save();
					} else {
						$user = $result;
						$user->password = $email;
					}
					$userForm  = new UserLoginForm();
					$userForm->attributes = $user->attributes;
					echo $userForm->login();
				}
			}
			Yii::app()->end();
		}
		$this->render('login');
	}
}