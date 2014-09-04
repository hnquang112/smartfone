<?php
	$page_title='Trang chủ';
	include('tmp/header.inc');
	include('tmp/left_sidebar.inc');
?>
<div id="center_column">
    <script src="jquery.roundabout.min.js" type="text/javascript"></script>
    <script src="main.js" type="text/javascript"></script>
    <div id="featured-products_block_center" class="block products_block">
        <h4>SẢN PHẨM NỔI BẬT</h4>
        <div class="block_content">
            <?php
                require_once('tmp/connectdb.php');
				$display=12;
                //Tinh so trang
                function tong_so_trang($display){
					if(@$_GET['hang']=='')
						$query='select count(*) from sanpham';
					else{
						$hang=$_GET['hang'];
						$query='select count(*) from sanpham where hangsx="'.$hang.'"';
					}
                    $result=mysql_query($query);
                    $rows=mysql_fetch_row($result);
                    $so_trang=ceil($rows[0]/$display);
                    return $so_trang;
                }
                //Tinh start
                if(@$_GET['trang']==""){
                    $start=0;
                    $_GET['trang']=1;
                }
                else
                    $start=($_GET['trang']-1)*$display;
                $so_trang=tong_so_trang($display);
				
				if(@$_GET['hang']=='')
					$query="select masp,tensp,hangsx,gia from sanpham order by masp asc limit $start,$display";
				else{
					$hang=$_GET['hang'];
					$query='select masp,tensp,hangsx,gia from sanpham where hangsx="'.$hang.'" order by masp asc limit '.$start.','.$display.'';
				}
				
                $result=@mysql_query($query);
                if(mysql_num_rows($result)!=""){
                    $i=0;
                    echo '<table width="555" cellspacing="0" cellpadding="1" align="center" style=" text-align:center;">';						
                    echo '<ul style="height:675px;">';
                    while($row=mysql_fetch_array($result)){
                        $i++;
                        if($i==1)
                            echo '<li class="ajax_block_product first_item clear ">';
                        else if($i==4||$i==8)
                            echo '<li class="ajax_block_product item last_item_of_line ">';
                        else if($i==5||$i==9)
                            echo '<li class="ajax_block_product item clear ">';
                        else if($i==12)
                            echo '<li class="ajax_block_product last_item last_item_of_line ">';
                        else
                            echo '<li class="ajax_block_product item ">';
                        echo '<h5><a title="'.$row["tensp"].'" href="viewproduct.php?masp='.$row["masp"].'">'.$row["hangsx"].' '.$row["tensp"].'</a></h5>';
                        echo '<a class="product_image" title="Xem thêm về '.$row["tensp"].'" href="viewproduct.php?masp='.$row["masp"].'">';
                        echo '<img width="130" height="116" alt="'.$row["tensp"].'" src="img/thumbnail/'.$row["masp"].'.jpg"/></a><div>';
                        echo '<div><p class="price_container"><span class="price">'.number_format($row["gia"]).' VNĐ</span></p>';
                        echo '<a class="exclusive ajax_add_to_cart_button" title="Add to cart" href="addcart.php?item='.$row["masp"].'" rel="ajax_id_product_17">Thêm vào giỏ</a></div></li></div>';
                    }
                    echo '</ul>';
                    echo '</table>';
                }
                //Hien thi link phan trang
                echo '<p align="right">';
                if($so_trang>1){
                    $next = $start + $display;
                    $prev = $start - $display;
                    //First
                    if($_GET['trang']>1) {
                        $page = 1;
                        echo '<a href="?index.php&start='.$prev.'&trang='.$page.'"><<</a>&nbsp;&nbsp;';
                    }
                    //Pre    
                    if($_GET['trang'] !=0&&$_GET['trang'] !=1) {
                        $page = $_GET['trang']-1;
                        echo '<a href="?index.php&start='.$prev.'&trang='.$page.'"><</a>&nbsp;&nbsp;';
                    }
                    //Numeric
                    for($i=1;$i<=$so_trang;$i++){
                        if($_GET['trang'] !=$i){
                            $link="?index.php&start=$display*($i-1)&trang=$i";
                            echo "<a href=$link>$i</a>&nbsp;&nbsp;";   
                        }  
                        else{ 
                            echo "<font style='font-weight: bold;' color= blue>";
                            echo "<id='current'>$i&nbsp;&nbsp;";
                            echo "</font>";
                        }           
                    }
                    //Next
                    if($_GET['trang'] !=$so_trang) {
                        $page = $_GET['trang']+1;
                        echo '<a href="?index.php&start='.$next.'&trang='.$page.'">></a>&nbsp;&nbsp;';
                    }
                    //Last
                    if($_GET['trang']<$so_trang) {
                        $page = $so_trang;
                        echo '<a href="?index.php&start='.$prev.'&trang='.$page.'">>></a>&nbsp;&nbsp;';
                    }
                }
                echo '</p>';
            ?>
        </div><!--End .block_content-->
    </div><!--End #featured-products_block_center-->
</div><!--End #center_column-->
<?php
	include('tmp/right_sidebar.inc');
	include('tmp/footer.inc');
?>