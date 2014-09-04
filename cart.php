<?php
	ob_start();
	$page_title='Giỏ hàng';
	include("tmp/header.inc");
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
	if(isset($_POST['submit'])){
		foreach($_POST['qty'] as $key=>$value){
			if(($value <= 0) and (is_numeric($value)))
				unset($_SESSION['cart'][$key]);
			elseif(($value > 0) and (is_numeric($value)))
				$_SESSION['cart'][$key]=$value;
		}
		header("location: cart.php");
	}
	if(isset($_POST['order'])){
		if(!isset($_SESSION['tendn']))
			header("location: login.php");
		else{
			require_once('tmp/connectdb.php');
			foreach($_SESSION['cart'] as $key=>$value)
				$item[]=$key;
			$str=implode(",",$item);
			require_once("tmp/connectdb.php");
			$query="select * from sanpham where masp in ($str)";
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				$query='insert into hoadon (tendn,masp,soluong,ngaymua) values ("'.$_SESSION["tendn"].'","'
				.$row["masp"].'","'.$_SESSION['cart'][$row["masp"]].'",now())';
				mysql_query($query) or die(mysql_error());
				if(mysql_affected_rows()==1)
					header('location: payment.php');
			}
		}
	}	
	$ok=1;
	if(isset($_SESSION['cart']))
		foreach($_SESSION['cart'] as $k => $v)
			if(isset($k))
				$ok=2;
	if($ok == 2){
		echo '<form id="form_cart" action="cart.php" method="post">';
		foreach($_SESSION['cart'] as $key=>$value)
			$item[]=$key;
		$str=implode(",",$item);
		require_once("tmp/connectdb.php");
		$query="select * from sanpham where masp in ($str)";
		$result=mysql_query($query);
		$total=0;
		$sl=0;
		while($row=mysql_fetch_array($result)){
			echo '<div class="excluse">';
			echo '<h3>'.$row["hangsx"].' '.$row["tensp"].'</h3>';
			echo 'Đơn giá: '.number_format($row["gia"]).' VNĐ<br>';
			echo "<p align='right'>Số lượng: <input type='text' name='qty[$row[masp]]' size='5' value='{$_SESSION['cart'][$row['masp']]}'> - ";
			echo '<a href="delcart.php?id='.$row["masp"].'">Xóa sản phẩm này</a></p>';
			echo '<p align="right">Giá: '.number_format($_SESSION['cart'][$row["masp"]]*$row["gia"]).' VNĐ</p>';
			echo '</div>';
			$total+=$_SESSION['cart'][$row["masp"]]*$row["gia"];
			$sl+=$_SESSION['cart'][$row["masp"]];
		}
		echo '<div align="right">';
		echo '<b>Tổng cộng: <font color="red">'. number_format($total).' VNĐ</font></b>';
		echo '</div>';
		echo '<input type="submit" name="submit" value="Cập nhật giỏ hàng">';
		if($sl<=10)
			echo '<input type="submit" name="order" value="Ghi hóa đơn & Thanh toán">';
		else
			echo '<div align="center">Giỏ hàng của bạn đã vượt quá 10 sản phẩm! Bạn không thể xuất hóa đơn không quá 10 sản phẩm.</div>';
		echo '<div align="right">';
		echo '<b><a href="index.php">Tiếp tục mua hàng</a> - <a href="delcart.php?id=0">Xóa toàn bộ giỏ hàng</a></b>';
		echo '</div>';	
	}
	else{
		echo '<div>';
		echo '<p align="center">Bạn không có sản phẩm nào trong giỏ hàng<br><a href="index.php">Tiếp tục xem sản phẩm</a></p>';
		echo '</div>';
	}
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include("tmp/footer.inc");
?>