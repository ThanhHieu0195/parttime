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
		$listCat = Category::model()->getOptionByParent();
		$catId = '';

		if ( isset($_GET['search']) ) {
			$userIds = User::findUsersLikeName($_GET['search']);
			if (empty($userIds)) {
				$userIds[] = User::USER_EMPTY;
			}
			$condition = 'author in ('.implode(',', $userIds).')';
		}

		if ( isset($_GET['cat']) && !empty($_GET['cat']) ) {
			$catId = $_GET['cat'];
			$listCCat = Category::model()->getOptionByParent($catId);
			/** @var  $command CDbCommand */
			$command = Yii::app()->db->createCommand()
				->select('id')
				->from('tbl_product')
				->where(array('in', 'category', array_keys($listCCat)));
			$products_id = $command->queryColumn();
//			not result
			if ( empty($products_id) ) {
				$products_id[] = self::PRODUCT_EMPTY;
			}
			if ( !empty($condition) ) {
				$condition .= ' and ';
			}
			$condition .= 'product in ('.implode(',', $products_id).')';
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
		$this->render('filterVote',array(
			'dataProvider'=>$dataProvider,
			'listCat' => $listCat,
			'catCurrent' => $catId
		));
	}

	public function actionAjax() {
		if ( isset( $_GET['action'] ) ) {
			switch ( $_GET['action'] ) {
				case 'voteModal':
					/** @var  $mProduct Product*/
					$product_id = $_GET['product_id'];
					$mProduct = Product::model()->findByPk($product_id);
					if ( !Yii::app()->user->isGuest ) {
						if (isset($_POST['data'])) {
							parse_str($_POST['data'], $arr);
							$data = $arr['Vote'];
							$data['product'] = $product_id;
							$mVote = new Vote();
							$mVote->attributes = $data;
							$result = $mVote->save();
							if ( $result ) {
								$this->renderPartial('_voteSuccess', [
									'code' => $mVote->code,
									'linkProduct' => $mProduct->getUrl()
								]);
							}else {
								$this->renderPartial('_voteFail');
							}
							exit();
						}
						$this->renderPartial('_modalVote', array(
							'product' => $mProduct
						));
					}
				break;
			}
		}
		exit;
	}
}