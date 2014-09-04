<?php
	ob_start();
	$page_title='Trang xóa tài khoản';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';	
	require_once('tmp/connectdb.php');
	if(isset($_SESSION['uid']) && $_SESSION['uid']==1){
		$tdn=$_GET['tendn'];
		if(isset($_POST['ok'])){
			$query="delete from khachhang where tendn='".$tdn."'";
			mysql_query($query) or die('Không thể xóa tài khoản');
			header("location: manageuser.php");
			exit();
		}
?>
<form method="post" id="confirm" action="">
	Bạn có muốn xóa tài khoản <?=$tdn?> không?<br>
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