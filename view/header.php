<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Phong Shop</title>

		<link rel="icon" href="img/logo-phongshop.png" type="image/png">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/wrapper-product.css"/>
		<link type="text/css" rel="stylesheet" href="css/slider.css"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
		
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +84 844 774 123</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> tdphong@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 25 Lộc Vượng - Nam Định</a></li>
					</ul>
					<ul class="header-links pull-right">
						<!-- <li><a href="#"><i class="fa fa-dollar"></i> 45.964.000đ VNĐ</a></li> -->
						<li>
						<?php
                            if(isset($_SESSION['login'])){ 
                                echo'<a href="index.php?page=login"><i class="fa fa-user-o"></i>Xin chào: '.$_SESSION['login'][1].'</a>
								<a href="index.php?page=logout">/ Đăng Xuất</a>';
                            }
                            else{
                        ?>
							<a href="index.php?page=login"><i class="fa fa-user-o"></i> Đăng Nhập</a>
							<a href="index.php?page=register">/ Đăng Ký</a>
							<?php  } ?>
						</li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo-ps.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="post">
									<select class="input-select">
										<option value="0">Phong Shop</option>
									</select>
									<input class="input" name="noidung" placeholder="Bạn tìm gì...">
									<input type="submit" value="Tìm Kiếm" class="search-btn" name="btn">
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<!-- <div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu Thích</span>
										<div class="qty">2</div>
									</a>
								</div> -->
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ Hàng</span>
										<!-- <div class="qty">3</div> -->
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										<?php
											if(isset($_GET['del']) &&  $_GET['del'] >= 0){
												array_splice($_SESSION['giohang'],$_GET['del'],1);
											}
											if(empty($_SESSION['giohang'])){
												echo 'Không có sản phẩm';
											}
											$mycart = "";

											$i = 0;
											
											$totalPrice = 0;
											if(isset($_SESSION["giohang"]) && is_array($_SESSION["giohang"])){
												foreach ($_SESSION["giohang"] as $item) {
													extract($item);
													$total = $price * $quantity;
													$totalPrice += $total;
													$linkdel = "index.php?page=shopcart&del=".$i;
													echo '<div class="product-widget">
															<div class="product-img">
																<img src="'.$image.'">
															</div>
															<div class="product-body">
																<h3 class="product-name"><a href="#">'.$name_prd.'</a></h3>
																<h4 class="product-price"><span class="qty">'.$quantity.'x</span>'.number_format($price, 0, ',', '.').'đ</h4>
															</div>
															<button class="delete"><a href="'.$linkdel.'"><i class="fa fa-close"></i></a></button>
														</div>';

													$i++;
												}
											}
										?>
										</div>
										<div class="cart-summary">
											<h5>Tổng Tiền: <span> <?php echo number_format($totalPrice, 0, '.', ','); ?>đ</span></h5>
										</div>
										<div class="cart-btns">
											<a href="#">Xem Giỏ Hàng</a>
											<a href="index.php?page=checkout">Thanh Toán  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Trang Chủ</a></li>
						<li><a href="index.php?page=shop">Cửa Hàng</a></li>
						<li><a href="#">Về Chúng Tôi</a></li>
						<li><a href="#">Bài Viết</a></li>
						<li><a href="#">Liên Hệ</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->