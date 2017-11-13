<?php
class FacebookController extends Controller {
	public function actionLogin() {
		if (isset($_GET['session'])) {
			echo json_encode($_GET);
			exit();
		}
		$this->render('login');
	}
}