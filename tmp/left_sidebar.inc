        <div id="columns">
        	<div id="left_column" class="column">
            	<?php
					include('tmp/function.inc');
				?>
                <div id="viewed-products_block_left" class="block products_block">
                	<h4>SẢN PHẨM CAO CẤP</h4>
                    <div class="block_content">
                    	<ul class="products clearfix">
							<?php
								require_once('tmp/connectdb.php');
								$query='select masp, tensp, gia from sanpham order by gia desc limit 0,3';
								$result=mysql_query($query);
								if(mysql_num_rows($result)!=""){
									$i=0;
									while($row=mysql_fetch_array($result)){
										$i++;
										if($i==1)
											echo '<li class="clearfix first_item">';
										else if($i==3)
											echo '<li class="clearfix last_item">';
										else
											echo '<li class="clearfix">';
										echo '<a title="'.$row["tensp"].'" href="viewproduct.php?masp='.$row["masp"].'"><img width="80" height="72" alt="'.$row["tensp"].'" src="img/thumbnail/'.$row["masp"].'.jpg"/></a>';
										echo '<h5><a title="'.$row["tensp"].'" href="viewproduct.php?masp='.$row["masp"].'">'.$row["tensp"].'</a></h5>';
										echo '<p>'.number_format($row["gia"]).' VNĐ<a title="Xem thêm" href="viewproduct.php?masp='.$row["masp"].'"><img width="10" height="7" alt=">>" src="img/bullet.gif"/></a></p></li>';
									}
								}
								mysql_free_result($result);
							?>
                        </ul>
                    </div><!--End .block_content-->
                </div><!--End #viewed-products_block_left-->
                <div id="manufacturers_block_left" class="block blockmanufacturer">
                	<h4>NHÀ SẢN XUẤT</h4>
                    <div class="block_content">
                    	<ul class="bullet">
							<?php
								$query='select hangsx from sanpham group by hangsx asc';
								$result=mysql_query($query);
								if(mysql_num_rows($result)!=""){
									$i=0;
									while($row=mysql_fetch_array($result)){
										$i++;
										if($i==1)
											echo '<li class="first_item">';
										else if($i==mysql_num_rows($result))
											echo '<li class="last_item">';
										else
											echo '<li>';
										echo '<a title="'.$row["hangsx"].'" href="index.php?hang='.$row["hangsx"].'">'.$row["hangsx"].'</a></li>';
									}
								}
							?>
                        </ul>
                    </div><!--End .block_content-->
                </div><!--End #manufacturers_block_left--><!--End #informations_block_left-->
            </div><!--End #left_column-->