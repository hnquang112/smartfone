			<div id="right_column" class="column">
                <div id="cart_block" class="block exclusive">
                	<h4>Giỏ hàng<span id="block_cart_expand" class="hidden">&nbsp;</span>
                        <span id="block_cart_collapse">&nbsp;</span>
            		</h4>
                    <div class="block_content">
                        <div id="cart_block_list" class="expanded">
                        	<?php
								if(isset($_SESSION['cart']))
									foreach($_SESSION['cart'] as $k=>$v){
										if(isset($v))
											$ok=2;
										$item[]=$k;
										$str=implode(",",$item);
										require_once("tmp/connectdb.php");
										$query="select * from sanpham where masp in ($str)";
										$result=mysql_query($query);
										$total=0;
										while($row=mysql_fetch_array($result))
											$total+=$_SESSION['cart'][$row["masp"]]*$row["gia"];
									}
								if (@$ok != 2)
									echo '<p id="cart_block_no_products">Trống</p>';
								else{
									$items = $_SESSION['cart'];
									echo '<p>Bạn đang có <a href="cart.php">'.count($items).' sản phẩm</a> trong giỏ hàng</p>';
								}
							?>
                            <p id="cart-prices">
                                <span>Tổng cộng</span>
                                <span id="cart_block_total" class="price ajax_block_cart_total"><?=@number_format($total)?> VNĐ</span>
							</p>
                            <p id="cart-price-precisions">Giá đã bao gồm thuế</p>
                            <p id="cart-buttons">
                            	<a class="button_small" title="Xem toàn bộ giỏ hàng" href="cart.php">Xem thêm</a>
                                <a id="remove" class="button_small" title="Xóa giỏ" href="delcart.php">Xóa giỏ</a>
							</p>
                        </div><!--End #cart_block_list-->
                    </div><!--End .block_coontent-->
                </div><!--End #cart_block--><!--End #special_block_right-->
                <div id="new-products_block_right" class="block products_block">
                	<h4>SẢN PHẨM MỚI</h4>
                    <div class="block_content">
                    	<ul class="product_images clearfix">
                        	<?php
								require_once('tmp/connectdb.php');
								$query="select masp,tensp,gia from sanpham order by masp desc limit 0,10";
								$result=@mysql_query($query);
								if(mysql_num_rows($result)!=""){
									$i=0;
									while($row=mysql_fetch_array($result)){
										$i++;
										if($i==1)
											echo '<li class="first">';
										else
											echo '<li>';
										echo '<a title="'.$row["tensp"].'" href="viewproduct.php?masp='.$row["masp"].'">';
										echo '<img width="80" height="72" alt="'.$row["tensp"].'" src="img/thumbnail/'.$row["masp"].'.jpg"/></a></li>';
									}
								}
							?>
                        </ul><!--End.product_images clearfix-->
                    </div><!--End .block_content-->
                </div><!--End #new-products_block_right--><!--End #wishlist_block-->
            </div><!--End #right_column-->
        </div><!--End #columns-->