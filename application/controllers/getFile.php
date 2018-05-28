<?php 

	if (isset( $_GET['file'])) {
		$file =  $_GET['file'];
		$path = "/var/app/public/file/{$file}";
		if (is_readable($path)) {
			$info = getimagesize($path);
			if ($info !== FALSE) {
				header("Content-type: {$info['mime']}");
				readfile($path);
				exit();

			}
		}
	}
			
?>

