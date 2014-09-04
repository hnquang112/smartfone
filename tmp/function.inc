<div id="categories_block_left" class="block">
	<?php
		if(isset($_SESSION['uid'])){
			echo '<h4>Chức năng</h4>
    				<div class="block_content">
						<ul class="tree dynamized" style="display: block;">';
			if($_SESSION['uid']==1)
				echo '<li><a href="changepassword.php">Đổi mật khẩu</a></li>
					<li><a href="addproduct.php">Thêm sản phẩm</a></li>
					<li><a href="manageproduct.php">Quản lý sản phẩm</a></li>
					<li><a href="manageuser.php">Quản lý tài khoản</a></li>
					<li class="last"><a href="manageorders.php">Quản lý hóa đơn</a></li>';
			else
				echo '<li><a href="changepassword.php">Đổi mật khẩu</a></li>
					<li><a href="edituser.php">Đổi thông tin cá nhân</a></li>
					<li class="last"><a href="manageorders.php">Thông tin hóa đơn</a></li>';
		}
		else{
	?>
	<h4>SẢN PHẨM</h4>
	<div class="block_content">
		<ul class="tree dynamized" style="display: block;">
			<li><a title="" href="">Điện thoại</a></li>
			<li><a title="" href="">Phụ kiện (Sắp có)</a></li>
			<li class="last"><a title="" href="">Máy tính bảng (Sắp có)</a></li>
	<?php
		}
	?>
        </ul>
    </div><!--End .block_content-->
</div><!--End #categories-->