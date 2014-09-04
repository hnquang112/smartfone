<?php
	ob_start();
	$page_title='Trang xóa sản phẩm';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';	
	require_once('tmp/connectdb.php');
	if(isset($_SESSION['uid']) && $_SESSION['uid']==1){
		$msp=$_GET['masp'];
		if(isset($_POST['ok'])){
			$sql="delete from sanpham where masp='".$msp."'";
			mysql_query($sql);
			header("location: manageproduct.php");
			exit();
		}
?>
<form method="post" id="confirm" action="">
	Bạn có muốn xóa sản phẩm này không?<br>
    <input name="ok" id="ok" type="submit" value="Đồng ý">
    <input type="reset" name="rst" id="rst" value="Hủy">
</form>
<?php
	}		
	else
		echo '<p><font color="red">Bạn không có quyền xem trang này!</font></p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>