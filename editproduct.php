<?php
	ob_start();
	$page_title='Trang sửa sản phẩm';
	include('tmp/header.inc');
	echo '<div id="center_column">';	
	require_once('tmp/connectdb.php');
	if(isset($_SESSION['uid']) && $_SESSION['uid']==1){
		$msp=$_GET['masp'];
		if(isset($_POST['submit'])){
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
				$query="update sanpham set tensp='".$tsp."', hangsx='".$hsx."', gia='".$gia."', mota='".$mt."' where masp='".$msp."'";
				mysql_query($query) or die('Không thể sửa thông tin sản phẩm');
				header("location: manageproduct.php");
				exit();
			}
		}
		$query="select * from sanpham where masp='".$msp."'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
?>
<body>
<form id="formSuaSanPham" method="post" action="">
	<fieldset>
    	<legend>Sửa sản phẩm</legend>
        	<label for="tensp">Tên sản phẩm:</label>
			<input type="text" name="tensp" id="tensp" required value="<?=$row['tensp']?>"/><br>
			<label for="hangsx">Hãng sản xuất:</label>
			<input type="text" name="hangsx" id="hangsx" required value="<?=$row['hangsx']?>"/><br>
			<label for="gia">Giá:</label>
        	<input type="text" name="gia" id="gia" required value="<?=$row['gia']?>"/><br>
			<label for="mota">Mô tả:</label>
			<textarea name="mota" id="mota" cols="50" rows="10" required><?=$row['mota']?></textarea><br>
			<input type="submit" name="submit" id="submit" value="Sửa" />
			<input type="reset" name="reset" id="reset" value="Xóa" />
	</fieldset>
</form>
<?php
	}		
	else
		echo '<p><font color="red">Bạn không có quyền xem trang này!</font></p>';
	echo '</div>';
	include('tmp/footer.inc');
?>