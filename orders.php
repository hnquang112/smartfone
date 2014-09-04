<?php
	ob_start();
	$page_title='Đặt hàng';
	include("tmp/header.inc");
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(!isset($_SESSION['uid']))
		header('location: login.php');
	else{
		
	}
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include("tmp/footer.inc");
?>