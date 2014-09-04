<?php
	@session_start();
	$page_title='Trang quản lý tài khoản';
	include("tmp/header.inc");
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($_SESSION['uid']) && $_SESSION['uid']==1){
		echo'<table id="manage_table" border="1" width="100%">
            <tr id="title_row">
                <td>UID</td>
                <td>Tên khách hàng</td>
                <td>Tên đăng nhập</td>
				<td>Loại tài khoản</td>
                <td>e-Mail</td>
				<td>SĐT</td>
				<td>Địa chỉ</td>
                <td colspan="2"></td>
            </tr>';
		require_once('tmp/connectdb.php');
		$query="select * from khachhang order by uid ASC";
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if($num=="")
			echo '<tr><td colspan=5 align="center">Không có tài khoản nào trong CSDL</td></tr>';
		else{
			echo '<p>Có tất cả '.$num.' tài khoản trong CSDL<p>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>';
				echo "<td>$row[uid]</td>";
				echo "<td>$row[hoten]</td>";
				echo "<td>$row[tendn]</td>";
				if($row['uid']==1)
					echo "<td>Quản trị</td>";
				else
					echo "<td>Tài khoản thường</td>";
				echo "<td>$row[email]</td>";
				echo "<td>$row[sdt]</td>";
				echo "<td>$row[diachi]</td>";
				echo "<td><a href=edituser.php?tendn=$row[tendn]>Sửa</a></td>";
				echo "<td><a href=deluser.php?tendn=$row[tendn]>Xóa</a></td>";
				echo "</tr>";
			}
		}
    	echo '</table>';
	}
	else
		echo '<p><font color="red">Bạn không có quyền xem trang này!</font></p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include("tmp/footer.inc");
?>