<?php
	$page_title='Trang thêm sản phẩm';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($_SESSION['uid']) && $_SESSION['uid']==1){
		if(isset($_POST['submit'])){
			require_once('tmp/connectdb.php');
			$message=NULL;
			if(empty($_POST['tensp']))
				$tsp=false;
			else
				$tsp=escape_data($_POST['tensp']);
			if(empty($_POST['hangsx']))
				$hsx=false;
			else
				$hsx=escape_data($_POST['hangsx']);
			if(empty($_POST['gia']))
				$gia=false;
			else
				$gia=escape_data($_POST['gia']);
			if(empty($_POST['mota']))
				$mt=false;
			else
				$mt=escape_data($_POST['mota']);
			if($tsp && $hsx && $gia && $mt){
				require_once('tmp/connectdb.php');
				$query="insert into sanpham (tensp,hangsx,gia,mota) values ('$tsp','$hsx','$gia','$mt')";
				$result=@mysql_query($query);
				if($result)
					echo '<p><font color="green">Bạn đã thêm 1 sản phẩm thành công!</font></p>';
				else
					$message='<p>Quá trình nhập sản phẩm bị lỗi:</p><p>'.mysql_error().'</p>';
				mysql_close();
			}
			else
				$message.='<p>Hãy thử lại sau!</p>';
		}
		if(isset($message))
			echo '<font color="red">'.$message.'</font>';
?>
<body>
<p><h1 align="center">THÊM SẢN PHẨM</h1></p>
<form id="formThemSanPham" method="post" action="">
	<fieldset>
    	<legend>Thêm mới sản phẩm</legend>
        	<label id="first" for="tensp">Tên sản phẩm:</label>
			<input type="text" name="tensp" id="tensp" required /><br>
			<label for="hangsx">Hãng sản xuất:</label>
			<input type="text" name="hangsx" id="hangsx" required /><br>
			<label for="gia">Giá:</label>
        	<input type="text" name="gia" id="gia" required /><br>
			<label for="mota">Mô tả:</label>
			<textarea name="mota" id="mota" cols="30" rows="10" required></textarea><br>
			<input type="submit" name="submit" id="Thêm" value="Thêm" />
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