<div class="section slider">
    <!-- Slider -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="img/big-1920x450-1.webp" alt=""></div>
        <div class="swiper-slide"><img src="img/jgid-1920x450.jpg" alt=""></div>
        <div class="swiper-slide"><img src="img/1920x450--2--min-1920x450.webp" alt=""></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop-1.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop</h3>
                        <a href="index.php?page=shop" class="cta-btn">Mua sắm ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop-2.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Phụ Kiện</h3>
                        <a href="index.php?page=shop" class="cta-btn">Mua sắm ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop-3.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Đồng Hồ Thông Minh</h3>
                        <a href="index.php?page=shop" class="cta-btn">Mua sắm ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản Phẩm Mới</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                            <?php
                                if(isset($_POST['btn'])){
                                        $noidung = $_POST['noidung'];
                                        $sql = "SELECT * FROM products WHERE name_prd LIKE '%$noidung%'";
                                        $result = mysqli_query($conn,$sql);
                                    }else{
                                        $sql = "SELECT * FROM products WHERE new = 1 ORDER BY id DESC";
                                        $result = mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
                                    }

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="<?php echo $row['image'] ?>" alt="">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="index.php?page=detail&id=<?= $row["id"] ?>"><?php echo $row['name_prd']; ?></a></h3>
                                        <h4 class="product-price"><?php echo number_format($row['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?php echo number_format($row['price'], 0, '.', ','); ?>đ</del></h4>
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
                                <!-- /product -->
                                <?php }} ?>    
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Ngày</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Tiếng</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Phút</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Giây</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">Ưu đãi tuần này</h2>
                    <p>Giảm giá lên đến 50%</p>
                    <a class="primary-btn cta-btn" href="#">Mua sắm ngay</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm bán chạy</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <?php
                                if(isset($_POST['btn'])){
                                        $noidung = $_POST['noidung'];
                                        $sql = "SELECT * FROM products WHERE name_prd LIKE '%$noidung%'";
                                        $result = mysqli_query($conn,$sql);
                                    }else{
                                        $sql = "SELECT * FROM products WHERE hot = 1 ORDER BY id DESC";
                                        $result = mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
                                    }

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="<?php echo $row['image']; ?>" alt="">
                                        <div class="product-label">
                                            <span class="new">HOT</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="index.php?page=detail"><?php echo $row['name_prd'] ?></a></h3>
                                        <h4 class="product-price"><?php echo number_format($row['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?php echo number_format($row['price'], 0, '.', ','); ?>đ</del></h4>
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
                                <!-- /product -->
                                <?php }} ?>
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Bán Chạy</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <div>
                        <?php
                            $sql = "SELECT * FROM products WHERE hot = 1 ORDER BY id DESC LIMIT 3";
                            $result = mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="index.php?page=detail&id=<?= $row["id"] ?>"><?php echo $row['name_prd'] ?></a></h3>
                                <h4 class="product-price"><?php echo number_format($row['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?php echo number_format($row['price'], 0, '.', ','); ?>đ</del></h4>
                            </div>
                        </div>
                        <?php }} ?>
                        <!-- /product widget -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Khuyến Mại</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <!-- product widget -->
                        <?php
                            $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
                            $result = mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="index.php?page=detail&id=<?= $row["id"] ?>"><?php echo $row['name_prd'] ?></a></h3>
                                <h4 class="product-price"><?php echo number_format($row['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?php echo number_format($row['price'], 0, '.', ','); ?>đ</del></h4>
                            </div>
                        </div>
                        <?php }}?>
                        <!-- /product widget -->
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Sản Phẩm Mới</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
                        <!-- product widget -->
                        <?php
                            $sql = "SELECT * FROM products WHERE new = 1 ORDER BY id DESC LIMIT 3";
                            $result = mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="index.php?page=detail&id=<?= $row["id"] ?>"><?php echo $row['name_prd'] ?></a></h3>
                                <h4 class="product-price"><?php echo number_format($row['price_old'], 0, '.', ','); ?>đ <del class="product-old-price"><?php echo number_format($row['price'], 0, '.', ','); ?>đ</del></h4>
                            </div>
                        </div>
                        <?php }}?>
                        <!-- /product widget -->
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->