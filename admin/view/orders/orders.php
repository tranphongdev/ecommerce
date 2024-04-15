<?php
    if (isset($_GET["id"])) {
        $sql_del = "DELETE FROM orders WHERE id = " . $_GET["id"];
        $result_del = mysqli_query($conn, $sql_del) or die("Lỗi Câu Truy Vấn");
        header("location: index.php?page=orders");
    }
?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Đơn Hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Đơn Hàng</li>
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
                    <th>ID ĐH</th>
                    <th>Mã DH</th>
                    <th>Họ Tên</th>
                    <th>Địa Chỉ</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Ghi Chú</th>
                    <th>PT Thanh Toán</th>
                    <th>Tổng Tiền</th>
                    <th>Hành Động</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql = "SELECT * FROM orders";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["madh"]; ?></td>
                        <td><?= $row["fullname"]; ?></td>
                        <td><?= $row["address"]; ?></td>
                        <td><?= $row["phone"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["note"]; ?></td>
                        <td><?= $row["ptthanhtoan"]; ?></td>
                        <td><?= number_format($row["total"]); ?>đ</td>
                        <td>
                            <a href="index.php?page=detailorder&id=<?= $row["id"]; ?>"><i class="fa-solid fa-circle-info"></i> </a>
                            &nbsp;&nbsp;
                            <a href="index.php?page=orders&id=<?= $row["id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá Đơn Hàng này ?')">
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