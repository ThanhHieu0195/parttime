<?php

class WebUser extends CWebUser {
	private $_model;

	public function isAdmin() {
		return $this->can(User::ROLE_ADMIN);
	}

	public function isMember() {
		return $this->can(User::ROLE_MEMBER);
	}

	public function isGuest() {
		if (\Yii::app()->user->isGuest) {
			return true;
		}
		return false;
	}

	// Load user model.
	public function loadUser($id=null)
	{
		if ( $id == null ) {
			$id = Yii::app()->user->id;
		}

		if($this->_model===null)
		{
			if($id!==null)
				$this->_model=User::model()->findByPk($id);
		}

		return $this->_model;
	}

	public function can($permissionName, $params = [], $allowCaching = true)
	{
		$user = $this->loadUser();
		$access = false;
		do {
			if (\Yii::app()->user->isGuest) {
				break;
			}

			if ($user->role == User::ROLE_ADMIN) {
				$access = true;
				break;
			}

			if (is_array($permissionName))  {
				$access = in_array($user->role, $permissionName);
			} else {
				$access = $permissionName == $user->role;
			}
		} while (false);
		return $access;
	}
}