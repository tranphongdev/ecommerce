<?php
if(isset($_POST['sbm'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $email = trim($_POST['fullname']);
    $email = trim($_POST['mobile']);

    if(mysqli_query($conn, "INSERT INTO `users`(`username`, `password`, `email`, `fullname`, `mobile`) VALUES ('$username','$password','$email','$fullname','$mobile')")){
        header('location: index.php?page=login');
    }
    else{
        header('location: index.php?page=register');
    }
}
?>
<div class="authen" style="max-width: 500px;
  margin: 30px auto;text-align:center;">
    <h3 class="authen-header">
        ĐĂNG NHẬP TÀI KHOẢN
    </h3>
    <p class="authen-desc">
    Nếu bạn đã có tài khoản, đăng nhập tại đây.
    </p>
    <form method="post">
        <div class="form-group">
            <input class="input" type="text" name="username" placeholder="Tài Khoản">
        </div>
        <div class="form-group">
            <input class="input" type="password" name="password" placeholder="Mật Khẩu">
        </div>
        <div class="form-group">
            <input class="input" type="text" name="fullname" placeholder="Họ tên">
        </div>
        <div class="form-group">
            <input class="input" type="text" name="mobile" placeholder="Số điện thoại">
        </div>
        <button type="submit" name="sbm" class="primary-btn order-submit">Đăng Ký</button>
    </form>
</div>