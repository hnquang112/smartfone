<?php
	$page_title='Trang xem sản phẩm';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	require_once('tmp/connectdb.php');
	$msp=$_GET['masp'];
	$sql="select * from sanpham where masp='".$msp."'";
	$query=mysql_query($sql);
	echo '<p>';
	while($row=mysql_fetch_array($query)){
		echo '<img width="300" height="266" align="left" alt="'.$row["tensp"].'" src="img/origin/'.$row["masp"].'.jpg"/>';
		echo '<h3>'.$row["tensp"].'</h3>';
		echo '<h4>'.number_format($row["gia"]).' VNĐ</h3>';
		echo '<p style="text-align:justify; width:450px;">'.$row["mota"].'</p>';
	}
	echo '</p></div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>