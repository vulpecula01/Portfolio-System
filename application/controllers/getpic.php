<?php 

	if (isset( $_GET['image'])) {
		$image =  $_GET['image'];
		if (empty($image))
		{
			$image = 'avatar.png';
		}
		$path = "/var/app/public/pic/{$image}";
		if (is_readable($path)) {
			$info = getimagesize($path);
			if ($info !== FALSE) {
				header("Content-type: {$info['mime']}");
				readfile($path);
				exit();
			}
		}

		/*echo $path; var_dump(file_exists($path)); exit();
		if(file_exists($path)) {
			if (is_readable($path)) {
				$info = getimagesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
			}
		} else {
			$path = "/home/thitaree/public_html/portfolio/application/uppic/avatar.png";
			if (is_readable($path)) {
				$info = getimagesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
			}
		}*/
	}
			
?>