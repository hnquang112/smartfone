<?php
	@session_start();
	$page_title='Trang quản lý sản phẩm';
    include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($_SESSION['uid']) && $_SESSION['uid']==1){
		echo'<table id="manage_table" border="1" width="100%">
            <tr id="title_row">
                <td>PID</td>
                <td>Tên sản phẩm</td>
                <td>Hãng sản xuất</td>
                <td>Giá</td>
                <td>Mô tả</td>
                <td colspan="2"></td>
            </tr>';
		require_once('tmp/connectdb.php');
		$display=8;
		//Tinh so trang
		function tong_so_trang($display){
			$query='select count(*) from sanpham';
			$result=mysql_query($query);
			$rows=mysql_fetch_row($result);
			$so_trang=ceil($rows[0]/$display);
			return $so_trang;
		}
		//Tinh start
		if(@$_GET['trang']==""){
			$start=0;
			$_GET['trang']=1;
		}
		else
			$start=($_GET['trang']-1)*$display;
		$so_trang=tong_so_trang($display);
		
		$query="select * from sanpham order by masp ASC limit $start,$display";
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if($num=="")
			echo "<tr><td colspan=5 align=center>Không có sản phẩm nào trong CSDL</td></tr>";
		else{
			echo '<p>Có tất cả '.$num.' sản phẩm trong CSDL<p>';
			while($row=mysql_fetch_array($result)){
				echo "<tr>";
				echo "<td>$row[masp]</td>";
				echo "<td>$row[tensp]</td>";
				echo "<td>$row[hangsx]</td>";
				echo "<td>$row[gia] VNĐ</td>";
				echo "<td>$row[mota]</td>";
				echo "<td><a href=editproduct.php?masp=$row[masp]>Sửa</a></td>";
				echo "<td><a href=delproduct.php?masp=$row[masp]>Xóa</a></td>";
				echo "</tr>";
			}
		}
    	echo '</table>';
		//Hien thi link phan trang
		echo '<p align="right">';
		if($so_trang>1){
			$next = $start + $display;
			$prev = $start - $display;
			//First
			if($_GET['trang']>1) {
				$page = 1;
				echo '<a href="?manageproduct.php&start='.$prev.'&trang='.$page.'"><<</a>&nbsp;&nbsp;';
			}
			//Pre    
			if($_GET['trang'] !=0&&$_GET['trang'] !=1) {
				$page = $_GET['trang']-1;
				echo '<a href="?manageproduct.php&start='.$prev.'&trang='.$page.'"><</a>&nbsp;&nbsp;';
			}
			//Numeric
			for($i=1;$i<=$so_trang;$i++){
				if($_GET['trang'] !=$i){
					$link="?manageproduct.php&start=$display*($i-1)&trang=$i";
					echo "<a href=$link>$i</a>&nbsp;&nbsp;";   
				}  
				else{ 
					echo "<font style='font-weight: bold;' color= blue>";
					echo "<id='current'>$i&nbsp;&nbsp;";
					echo "</font>";
				}           
			}
			//Next
			if($_GET['trang'] !=$so_trang) {
				$page = $_GET['trang']+1;
				echo '<a href="?manageproduct.php&start='.$next.'&trang='.$page.'">></a>&nbsp;&nbsp;';
			}
			//Last
			if($_GET['trang']<$so_trang) {
				$page = $so_trang;
				echo '<a href="?manageproduct.php&start='.$prev.'&trang='.$page.'">>></a>&nbsp;&nbsp;';
			}
		}
		echo '</p>';
	}
	else
		echo '<p><font color="red">Bạn không có quyền xem trang này!</font></p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
    include('tmp/footer.inc');
?>