<?php
ob_start();
include '../config/config.php';
include '../layout/header.php'
    ?>

<div class="container-fluid center-form">
    <form action="login.php" class="form-account" method="post">
        <h3>Đăng nhập tài khoản</h3>
        <div class="form-account-attribute">
            <label for="username">Username</label>
            <input type="text" name="username" required>

        </div>
        <div class="form-account-attribute">
            <label for="">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-account-redirect">
            <a href="">Quên mật khẩu</a>
            <a href="">Chưa có tài khoản? <strong>Đăng ký</strong> </a>
        </div>

        <button type="submit" name="btn_register" class="btn-register"> Đăng nhập </button>
    </form>
</div>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['btn_register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $pass_encode = md5($pass);
    $query_login = "select * from tbl_user where username = '$user' and password = '$pass_encode'";
    $user_check = $conn->query($query_login);
    if ($user_check->num_rows > 0) {
        $_SESSION['username'] = $user;
        header("location: /DoAnTTCN/index.php");
        ob_end_flush();

    } else {
        echo "Tài khoản không tồn tại";
    }
}
?>

<?php
include '../layout/footer.php'
    ?>