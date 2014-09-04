<?php
	ob_start();
	if(isset($_SESSION['uid']))
		header("location: profile.php");
	if(isset($_POST['submit'])){
    	require_once('tmp/connectdb.php');
        $message=NULL;
		if(empty($_POST['tendangnhap']))
			$tdn=false;
		else
			$tdn=escape_data($_POST['tendangnhap']);
		if(empty($_POST['matkhau']))
			$mk=false;
		else
			$mk=escape_data($_POST['matkhau']);
		if($tdn && $mk){
			$query="select uid,hoten from khachhang where tendn='$tdn' and matkhau='$mk'";
			$result=@mysql_query($query);
			$row=mysql_fetch_row($result);
			if($row){
				session_register("hoten");
				session_register("uid");
				session_register("tendn");
				$_SESSION['hoten']=$row[1];
				$_SESSION['uid']=$row[0];
				$_SESSION['tendn']=$tdn;
				/*setcookie('hoten',$row[1],time()+3600,'/','',0);
				setcookie('uid',$row[0],time()+3600,'/','',0);*/
				//header("Location: http://".$_SERVER['HTTP_POST'].dirname($_SERVER['PHP_SELF'])."/loggedin.php");<?php echo $_SERVER['PHP_SELF'];
				if($_SESSION['uid']==1)
					header("Location: profile.php");
				else
					header("Location: index.php");
			}
			else
				$message='<p>Sai tên đăng nhập hoặc mật khẩu</p>';
			mysql_close();
		}
		else
			$message.='<p>Hãy thử lại</p>';
    }
	$page_title='Trang đăng nhập';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($message))
		echo '<font color="red">'.$message.'</font>';
?>
<form id="formDangNhap" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<fieldset>
    	<legend>Đăng nhập</legend>
            <p>
                <label for="tendangnhap">Tên đăng nhập:</label>
                <input type="text" name="tendangnhap" id="tendangnhap" size="20" maxlength="20" required="required" value="<?php if(isset($_SESSION['tendn'])) echo $_SESSION['tendn']; ?>"/><br>
                <label for="matkhau">Mật khẩu:</label>
                <input type="password" name="matkhau" id="matkhau" required="required" /><br>
                <input type="submit" name="submit" id="submit" value="Nhập" />
                <input type="reset" name="reset" id="reset" value="Xóa" />
            </p>
            <p>Bạn chưa có tài khoản, hãy <a href="register.php">đăng ký</a> ngay</p>
	</fieldset>    
</form>
<?php
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>