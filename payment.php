<?php
	$page_title='Thanh toán';
	include("tmp/header.inc");
	include('tmp/left_sidebar.inc');
	echo '<div id="center_column">';
?>
<p align="center">
Ghi hóa đơn hoàn tất.<br />
Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!
Hãy chọn hình thức thanh toán:<br>
<a href="http://paypal.com"><img width="150px" src="img/paypal.jpg"></a>
<a href="http://nganluong.vn"><img width="150px" src="img/nl.jpg"></a>
</p>
<?php
	echo '</div>';
	include('tmp/right_sidebar.inc');
	include("tmp/footer.inc");
?>