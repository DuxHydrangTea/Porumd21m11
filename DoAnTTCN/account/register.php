<?php
ob_start();
include '../config/config.php';
include '../layout/header.php'
    ?>

<div class="container-fluid center-form">
    <form class="form-account" method="post">
        <h3>Đăng ký tài khoản</h3>
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
            <a href="../account/login.php">Đã có tài khoản? <strong>Đăng nhập</strong> </a>
        </div>

        <button type="submit" name="btn_register" class="btn-register"> Đăng ký </button>
    </form>
</div>
<?php
if (isset($_POST['btn_register'])) {
    $user = $_POST['username'];
    $user_check = $conn->query("select * from tbl_user where username = '$user'");
    if ($user_check->num_rows > 0) {
        echo "Invalid username";
    } else {
        $pass = $_POST['password'];
        $pass_encode = md5($pass);
        $date = date('Y-m-d');
        $query_create_account = "insert into tbl_user(username,password,isadmin,createddate) values ('$user', '$pass_encode',0,'$date')";

        if ($conn->query($query_create_account)) {
            header('location: /DoAnTTCN/account/login.php');
            ob_end_flush();
        }
    }

}
?>

<?php
include '../layout/footer.php'
    ?>