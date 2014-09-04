<?php
	$page_title='Kết quả tìm kiếm';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	require_once('tmp/connectdb.php');
	echo '<div id="center_column">';
	if(isset($_GET['keyword']) and !empty($_GET['keyword'])){
		$searchterm = escape_data($_GET['keyword']);
		$query = "select * from sanpham where 1=1 and tensp like '%".$searchterm."%'";
		$result=mysql_query($query);
		$row=0;
		if($result!=null){
			echo '<p><table border="0" cellpadding="0" cellspacing="0">';
			$numrow=mysql_num_rows($result);
			while($row=mysql_fetch_array($result)){
				echo '<tr>';
				echo '<td><img rowspan="2" width="130px" height="116" alt="'.$row["tensp"].'" src="img/thumbnail/'.$row["masp"].'.jpg"/></td>';
				echo '<td><a href="viewproduct.php?masp='.$row["masp"].'"><h3>'.$row["hangsx"].' '.$row["tensp"].'</h3></a><h4>Giá: '.number_format($row["gia"]).' VNĐ</h4>';
				echo $row["mota"].'<br>&nbsp;&nbsp;&nbsp;<a href="addcart.php?item='.$row["masp"].'">Thêm vào giỏ</a></td></tr>';
			}
			echo '</table></p>';
			echo '<p align="right">Tìm thấy '.$numrow.' sản phẩm</p>';
		}
		else
			echo '<p>Không tìm thấy sản phẩm thỏa mãn</p>';
	}
	else
		echo '<p>Mời nhập từ khóa</p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>