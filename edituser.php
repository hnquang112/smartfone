<?php
	ob_start();
	$page_title='Trang sửa thông tin tài khoản';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	require_once('tmp/connectdb.php');
	echo '<div id="center_column">';
	if(isset($_SESSION['uid'])){
		if($_SESSION['uid']==1)
			$tdn=$_GET['tendn'];
		else
			$tdn=$_SESSION['tendn'];
		if(isset($_POST['submit'])){
			if(empty($_POST['hoten']))
				$ht=false;
			else
				$ht=escape_data($_POST['hoten']);
			if(empty($_POST['sdt']))
				$dt=false;
			else
				$dt=escape_data($_POST['sdt']);
			if(empty($_POST['email']))
				$em=false;
			else
				$em=escape_data($_POST['email']);
			if(empty($_POST['cmnd']))
				$cm=false;
			else
				$cm=escape_data($_POST['cmnd']);
			if(empty($_POST['diachi']))
				$dc=false;
			else
				$dc=escape_data($_POST['diachi']);
			if($ht && $dt && $em && $cm && $dc){
				$query="update khachhang set hoten='$ht', email='$em', sdt='$dt', cmnd='$cm', diachi='$dc' where tendn='$tdn'";
				mysql_query($query) or die(mysql_error());
				header("location: manageuser.php");
				exit();
			}
		}
		$query='select * from khachhang where tendn="'.$tdn.'"';
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
?>
<body>
<form id="formSuaTaiKhoan" method="post" action="">
	<fieldset>
    	<legend>Sửa thông tin tài khoản</legend>
        	Tài khoản: <strong><?=$row['tendn']?></strong><br>
			<label for="hoten">Họ tên:</label>
			<input type="text" name="hoten" id="hoten" required value="<?=$row['hoten']?>"/><br>
			<label for="email">e-Mail:</label>
        	<input type="text" name="email" id="email" required value="<?=$row['email']?>"/><br>
			<label for="sdt">SĐT:</label>
			<input type="text" name="sdt" id="sdt" required value="<?=$row['sdt']?>"/><br>
            <label for="cmnd">CMND:</label>
        	<input type="text" name="cmnd" id="cmnd" required value="<?=$row['cmnd']?>"/><br>
            <label for="diachi">Địa chỉ:</label>
        	<input type="text" name="diachi" id="diachi" required value="<?=$row['diachi']?>"/><br>
            <input type="submit" name="submit" id="submit" value="Sửa" />
			<input type="reset" name="reset" id="reset" value="Xóa" />
	</fieldset>
</form>
<?php
	}		
	else
		echo '<p><font color="red">Bạn không có quyền xem trang này!</font></p>';
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>