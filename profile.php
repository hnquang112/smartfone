<?php
	ob_start();
	if(!isset($_SESSION['uid'])){
		header("Location: index.php");
		exit();
	}
	$page_title='Trang tài khoản';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';	
	echo '<p><font color="green">Tài khoản của '.$_SESSION['hoten'].'</font>&nbsp;&nbsp;&nbsp;<a href="logout.php">Thoát</a></p>';
	if($_SESSION['uid']==1)
		echo '<p><a href="changepassword.php">Đổi mật khẩu</a> | <a href="addproduct.php">Thêm sản phẩm</a> | <a href="manageproduct.php">Quản lý sản phẩm</a> | <a href="manageuser.php">Quản lý tài khoản</a> | <a href="manageorders.php">Quản lý hóa đơn</a></p>';
	else
		echo '<p><a href="changepassword.php">Đổi mật khẩu</a> | <a href="edituser.php">Đổi thông tin cá nhân</a> | <a href="manageorders.php">Thông tin hóa đơn</a></p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>