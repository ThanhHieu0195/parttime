<?php
class SocialController extends Controller {
	public function actionLogin() {
		$model = new Social();
		if (isset($_POST) && !empty($_POST)) {
			$model->data = json_encode($_POST);
			$model->save();
		}

		if (isset($_GET) && !empty($_GET)) {
			$model->data = json_encode($_GET);
			$model->save();
		}

		if (isset($_GET['session'])) {
			echo json_encode($_GET);
			exit();
		}
		$this->render('login');
	}
}