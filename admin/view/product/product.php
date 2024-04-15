<?php
    if (isset($_GET["id"])) {
        $sql_del = "DELETE FROM products WHERE id = " . $_GET["id"];
        $result_del = mysqli_query($conn, $sql_del) or die("Lỗi Câu Truy Vấn");
        header("location: index.php?page=products");
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
              <a href="index.php?page=addproducts" class="btn btn-primary">Thêm mới</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá KM</th>
                    <th>Danh Mục</th>
                    <th>SP Hot</th>
                    <th>SP Mới</th>
                    <th>Mô Tả</th>
                    <th>Ngày Tạo</th>
                    <th>Hành Động</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);
                        $i = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $i ++;
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["name_prd"]; ?></td>
                        <td><img width="50px" src="../<?= $row["image"]; ?>" alt=""></td>
                        <td><?= $row["price"]; ?></td>
                        <td><?= $row["price_old"]; ?></td>
                        <td><?= $row["id_category"]; ?></td>
                        <td><?php echo ($row["hot"])?"Hot":"Không"; ?></td>
                        <td><?php echo ($row["new"])?"New":"Không"; ?></td>
                        <td><?= $row["description"]; ?></td>
                        <td><?= date("d-m-y H:i:s",strtotime($row["date_create"])); ?></td>
                        <td>
                            <a href="index.php?page=editproducts&id=<?= $row["id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?page=products&id=<?= $row["id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá người dùng này ?')">
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