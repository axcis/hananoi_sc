<?php
	$notice_name = $_POST['notice_name'];
	$notice_detail = $_POST['notice_detail'];
	$published_date = $_POST['published_date'];
	$password = $_POST['password'];
	
	if ($notice_name == '' || $notice_detail == '' || $published_date == '') {
		header('Location: error.html');
		return;
	}
	if (mb_strlen(trim($notice_name)) > 50) {
		header('Location: error.html');
		return;
	}
	
	if ($password != 'admin0001') {
		header('Location: error.html');
		return;
	}
	
	try {
		//TODO: 環境に合わせて適宜変更する
		$db = new PDO("mysql:host=localhost;dbname=hananoi", "root", "daw2ghuc");
		$db->query("SET NAMES UTF8");
		
		$date = date('Y-m-d');
		
		$sql = "INSERT INTO notice (notice_name, notice_detail, regist_date, published_date) VALUES ('$notice_name', '$notice_detail', '$date', '$published_date');";
		
		$result = $db->query($sql);
		
		if ($result === false) {
			header('Location: error.html');
			return;
		}
		
		header('Location: result.html');
		
	} catch (Exception $e) {
		header('Location: error.html');
	}
?>