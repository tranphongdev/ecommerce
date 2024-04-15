<?php
    $hot = false;
    $new = false;
    $id = $_GET['id'];
    $sql_up = "SELECT * FROM products WHERE id = $id";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if ($row_up && array_key_exists('new', $row_up)) {
        // Kiểm tra xem cột 'new & hot' có tồn tại và không rỗng trong dòng dữ liệu lấy ra
        $new = $row_up['new'] ? true : false;
        $hot = $row_up['hot'] ? true : false;
    }

    if (isset($_POST['sbm'])) {
        $name_prd = mysqli_real_escape_string($conn, $_POST['name_prd']);
        $price = $_POST['price'];
        $price_old = $_POST['price_old'];
        $id_category = $_POST['id_category'];
        $hot = isset($_POST['hot']) ? 1 : 0;
        $new = isset($_POST['new']) ? 1 : 0;
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $date_create = date("Y-m-d H:i:s");
   
        $fileName = $row_up['image']; 
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $path = "upload";
            $allowedTypes = ["image/jpeg", "image/png", "image/jfif", "image/webp"];

            if (in_array($_FILES['image']['type'], $allowedTypes) && $_FILES['image']['size'] <= 240000000) {
                if ($_FILES['image']['error'] == 0) {
                    $targetPath = "../" . $path . "/" . basename($_FILES['image']['name']);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                        $fileName = $path . "/" . $_FILES['image']['name'];
                    } else {
                        echo "Lỗi khi di chuyển tập tin.";
                    }
                } else {
                    echo "Lỗi tập tin.";
                }
            } else {
                echo "Tập tin không hợp lệ.";
            }
        }

        
        $sql = "UPDATE products SET name_prd = '$name_prd',
        image = '$fileName', price = '$price', price_old = '$price_old',
        description = '$description', hot = '$hot', new = '$new', id_category = '$id_category', date_create = '$date_create'
        WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            header('location: index.php?page=products');
        } else {
            echo "Lỗi cập nhật sản phẩm: " . mysqli_error($conn);
        }
    }
?>  

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sản Phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Sản Phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_prd">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="name_prd" value="<?= $row_up["name_prd"] ?>" placeholder="Nhập tên sản phẩm">
                  </div>
                  <div class="form-group">
                    <label for="image">Ảnh Sản Phẩm</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" value="<?= $row_up["image"] ?>">
                        <label class="custom-file-label" for="image">Chọn Tệp</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Tải Lên</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price">Giá </label>
                    <input type="text" class="form-control" name="price" value="<?= number_format($row_up['price'], 0, '.', ',') ?>đ" placeholder="Nhập giá sản phẩm">
                  </div>
                  <div class="form-group">
                    <label for="price_old">Giá Khuyễn Mãi</label>
                    <input type="text" class="form-control" name="price_old" value="<?= number_format($row_up['price_old'], 0, '.', ',') ?>đ" placeholder="Nhập giá khuyến mãi">
                  </div>
                   <div class="form-group">
                    <label>Danh Mục</label>
                    <?php
                        $sql_cat = "SELECT * FROM category";
                        $result = $conn->query($sql_cat);
                    ?>
                    <select class="form-control" name="id_category">
                        <?php 
                            if ($result->num_rows > 0) {
                                while ($row_cat = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row_cat["cat_id"] ?>"><?php echo $row_cat["cat_name"] ?></option>
                        <?php }} ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="hot" <?php echo ($hot)?"checked":""; ?> >
                          <label for="customCheckbox1" class="custom-control-label">Sản Phẩm Hot</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input custom-control-input-danger" name="new" <?php echo ($new)?"checked":""; ?> type="checkbox" id="customCheckbox4">
                          <label for="customCheckbox4" class="custom-control-label">Sản Phẩm Mới</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mô Tả Sản Phẩm</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Nhập mô tả sản phẩm"><?= $row_up["description"] ?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="submit" value="Lưu Thay Đổi" class="btn btn-primary" name="sbm">
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>