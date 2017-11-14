<?php
class VoteController extends Controller {
	const PRODUCT_EMPTY = -1;

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
			array('allow',
				'actions' => array('index', 'ajax'),
				'users' => array('*')
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
		if ( isset($_GET['product_id']) ) {
			$product_id = $_GET['product_id'];
			$product = Product::model()->findByPk($product_id);
			$model = Vote::model();
			$this->render('create', ['model' => $model, 'product' => $product]);
		}
	}

	public function actionListvote() {
		$criteria=new CDbCriteria(array(
			'condition' => 'author='.Yii::app()->user->id,
			'order'=>'id DESC',
		));

		$dataProvider=new CActiveDataProvider('Vote', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));
		$this->render('listvote',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionIndex() {
		$condition = '';
		if ( isset($_GET['cat']) ) {
			$id_cat = $_GET['cat'];
			/** @var  $command CDbCommand */
			$command = Yii::app()->db->createCommand()
				->select('id')
				->from('tbl_product')
				->where('category=:category', array(
					':category' => $id_cat
				));
			$products_id = $command->queryColumn();

//			not result
			if ( empty($products_id) ) {
				$products_id[] = self::PRODUCT_EMPTY;
			}

			$condition = 'product in ('.implode(',', $products_id).')';
		}

		$criteria=new CDbCriteria(array(
			'condition' => $condition,
			'order'=>'id DESC',
		));

		$dataProvider=new CActiveDataProvider('Vote', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));
		$this->render('listvote',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAjaxForm() {
		if ( !Yii::app()->user->isGuest && isset($_POST['action']) ) {
			$action = $_POST['action'];
			switch ($action) {
				case 'createVote':
					if ( isset($_POST['data']) ) {
						$data = $_POST['data'];
						$model = new Vote();
						$model->attributes = $data;
						$result = $model->save();
						if ( $result ) {
							echo $this->renderPartial('_createSuccess', ['code' => $model->code]);
						}else {
							echo $this->renderPartial('_createFail');
						}
					}
				break;
			}
		}
		exit();
	}

	public function actionAjax() {
		if ( isset( $_GET['action'] ) ) {
			switch ( $_GET['action'] ) {
				case 'voteModal':
					$product_id = $_GET['product_id'];
					$model = Product::model()->findByPk($product_id);
					if ( !Yii::app()->user->isGuest ) {
						$result['status'] = 1;
						$result['html'] = $this->renderPartial('_modalVote', array(
							'product' => $model
						));
					}
				break;
			}
		}
		exit;
	}
}