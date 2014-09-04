<?php
	ob_start();
	$page_title='Trang xóa hóa đơn';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';	
	require_once('tmp/connectdb.php');
	if(isset($_SESSION['uid'])){
		$mhd=$_GET['mahd'];
		if(isset($_POST['ok'])){
			if($_SESSION['uid']==1)
				$query="delete from hoadon where mahd='$mhd'";
			else
				$query='delete from hoadon where mahd="'.$mhd.'" and tendn="'.$_SESSION['tendn'].'"';
			mysql_query($query) or die(mysql_error());
			header("location: manageorders.php");
			exit();
		}
?>
<form method="post" id="confirm" action="">
	Bạn có muốn xóa hóa đơn này không?<br>
    <input name="ok" id="ok" type="submit" value="Đồng ý">
    <input type="reset" name="reset" id="reset" value="Hủy">
</form>
<?php
	}		
	else
		echo '<p><font color="red">Bạn không có quyền xem trang này!</font></p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>