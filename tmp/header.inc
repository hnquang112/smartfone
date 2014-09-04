<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$page_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="img/favicon.ico" type="image/vnd.microsoft.icon" rel="icon"/>
<link href="img/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
<link href="global.css" rel="stylesheet" type="text/css" />
<link href="navlinks.css" rel="stylesheet" type="text/css" media="all" />
<link href="blockcategories.css" rel="stylesheet" type="text/css" media="all" />
<link href="xsearch.css" rel="stylesheet" type="text/css" media="all" />
<link href="blockmyaccount.css" rel="stylesheet" type="text/css" />
<link href="blockuserinfo.css" rel="stylesheet" type="text/css" />
<link href="blockviewed.css" rel="stylesheet" type="text/css" />
<link href="blockmanufacturer.css" rel="stylesheet" type="text/css" />
<link href="blockspecials.css" rel="stylesheet" type="text/css" />
<link href="blockcart.css" rel="stylesheet" type="text/css" />
<link href="blockbestsellers.css" rel="stylesheet" type="text/css" />
<link href="xproductscategory.css" rel="stylesheet" type="text/css" />
<link href="xnewproducts.css" rel="stylesheet" type="text/css" />
<link href="product_list.css" rel="stylesheet" type="text/css" />
<link href="jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<link href="blockcms.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" media="screen"/>
</head>

<body id="index">
	<div id="page">
    	<div id="header">
        	<a id="header_logo" title="Smart-fone" href="index.php">
            	<img class="logo" width="429" height="85" alt="Smart-fone" src="img/logo.jpg"/>
            </a>
            <div id="header_right"><!--End #currencies_block_top--><!--End #languages_block_top-->
                <div id="header_user">
                	<p id="header_user_info">Chào mừng, 
						<?php
							if(isset($_SESSION['uid']) && (substr($_SERVER['PHP_SELF'],-10)!='logout.php'))
								echo $_SESSION['hoten'].' <a href="logout.php">Thoát</a>';
							else
								echo '<a href="login.php">Đăng nhập</a>';
						?>
                  	</p>
                    <ul id="header_nav">
                    	<li id="shopping_cart">
                        	<a title="Your Shopping Cart" href="cart.php">Giỏ Hàng: </a>
                            <span class="ajax_cart_no_product"><?=@count($_SESSION['cart'])?></span>
						</li>
                        <?php
							if(isset($_SESSION['uid']))
								echo '<li id="your_account"><a href="profile.php">Tài khoản</a></li>';
						?>
                    </ul>
                </div><!--End #header_user-->
                <div id="search_block_top">
                	<form class="searchform" name="searchform" id="searchform" action="search.php" method="get">
                    	<span class="left"></span>
                            <input class="s" type="text" value="" id="keyword" name="keyword" placeholder="Tìm kiếm..."/>
                            <input class="searchsubmit" id="submit" name="submit" type="submit"/>
                        <span class="right"></span>
                    </form>
                </div><!--End #search_block_top-->
			</div><!--End #header_right-->
				<div>
                	<div id="wrapper">
                    	<div id="nav">
                        	<ul class="fix_dropdown">
                            	<li class="page_item navfirst"><a style="background-image: url('img/home-icon-trans.png') no-repeat;" title="Home page" href="index.php" class="home">Trang Chủ</a></li>
                              	<li class="page_item page-item-2"><a title="Intro" href="intro.php">Giới Thiệu</a></li>
                            </ul><!--End .fix_dropdown-->
                        </div><!--End #nav-->
                    </div><!--End #wrapper-->
              </div><!--End #div-->
          </div><!--End #header-->