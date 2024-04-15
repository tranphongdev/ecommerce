<?php
    if(isset($_POST["sbm"]) && $_POST["sbm"]){
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $date_create = date("Y-m-d H:i:s");

        $sql = "INSERT INTO users(fullname,username, password, email, date_create) 
        VALUES('$fullname','$username', '$password', '$email', '$date_create')";
        mysqli_query($conn, $sql) or die("Lỗi Câu Truy Vấn");
        header("Location: index.php?page=users");
    }
?>  

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Người Dùng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Người Dùng</li>
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
                    <label for="fullname">Họ Tên</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Nhập họ tên">
                  </div>
                  <div class="form-group">
                    <label for="username">Tên Tài Khoản</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập tên tài khoản">
                  </div>
                  <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Nhập email">
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