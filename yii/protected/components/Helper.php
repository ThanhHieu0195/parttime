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

	public static function UploadFile( $localFile, $newName ) {
		// TODO: Implement UploadFile() method.
		//			upload file
		$date=new DateTime(); //this returns the current date time
		$current_date = $date->format('Y-m-d');

		$file_path = '/uploads/' . $current_date;
		$dir = Helper::getDirUpload() . $file_path;

		if ( !is_dir($dir) ) {
			mkdir($file_path);
		}

		$file_path .= '/' . $newName;
		$file = $dir . '/' . $newName;
		if ( !file_exists($file) ) {
			copy($localFile, $file);
		}

		if (file_exists($file)) {
			return $file_path;
		}

		return '';
	}
}