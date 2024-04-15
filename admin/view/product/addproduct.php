<?php
    if(isset($_POST['sbm'])){
        // Xử lý upload file
        $path = "upload";
        $fileName = "";
        if(isset($_FILES['image'])){
            if(isset($_FILES['image']['name'])){
                if($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" 
                || $_FILES['image']['type'] == "image/jfif" || $_FILES['image']['type'] == "image/webp"){
                    if($_FILES['image']['size'] <= 240000000){
                        if($_FILES['image']['error'] == 0){
                            move_uploaded_file($_FILES['image']['tmp_name'], "../" . $path . "/" . $_FILES['image']['name']);
                            $fileName = $path . "/" . $_FILES['image']['name'];
                        } else {
                            echo "Lỗi file";
                        }
                    } else {
                        echo "File quá lớn";
                    }
                } else {
                    echo "File không phải là ảnh";
                }
            } else {
                echo "Bạn chưa chọn file";
            }
        }
        $name_prd = $_POST['name_prd'];
        $price = $_POST['price'];
        $price_old = $_POST['price_old'];
        $description = $_POST['description'];
        $id_category = $_POST['id_category'];
        $hot = isset($_POST["hot"])?1:0;
        $new = isset($_POST["new"])?1:0;
        $date_create = date("Y-m-d H:i:s");

        $sql_insert = "INSERT INTO products(image, name_prd, price, price_old,description,new,hot,id_category, date_create) 
        VALUES('$fileName', '$name_prd', '$price', '$price_old', '$description', '$new', '$hot', '$id_category', '$date_create')";
        if (mysqli_query($conn, $sql_insert)) {
            header("Location: index.php?page=products");
        } else {
            echo "Lỗi câu truy vấn: " . mysqli_error($conn);
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
                <h3 class="card-title">Thêm mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_prd">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="name_prd" placeholder="Nhập tên sản phẩm">
                  </div>
                  <div class="form-group">
                    <label for="image">Ảnh Sản Phẩm</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="image">Chọn Tệp</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Tải Lên</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price">Giá </label>
                    <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                  </div>
                  <div class="form-group">
                    <label for="price_old">Giá Khuyễn Mãi</label>
                    <input type="text" class="form-control" name="price_old" placeholder="Nhập giá khuyến mãi">
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
                          <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="hot" <?php echo (isset($hot) && $hot) ? "checked" : ""; ?>>
                          <label for="customCheckbox1" class="custom-control-label">Sản Phẩm Hot</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input custom-control-input-danger" name="new" <?php echo (isset($new) && $new) ? "checked" : ""; ?> type="checkbox" id="customCheckbox4">
                          <label for="customCheckbox4" class="custom-control-label">Sản Phẩm Mới</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mô Tả Sản Phẩm</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Nhập mô tả sản phẩm"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="submit" value="Thêm" class="btn btn-primary" name="sbm">
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