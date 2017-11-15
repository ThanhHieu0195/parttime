<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/8/17
 * Time: 11:27 PM
 */

class UserController extends Controller {
	private $_model;

	public function actionLogin() {
		$model = new User();

		if ( isset($_POST['User']) ) {
			$user = $_POST['User'];
			$userForm = new UserLoginForm();
			$userForm->attributes = $user;
			if ($userForm->validate() && $userForm->login()) {
				$this->redirect(array('profile'));
			}
			if ( !$model->checkEmail($user['email']) ) {
				$model->addError('email', 'Email không tồn tại');
			} else {
				$model->addError('password', 'Mật khẩu không đúng');
			}
		}
		$this->render('login', ['model' => $model]);
	}

	public function actionCreate() {
		$model = new User();
		if ( isset($_POST['User']) ) {
			$user = $_POST['User'];
			$model->attributes = $user;
			$is_check = 1;
			if ( $user['password'] != $user['repassword'] ) {
				$is_check = 0;
				$model->addError('password', 'Mật khẩu không trùng');
			}

			if ( $model->checkEmail($model->email) ) {
				$is_check = 0;
				$model->addError('email', 'Email đã được dùng');
			}

			if ($is_check) {
				if ( $model->save() ) {
					$this->renderPartial('_successCreate', ['data' => $model]);
					exit();
				}
			}
		}
		$this->render('create', ['model' => $model]);
	}

// 	action
	public function actionForm() {

		if ( isset($_POST['User']) ) {
			$user = $_POST['User'];
			$model = new UserLoginForm();
			$model->attributes = $user;
			if($model->validate() && $model->login()) {
				$this->redirect( array( 'profile') );
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

	public function actionResetMail() {
		/** @var  $model User */
		$model = new User();
		if ( isset($_POST['User']) ) {
			$user = $_POST['User'];
			$model->attributes = $user;
			if ( $model->checkEmail($user['email']) ) {
				$number = Yii::app()->params['lentPassword'];
				$newPassword = Yii::app()->getSecurityManager()->generateRandomString($number);
//				sendMail
				$args = array(
					'subject' => 'Lấy lại mật khẩu',
					'content' => 'Mật khẩu mới của bạn là: <span>'.$newPassword.'</span>',
					'mailTo' => $user['email'],
					'plainTextContent' => ''
				);
//				$result = 2 - Mail::sendMail($args);
				$result = 1;
				if ($result == 1) {
//					update password
					if ( $result = $model->resetPassword($user['email'], $newPassword) ) {
						$message = 'Kiểm tra mail để lấy mật khẩu mới ('.CHtml::tag('a', array('href' => 'https://mail.google.com/mail'), $user['email']).')';
					} else {
						$message = 'Quá trình lấy mật khẩu thất bại. Liên hệ admin để được hổ trợ';
					}
				} else {
					$message = 'Quá trình gửi mail đã thất bại. Liên hệ admin để được hổ trợ';
				}

				$this->render('info', ['message' => $message, 'type' => $result]);
				exit();
			}
			$model->addError('email', 'Email không tồn tại');
		}
		$this->render('resetMail', ['model' => $model]);
	}

	public function actionProfile() {
		/** @var  $model User */
		$model = new User();
		if ( !Yii::app()->user->isGuest ) {
			$model = $this->loadUser();
			if ( isset($_GET['action']) && isset($_POST['Profile']) && $_GET['action'] == 'profile' ) {
				$profile = $_POST['Profile'];
				if ( isset($profile['username']) && $profile['username']) {
					$model->username = $profile['username'];
				}
				$model->profile = json_encode($profile);
				$model->save();
			}

			$messagePasswrord = '';
			if ( isset($_GET['action']) && isset($_POST['Password']) && $_GET['action'] == 'password' ) {
				$password = $_POST['Password'];
				$is_check = 1;

				if (empty($password)) {
					$is_check = 0;
				}

				if ( $password['oldpassword'] == $model->password ) {
					$messagePasswrord = 'Mat khau khong dung';
					$is_check = 0;
				}

				if ($password['repassword'] != $password['password']) {
					$messagePasswrord = 'Khong trung mat khau';
					$is_check = 0;
				}

				if ($is_check) {
					if ($model->resetPassword($model->email, $password['password'])) {
						$messagePasswrord = 'Cap nhat thanh cong';
					}
				}
			}
			$this->render('profile', ['model' => $model, 'msgPassword' => $messagePasswrord]);
		}
	}

	public function actionFacebook() {
		$this->render('_facebookForm');
	}

	public function actionAjax() {
		if ( isset($_GET['action']) ) {
			switch ($_GET['action']) {
				case 'loginModal':
					if ( Yii::app()->user->isGuest ) {
						$model  = new User();
						$result = array( 'status' => 0 );
						if ( isset( $_POST['data'] ) ) {
							parse_str( $_POST['data'], $arr );
							$user              = $arr['User'];
							$model             = new UserLoginForm();
							$model->attributes = $user;
							if ( $model->validate() && $model->login() ) {
								$result['status'] = 1;
								$result['href']   = $this->createUrl( 'profile' );
								echo json_encode( $result );
								Yii::app()->end();
							}
						}
						$this->renderPartial( '_formLoginModal', array( 'model' => $model ) );
					}
					break;
				case 'registerModal':
					if ( Yii::app()->user->isGuest ) {
						$model  = new User();
						if ( isset( $_POST['data'] ) ) {
							parse_str( $_POST['data'], $arr );
							$user              = $arr['User'];
							$model->attributes = $user;
							$is_check = 1;
							if ( $user['password'] != $user['repassword'] ) {
								$is_check = 0;
								$model->addError('password', 'Mật khẩu không trùng');
							}

							if ( $model->checkEmail($model->email) ) {
								$is_check = 0;
								$model->addError('email', 'Email đã được dùng');
							}

							if ($is_check) {
								if ( $model->save() ) {
									$this->renderPartial('_successCreate', ['data' => $model]);
									Yii::app()->end();

								}
							}
						}
						echo $this->renderPartial( '_formRegisterModal', array( 'model' => $model ) );
					}
					break;
			}
		}
		Yii::app()->end();
	}
// 	extra

	public function loadUser($user_id = null) {
		if ( $user_id === null && !Yii::app()->user->isGuest ) {
			$user_id = Yii::app()->user->id;
		}
		$this->_model = Yii::app()->user->loadUser($user_id);
		return $this->_model;
	}
}