<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtocart'])) {
        if (!empty($_POST['id']) && !empty($_POST['name_prd']) && !empty($_POST['image']) && !empty($_POST['price']) && !empty($_POST['quantity'])) {
            $id = $_POST['id'];
            $name_prd = $_POST['name_prd'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            if(isset($_POST['quantity']) && $_POST['quantity'] > 0){
                $quantity = $_POST['quantity'];
            }
            else{
                $quantity = 1;
            }
            
            
            $found = false;

            if (isset($_SESSION["giohang"]) && is_array($_SESSION["giohang"])) {
                foreach ($_SESSION["giohang"] as &$item) {
                    if ($item['name_prd'] === $name_prd) {
                        $item['quantity'] += $quantity; 
                        $found = true;
                        break;
                    }
                }
            } else {
                $_SESSION["giohang"] = array(); 
            }

            if (!$found) {
                $product = [
                    "id" => $id,
                    "name_prd" => $name_prd,
                    "image" => $image,
                    "price" => $price,
                    "quantity" => $quantity
                ];
                $_SESSION["giohang"][] = $product; 
            }

            header("Location: index.php?page=shopcart");
            exit; 
        } else {
            echo "Vui lòng điền tất cả những chỗ được yêu cầu.";
        }
    }
?>
<!-- BREADCRUMB -->
		<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sqlDetail = "SELECT * FROM products WHERE id = '$id'";
			$resultDetail = mysqli_query($conn, $sqlDetail) or die("Lỗi Câu Truy Vấn");
			$rowDetail = mysqli_fetch_assoc($resultDetail);
		?>
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang Chủ</a></li>
							<li class="active"><?= $rowDetail["name_prd"] ?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= $rowDetail["image"]; ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?= $rowDetail["name_prd"]; ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div>
								<h3 class="product-price"><?php echo number_format($rowDetail['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?php echo number_format($rowDetail['price'], 0, '.', ','); ?>đ</del></h3>
							</div>
							<p>Bạn đang tìm kiếm cho mình một chiếc <span></span><?= $rowDetail["name_prd"]; ?>
						</span> giúp xử lý hiệu quả mọi tác vụ công việc và giải trí thường ngày. <span><?= $rowDetail["name_prd"]; ?></span> mang hiệu năng ổn định, thiết kế tinh tế cùng một mức giá lý tưởng, chắc chắn sẽ là sự lựa chọn đáng cân nhắc để đáp ứng đa nhu cầu của người dùng.</p>

							<!-- <div class="product-options">
								<label>
									Phiên Bản
									<select class="input-select">
										<option value="0">Pro</option>
										<option value="0">Pro Max</option>
									</select>
								</label>
								<label>
									Màu Sắc
									<select class="input-select">
										<option value="0">Đỏ</option>
									</select>
								</label>
							</div> -->

							<form method = "post">
								<div class="add-to-cart">
									<div class="qty-label">
										Số Lượng
										<div class="input-number">
											<input type="number" value="1" name="quantity">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									<input type="hidden" name="id" value="<?php echo $rowDetail['id']; ?>">
									<input type="hidden" name="name_prd" value="<?php echo $rowDetail['name_prd']; ?>">
									<input type="hidden" name="price" value="<?php echo $rowDetail['price_old']; ?>">
									<input type="hidden" name="image" value="<?php echo $rowDetail['image']; ?>">
									<input type="submit" name="addtocart" value="Đặt Hàng" class="add-to-cart-btn">
								</div>
							</form>
							<ul class="product-links">
								<li>Chia Sẻ:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô Tả</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?= $rowDetail["description"]; ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php } ?>


		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Sản phẩm tương tự</h3>
						</div>
					</div>

					
					<?php
						if(isset($_POST['btn'])){
								$noidung = $_POST['noidung'];
								$sql = "SELECT * FROM products WHERE name_prd LIKE '%$noidung%'";
								$result = mysqli_query($conn,$sql);
							}else{
								$sql = "SELECT * FROM products LIMIT 4";
								$result = mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
							}

							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
					?>
					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="<?= $row["image"] ?>" alt="sản phẩm">
								<div class="product-label">
									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<h3 class="product-name"><a href="#"><?= $row["name_prd"] ?></a></h3>
								<h4 class="product-price"><?php echo number_format($row['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?php echo number_format($row['price'], 0, '.', ','); ?>đ</del></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">yêu thích</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">So Sánh</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><a href="index.php?page=detail&id=<?= $row["id"] ?>" class="tooltipp">Xem chi tiết</a></button>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="index.php?page=detail&id=<?= $row["id"] ?>">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Mua Hàng</button>
								</a>
							</div>
						</div>
					</div>
					<!-- /product -->
					<?php }} ?>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->