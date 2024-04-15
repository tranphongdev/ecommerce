		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Trang Chủ</a></li>
							<li><a href="#">Cửa Hàng</a></li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Danh Mục</h3>
							<div class="checkbox-filter">

							<?php
								$sql = "SELECT * FROM category ORDER BY cat_id DESC";
								$result = mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
							?>
								<div class="input-checkbox">
									<a href="index.php?page=shop&id=<?= $row["cat_id"] ?>" for="category-1">
										<?= $row["cat_name"] ?>
										<small>(120)</small>
									</a>
								</div>

							<?php }} ?>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- <div class="aside">
							<h3 class="aside-title">Giá</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div> -->
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- <div class="aside">
							<h3 class="aside-title">Thương hiệu</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div> -->
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- <div class="aside">
							<h3 class="aside-title">Bán chạy</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">22.999.000đ <del class="product-old-price">24.999.000đ</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">22.999.000đ <del class="product-old-price">24.999.000đ</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">22.999.000đ <del class="product-old-price">24.999.000đ</del></h4>
								</div>
							</div>
						</div> -->
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sắp xếp theo:
									<select class="input-select">
										<option value="0">Phổ biến</option>
										<option value="1">Bán Chạy</option>
									</select>
								</label>

								<label>
									Hiển thị:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="wrapper-product">
						<?php
								if(isset($_GET["id"]) && $_GET["id"] ){
									$category_id = $_GET['id'];
									// Truy vấn sản phẩm theo danh mục nếu category_id tồn tại
									$sql = "SELECT * FROM products WHERE id_category = $category_id";
								}
								else{
									// Hiển thị tất cả sản phẩm nếu không có category_id
									$sql = "SELECT * FROM products";
								}

								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
							?>
							<!-- product -->
							<div class="prd-item col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="<?= $row["image"] ?>" alt="">
										<!-- <div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div> -->
									</div>
									<div class="product-body">
										<h3 class="product-name"><a href="#"><?= $row["name_prd"] ?></a></h3>
										<h4 class="product-price"><?= number_format($row['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?= number_format($row['price'], 0, '.', ','); ?>đ</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Yêu Thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">So Sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><a href="index.php?page=detail&id=<?= $row["id"] ?>" class="tooltipp">Xem Chi Tiết</a></button>
										</div>
									</div>
									<div class="add-to-cart">
										<a href="index.php?page=detail&id=<?= $row["id"] ?>">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Mua Hàng</button>
										</a>
									</div>
								</div>
							</div>
							<div class="clearfix visible-sm visible-xs"></div>
							<!-- /product -->
							<?php }} ?>
							
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->