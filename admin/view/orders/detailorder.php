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
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($conn, $_GET['id']); // Bảo vệ chống SQL injection
                            $sql = "SELECT * FROM cart WHERE id_order = $id";
                            $query = mysqli_query($conn, $sql);

                            if ($query) {
                                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["id_order"]; ?></td>
                        <td><?= $row["id_pro"]; ?></td>
                        <td><img width="50px" src="../<?= $row["image"]; ?>" alt=""></td>
                        <td><?= $row["name_pro"]; ?></td>
                        <td><?= $row["quantity"]; ?></td>
                        <td><?= number_format($row["price"]); ?>đ</td>
                    </tr>
                  <?php }}} ?>

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