<?php
class Helper implements HelperTemplate {

	public static function getDirUpload() {
		$webroot = Yii::getPathOfAlias('webroot');
		$dirUpload = $webroot . '/uploads';
		if ( !is_dir($dirUpload) ) {
			mkdir($dirUpload);
		}
		return $dirUpload;
	}

	public static function getPathUpload() {
		return Yii::app()->request->baseUrl . '/uploads';
	}

	public static function UploadFile( $localFile, $newName ) {
		// TODO: Implement UploadFile() method.
		//			upload file
		if (!empty($localFile)) {
			$date=new DateTime(); //this returns the current date time
			$current_date = $date->format('Y-m-d');

			$file_path = '/' . $current_date;
			$dir = Helper::getDirUpload() . $file_path;
			if ( !is_dir($dir) ) {
				mkdir($dir);
			}

			$file_path .= '/' . $newName;
			$file = $dir . '/' . $newName;

			if ( !file_exists($file) ) {
				copy($localFile, $file);
			}

			if (file_exists($file)) {
				return $file_path;
			}
		}

		return '';
	}

	public static function getThumnailDefault() {
		return Helper::getPathUpload() . '/imgs/thumbnail-default.jpg';
	}

	public static function getFirstDateInWeek() {
		$i = 0;
		$w = 0;
		while($w != 1) {
			$i++;
			$w = (int) date('w', strtotime(date($i.'-m-Y')));
		}
		return $i;
	}

	public static function getDateInWeek($index=1) {
		$date = self::getFirstDateInWeek() + 7*($index-1);
		return $date;
	}

	public static function cutText($text, $length) {
		if (strlen($text) > $length ) {
			$text = substr($text, 0, $length). '...';
		}
		return $text;
	}

	public static function getLogo() {
		return CHtml::image(Yii::app()->request->BaseUrl . '/uploads/imgs/logo-1.png');
	}
}