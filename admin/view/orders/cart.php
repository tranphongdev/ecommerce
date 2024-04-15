<?php
    if (isset($_GET["id"])) {
        $sql_del = "DELETE FROM cart WHERE id = " . $_GET["id"];
        $result_del = mysqli_query($conn, $sql_del) or die("Lỗi Câu Truy Vấn");
        header("location: index.php?page=cart");
    }
?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hóa Đơn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Hóa Đơn</li>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>ID ĐH</th>
                    <th>ID Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Hành Động</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql = "SELECT * FROM cart";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["id_order"]; ?></td>
                        <td><?= $row["id_pro"]; ?></td>
                        <td><img width="50px" src="../<?= $row["image"]; ?>" alt=""></td>
                        <td><?= $row["name_pro"]; ?></td>
                        <td><?= $row["quantity"]; ?></td>
                        <td><?= number_format($row["price"]); ?>đ</td>
                        <td>
                            <a href="index.php?page=cart&id=<?= $row["id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá hóa đơn này ?')">
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