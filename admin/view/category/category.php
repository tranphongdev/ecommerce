<?php
    if (isset($_GET["id"])) {
        $sql_del = "DELETE FROM category WHERE cat_id = " . $_GET["id"];
        $result_del = mysqli_query($conn, $sql_del) or die("Lỗi Câu Truy Vấn");
        header("location: index.php?page=category");
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
              <a href="index.php?page=addcategory" class="btn btn-primary">Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Mã Danh Mục</th>
                    <th>Tên Danh Mục</th>
                    <th>Ngày Tạo</th>
                    <th>Hành Động</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql = "SELECT * FROM category";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row["cat_id"]; ?></td>
                        <td><?= $row["cat_name"]; ?></td>
                        <td><?= date("d-m-y H:i:s",strtotime($row["date_create"])); ?></td>
                        <td>
                            <a href="index.php?page=editcategory&id=<?= $row["cat_id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?page=category&id=<?= $row["cat_id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá người dùng này ?')">
                            <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                  <?php }} ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
</div>