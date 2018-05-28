<?php 

	if (isset( $_GET['image'])) {
		$image =  $_GET['image'];
		$path = "/var/app/public/pic/{$image}";
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