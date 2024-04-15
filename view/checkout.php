		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Thanh Toán</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang Chủ</a></li>
							<li class="active">Thanh Toán</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<?php
		if (isset($_POST["thanhtoan"]) && $_POST["thanhtoan"]) {
			
			// Lấy dữ liệu từ biểu mẫu
			$total_order = $_POST["total_order"];
			$fullname = $_POST["fullname"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$note = $_POST["note"];
			$pttt = $_POST["pttt"];

			$madh = "PHONG-ELT" . rand(0, 999999);

			// Thực hiện truy vấn INSERT vào bảng 'orders'
			$sql = "INSERT INTO orders (madh, total, ptthanhtoan, fullname, address, phone, email, note) 
					VALUES ('$madh', $total_order, '$pttt', '$fullname', '$address', '$phone', '$email', '$note')";

			if (mysqli_query($conn, $sql)) {
				// Lấy ID của hàng vừa chèn vào cơ sở dữ liệu
				$iddh = mysqli_insert_id($conn);

				// Thêm dữ liệu vào bảng 'cart' nếu có sản phẩm trong giỏ hàng
				if (isset($_SESSION["giohang"]) && count($_SESSION["giohang"]) > 0) {
					foreach ($_SESSION["giohang"] as $item) {
						extract($item);
						$sql_cart = "INSERT INTO cart (id_order, id_pro, name_pro, price, quantity,image)
									VALUES ('$iddh', '$id', '$name_prd', '$price', '$quantity', '$image')";
				
						if (mysqli_query($conn, $sql_cart)) {
							// Thành công
						} else {
							echo "Lỗi: " . $sql_cart . "<br>" . mysqli_error($conn);
						}
					}
				}

				unset($_SESSION["giohang"]);
				header("location: index.php");
			} else {
				echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
			}

		}
		?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<form method="post">
					<!-- row -->
					<div class="row">
						<div class="col-md-7">
							<!-- Billing Details -->
							<div class="billing-details">
								<div class="section-title">
									<h3 class="title">Địa Chỉ Nhận Hàng</h3>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="fullname" placeholder="Họ Tên" required>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address" placeholder="Địa Chỉ" required> 
								</div>
								<div class="form-group">
									<input class="input" type="text" name="email" placeholder="Email" required>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="phone" placeholder="Số Điện Thoại" required>
								</div>
							</div>
							<!-- /Billing Details -->

							<!-- Order notes -->
							<div class="order-notes">
								<textarea class="input" name="note" placeholder="Ghi Chú"></textarea>
							</div>
							<!-- /Order notes -->
						</div>

						<!-- Order Details -->
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">Đơn Hàng</h3>
							</div>
							<div class="order-summary">
								<div class="order-col">
									<div><strong>SẢN PHẨM</strong></div>
									<div><strong>TỔNG TIỀN</strong></div>
								</div>

								<div class="order-products">
								<?php
									if(isset($_GET['del']) &&  $_GET['del'] >= 0){
										array_splice($_SESSION['giohang'],$_GET['del'],1);
									}
									
									$mycart = "";

									$i = 0;
									
									$totalPrice = 0;
									if(isset($_SESSION["giohang"]) && is_array($_SESSION["giohang"])){
										foreach ($_SESSION["giohang"] as $item) {
											extract($item);
											$linkdel = "index.php?page=shopcart&del=".$i;
											$total = $price * $quantity;
											$totalPrice += $total;
											echo '<div class="order-col">
														<div>'.$quantity.'x '.$name_prd.'</div>
														<div>'.number_format($total, 0, '.', ',').'đ</div>
													</div>';
											$i++;
										}
									}
								?>

								</div>
								<div class="order-col">
									<div>Phí Vận Chuyển</div>
									<div><strong>FREE</strong></div>
								</div>
								<div class="order-col">
									<div><strong>TỔNG</strong></div>
									<div><strong class="order-total"><?php echo number_format($totalPrice, 0, '.', ','); ?> </strong></div>
								</div>
							</div>
							<div class="payment-method">
								<div class="input-radio">
									<input type="radio" name="pttt" id="payment-1" value="1">
									<label for="payment-1">
										<span></span>
										Chuyển Khoản
									</label>
									<div class="caption">
										<p>VCB - 101009267 - TRẦN ĐÌNH PHONG</p>
									</div>
								</div>
								<div class="input-radio">
									<input type="radio" name="pttt" id="payment-2" value="2">
									<label for="payment-2">
										<span></span>
										Nhận Hàng Thanh Toán
									</label>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="terms">
								<label for="terms">
									<span></span>
									Tôi đã đọc và chấp nhận các <a href="#">điều khoản và điều kiện</a>
								</label>
							</div>
							<input type="hidden" name="total_order" value="<?= $totalPrice ?>">
							<input type="submit" value="Thanh Toán" name="thanhtoan" class="primary-btn order-submit">
						</div>
						<!-- /Order Details -->
					</div>
					<!-- /row -->
				</form>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->