<?php
	@session_start();
	$page_title='Trang quản lý hóa đơn';
    include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($_SESSION['uid'])){
		if($_SESSION['uid']==1)
			$query="select * from hoadon inner join sanpham on hoadon.masp=sanpham.masp";
		else
			$query='select * from hoadon inner join sanpham on hoadon.masp=sanpham.masp where tendn="'.$_SESSION['tendn'].'"';
		echo'<table id="manage_table" border="1" width="100%">
            <tr id="title_row">
				<td>OID</td>
				<td>Ngày đặt hàng</td>';
		if($_SESSION['uid']==1)
			echo '<td>Tên đăng nhập</td>';
		echo '<td>Tên sản phẩm</td>
				<td>Đơn giá</td>
				<td>Số lượng</td>
				<td>Thành tiền</td>
				<td>&nbsp;</td>
			</tr>';
		require_once('tmp/connectdb.php');
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if($num=="")
			echo "<tr><td colspan=7 align=center>Không có hóa đơn nào trong CSDL</td></tr>";
		else{
			echo '<p>Có tất cả '.$num.' hóa đơn trong CSDL<p>';
			while($row=mysql_fetch_array($result)){
				echo "<tr>";
				echo "<td>$row[mahd]</td>";
				echo "<td>$row[ngaymua]</td>";
				if($_SESSION['uid']==1)
					echo "<td>$row[tendn]</td>";
				echo "<td>$row[tensp]</td>";
				echo '<td>'.number_format($row["gia"]).' VNĐ</td>';
				echo "<td>$row[soluong]</td>";
				echo '<td>'.number_format($row["gia"]*$row["soluong"]).' VNĐ</td>';
				echo "<td><a href=delorder.php?mahd=$row[mahd]>Xóa</a></td>";
				echo "</tr>";
			}
		}
		echo '</table>';
	}
	else
		echo '<p><font color="red">Bạn không có quyền xem trang này!</font></p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
    include('tmp/footer.inc');
?>