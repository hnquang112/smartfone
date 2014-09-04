<?php
	$page_title='Trang đăng ký';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($_POST['submit'])){
		require_once('tmp/connectdb.php');
		$message=NULL;
		if(empty($_POST['tendangnhap']))
			$tdn=false;
		else
			$tdn=escape_data($_POST['tendangnhap']);
		if(empty($_POST['matkhau']))
			$mk=false;
		else{
			if($_POST['matkhau']==$_POST['matkhau2'])
				$mk=escape_data($_POST['matkhau']);
			else
				$mk=false;
		}	
		if(empty($_POST['hoten']))
			$ht=false;
		else
			$ht=escape_data($_POST['hoten']);
		if(empty($_POST['email']))
			$em=false;
		else
			$em=escape_data($_POST['email']);
		$dt=escape_data($_POST['sdt']);
		$cm=escape_data($_POST['cmnd']);
		$dc=escape_data($_POST['diachi']);
		if($tdn && $mk && $ht && $em){
			$query="insert into khachhang (tendn,matkhau,hoten,email,sdt,cmnd,diachi) values ('$tdn','$mk','$ht','$em','$dt','$cm','$dc')";
			$result=@mysql_query($query);
			if(mysql_affected_rows()==1){
				echo '<p><font color="green">Bạn đã đăng ký thành công</font></p>';
				echo '</div>';
				include('tmp/right_sidebar.inc');
				include('tmp/footer.inc');
				exit();
			}
			else{
				$message='<p>Đăng ký bị lỗi</p><p>'.mysql_error().'</p>';
			}
			mysql_close();
		}
		else{
			$message.='<p>Hãy thử lại'.mysql_error().'</p>';
		}
	}
	if(isset($message)){
		echo '<font color="red">'.$message.'</font>';
	}
?>
<form id="frmThemThanhVien" method="post" action="">
	<script language="javascript" type="text/javascript" src="tmp/ajax.js"></script>
	<fieldset>
		<legend>Nhập thông tin cá nhân</legend>
            <label id="first" for="tendangnhap">Tên đăng nhập (*): </label>
            <input type="text" name="tendangnhap" id="tendangnhap" required="required" onkeyup="goTest(this.value)" />
            <p id="alert">&nbsp;</p>
            <label for="matkhau">Mật khẩu (*): </label>
            <input type="password" name="matkhau" id="matkhau" required="required" /><br>
            <label for="matkhau2">Nhập lại mật khẩu (*): </label>
            <input type="password" name="matkhau2" id="matkhau2" required="required" /><br>
            <label for="hoten">Họ tên (*): </label>
            <input type="text" name="hoten" id="hoten" required="required" /><br>
            <label for="email">E-mail (*): </label>
            <input type="text" name="email" id="email" required="required" /><br>
            <label for="sdt">Số điện thoại: </label>
            <input type="text" name="sdt" id="sdt" required="required" /><br>
            <label for="cmnd">Số CMND: </label>
            <input type="text" name="cmnd" id="cmnd" required="required" /><br>
            <label for="diachi">Địa chỉ: </label>
            <textarea name="diachi" id="diachi" cols="21" rows="3"></textarea><br>
            <input type="submit" name="submit" id="submit" value="Đăng ký" />
            <input type="reset" name="reset" id="reset" value="Xóa" />
  </fieldset>
</form>
<?php
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>