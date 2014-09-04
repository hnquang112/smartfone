<?php
	require_once('tmp/connectdb.php');
	if(isset($_POST[["q"])){
		$sql="select * from khachhang where tendn='".$_GET["q"]."'";
		$result=mysql_query($sql,$conn);
		if($result)
			echo 'ban co the su dung ten dang nhap nay';
		else
			echo 'ten dang nhap nay da ton tai';
?>