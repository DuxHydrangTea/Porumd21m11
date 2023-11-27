<?php
ob_start();
include '../config/config.php';
include '../layout/header.php';
$us = $_SESSION['username'];
$us_info = $conn->query("select * from tbl_user where username = '$us'");
?>
<div class="container-fluid">
    <div class="change-info-container">
        <div class="change-info-menu">
            <a href="" class="change-info-menu-link">Account</a>
            <a href="" class="change-info-menu-link">Change password</a>
        </div>
        <form class="change-info-form">
            <div class="ci-coverimg">
                <img src="../admin/uploads/-54d.jpg" alt="">
            </div>
            <div class="ci-avatardes">
                <img src="../admin/uploads/14dungpro.png" alt="">
                <textarea name="" id="" cols="30" rows="10"> Mo ta them</textarea>
            </div>
            <div class="ci-nameemail">
                <div class="ci-nameemail-name">
                    <label for=""> Ten day du </label>
                    <br>
                    <input type="text">
                </div>
                <div class="ci-nameemail-email">
                    <label for=""> Email </label>
                    <br>
                    <input type="text">
                </div>
            </div>
            <div class="ci-phonesex">
                <div class="ci-phonesex-phone">
                    <label for=""> Phone </label>
                    <br>
                    <input type="text" class="ci-phone">
                </div>
                <div class="ci-phonesex-sex">
                    <label for=""> Sex</label>
                    <div class="ci-sex-choose">
                        <div class="ci-sex-choose-item">
                            <label for="">Nam</label>
                            <input name="gender" type="radio">
                        </div>
                        <div class="ci-sex-choose-item">
                            <label for="">Nu</label>
                            <input name="gender" type="radio">
                        </div>
                        <div class="ci-sex-choose-item">
                            <label for="">Khac</label>
                            <input name="gender" type="radio">
                        </div>



                    </div>
                </div>
            </div>
            <div class="ci-cccdaddress">
                <div class="ci-nameemail-name">
                    <label for=""> Ten day du </label>
                    <br>
                    <input type="text">
                </div>
                <div class="ci-nameemail-email">
                    <label for=""> Email </label>
                    <br>
                    <input type="text">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include '../layout/footer.php';
?>