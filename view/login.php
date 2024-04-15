<?php
    if(isset($_POST['login'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $sqllogin = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn,$sqllogin);

        if(mysqli_num_rows($result)){
            $rowlogin = mysqli_fetch_row($result);
            $_SESSION['login'] = $rowlogin;
            header('location: index.php');
        }
        else{
            header('location: index.php?page=login');
        }
    }
?>


<div class="authen" style="max-width: 500px;
  margin: 30px auto;text-align:center;">
    <h3 class="authen-header">
        ĐĂNG KÝ TÀI KHOẢN
    </h3>
    <p class="authen-desc">
    Nếu chưa có tài khoản vui lòng đăng ký tại đây
    </p>
    <form method="post">
        <div class="form-group">
            <input class="input" type="text" name="username" placeholder="Tài Khoản">
        </div>
        <div class="form-group">
            <input class="input" type="password" name="password" placeholder="Mật Khẩu">
        </div>
        <button type="submit" name="login" class="primary-btn order-submit">Đăng Nhập</button>
    </form>
</div>