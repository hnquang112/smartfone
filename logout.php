<?php
	/*session_name('yourID');
	session_start();
	ob_start();
	if(isset($_SESSION['hoten'])){
		header("Location: index.php");
		exit();
	}
	else{
		$_SESSION=array();
		session_destroy();
	}*/
	session_destroy();
	$page_title='Đăng xuất';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';	
	echo '<p><font color="green">Bạn đã đăng xuất</font></p>';
	echo '<p><a href="login.php">Đăng nhập lại</a> | <a href="index.php">Về trang chủ</a>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>