<?php
// Kiểm tra nếu form được gửi đi và nút "Cập Nhật" được nhấn
if(isset($_POST["update"]) && $_POST["update"]) {
    // Lấy thông tin từ form
    $fullname = $_POST["fullname"];
    $email    = $_POST["email"];
    $password = $_POST["password"];
    $phone    = $_POST["phone"];
    $address  = $_POST["address"];
    $job      = $_POST["job"];

    if(isset($_SESSION['login'])) {
        // Lấy ID của người dùng từ session 
        $id = $_SESSION['login'][0];

        // Cập nhật thông tin người dùng trong cơ sở dữ liệu
        $sql = "UPDATE admin SET fullname = '$fullname', email = '$email', password = '$password', 
        phone = '$phone', address = '$address', job = '$job' WHERE id = '$id'";

        // Thực hiện truy vấn
        if (mysqli_query($conn, $sql)) {
            // Kiểm tra số hàng đã bị ảnh hưởng bởi truy vấn UPDATE
            if (mysqli_affected_rows($conn) > 0) {
                // Cập nhật session với thông tin mới
                $_SESSION['login'] = array($id, $password, $fullname, $phone, $email, $address, $job);

            } else {
                echo "Không có thay đổi trong cơ sở dữ liệu.";
            }
        } else {
            echo "Lỗi cập nhật thông tin: " . mysqli_error($conn);
        }
    }
}
?>

<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trang Cá Nhân</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Trang Cá Nhân</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="dist/img/avt-ps.png" alt="User profile picture">
                </div>
                <?php
                    if(isset($_SESSION['login'])){
                        echo '<h3 class="profile-username text-center">'.$_SESSION['login'][2].'</h3>
                              <p class="text-muted text-center">'.$_SESSION['login'][6].'</p>';    
                    }
                ?>
                
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Người Theo Dõi</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Đang Theo Dõi</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Bạn Bè</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Theo Dõi</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Thông Tin</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" method = "post">
                    <?php
                    if(isset($_SESSION['login'])){
                            echo ' <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Họ Tên</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="fullname" id="inputName" value = "'.$_SESSION['login'][2].'">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="email" id="inputEmail" value = "'.$_SESSION['login'][4].'">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Mật Khẩu</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="password" id="inputName2" value = "'.$_SESSION['login'][1].'">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Số Điện Thoại</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="phone" id="inputSkills" value = "'.$_SESSION['login'][3].'">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Địa Chỉ</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name = "address" id="inputSkills" value = "'.$_SESSION['login'][5].'">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Vị Trí</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="job" id="inputSkills" value = "'.$_SESSION['login'][6].'">
                            </div>
                          </div>';    
                        }
                    ?>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <input type="submit" name = "update" value="Cập Nhật" class="btn btn-danger">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
