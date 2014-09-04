<?php
	$page_title='Trang đổi mật khẩu';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($_POST['submit'])){
    	require_once('tmp/connectdb.php');
		$message=NULL;
        if(empty($_POST['matkhau']))
			$mk=false;
		else
			$mk=escape_data($_POST['matkhau']);
		if(empty($_POST['matkhau2']))
			$mk2=false;
		else{
			if($_POST['matkhau2']==$_POST['matkhau3'])
				$mk2=escape_data($_POST['matkhau2']);
			else
				$mk2=false;
		}
		if($mk && $mk2){
			$query="select uid from khachhang where tendn='$_SESSION[tendn]' and matkhau='$mk'";
			$result=@mysql_query($query);
            $num=mysql_num_rows($result);
            if($num==1){
            	$row=mysql_fetch_array($result,MYSQL_NUM);
                $query="update khachhang set matkhau='$mk2' where uid=$row[0]";
                $result=@mysql_query($query);
                if(mysql_affected_rows()==1){
                	echo '<p><font color="green">Mật khẩu được đổi thành công</font></p>';
					echo '</div>';
					include('tmp/right_sidebar.inc');
                    include('tmp/footer.inc');
                    exit();
                }
                else
                	$message='<p>Có lỗi hệ thống!</p><p>'.mysql_error().'</p>';
            }
            else
            	$message='<p>Tên đăng nhập hoặc mật khẩu không đúng!</p>';
        	mysql_close();
		}
		else
			$message.='<p>Hãy thử lại</p>';
	}
	if(isset($message))
		echo '<font color="red">'.$message.'</font>';
?>
<body>
<form id="frmDoiMatKhau" method="post" action="">
	<fieldset>
    	<legend>Đổi mật khẩu</legend>
            <label for="matkhau">Mật khẩu cũ:</label>
			<input type="password" name="matkhau" id="matkhau" /><br>
            <label for="matkhau2">Mật khẩu mới:</label>
			<input type="password" name="matkhau2" id="matkhau2" /><br>
       		<label for="matkhau3">Nhập lại mật khẩu mới:</label>
			<input type="password" name="matkhau3" id="matkhau3"><br>
            <input type="submit" name="submit" id="submit" value="Nhập" />
       		<input type="reset" name="reset" id="reset" value="Xóa" />
     </fieldset>
</form>
<?php
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>