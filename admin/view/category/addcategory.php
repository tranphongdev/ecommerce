<?php
    if(isset($_POST["sbm"]) && $_POST["sbm"]){
        $cat_name = $_POST["cat_name"];
        $date_create = date("Y-m-d H:i:s");

        $sql = "INSERT INTO category(cat_name, date_create) 
        VALUES('$cat_name', '$date_create')";
        mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
        header("Location: index.php?page=category");
    }
?>  

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Danh Mục</li>
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
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="fullname">Tên Danh Mục</label>
                    <input type="text" class="form-control" name="cat_name" placeholder="Nhập tên danh mục">
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