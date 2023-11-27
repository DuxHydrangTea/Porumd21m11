<?php
ob_start();
include '../config/config.php';
include '../layout/header.php';
$us = $_SESSION['username'];
$us_info = $conn->query("select * from tbl_user where username = '$us'");

// da duyet
$result_post_by_user = $conn->query(" select * from tbl_post where username = '$us' and duyet = 1 ");
//$count_posted = count($result_non_post_by_user);

// chua duyet
$result_non_post_by_user = $conn->query(" select * from tbl_post where username = '$us' and duyet = 0 ");

$us_detail = $us_info->fetch_assoc();
?>

<div class="container-fluid grid-container-acc">
    <div class="info-sidebar">
        <div class="info-side-img"
            style="background-image: url('https://images.spiderum.com/sp-thumbnails/af03cbd0674511ee97ec155b2af6dc03.png')">
            <img src="https://www.gravatar.com/avatar/1e8d971f2d31a33d164c0de5c8a7c4f6?d=wavatar&f=y" alt="">
        </div>
        <div class="info-sidebar-name">
            <strong>
                <?php echo $us_detail['fullname'] ?>
            </strong>
            <p>@
                <?php echo $us_detail['username'] ?>
            </p>
            <button> <a href="/DoAnTTCN/account/account-info-change.php">Chỉnh sửa trang cá nhân</a> </button>
        </div>
        <div class="info-sidebar-follow">
            <div class="follower">
                0
                <p>follower</p>
            </div>
            <div class="follower">
                0
                <p>follower</p>
            </div>
            <div class="follower">
                0
                <p>follower</p>
            </div>

        </div>
    </div>
    <div class="info-more">
        <div class="info-more-select">
            <button onclick="openTab('posted')" class="info-more-option">Đã đăng (
                <?php echo $result_post_by_user->num_rows ?>)
            </button>
            <button onclick="openTab('saved')" class="info-more-option">Chưa duyệt (
                <?php echo $result_non_post_by_user->num_rows ?>)
            </button>
            <button onclick="openTab('nth3')" class="info-more-option">Đã lưu </button>
        </div>
        <div id="posted" class="info-more-list">

            <?php
            if ($result_post_by_user->num_rows > 0) {
                while ($post = $result_post_by_user->fetch_assoc()) {
                    ?>
                    <div class="info-more-item">
                        <div class="info-more-posted">
                            <div class="info-more-posted-img">
                                <img src=" <?php echo $post['thumnail'] ?>" alt="">
                            </div>
                            <div class="info-more-posted-details">
                                <div class="info-more-title">
                                    <a href=""><strong>
                                            <?php echo $post['title'] ?>
                                        </strong></a>
                                </div>
                                <div class="info-more-date">
                                    <div class="info-more-date-asbtract">
                                        <?php echo $post['asbtract'] ?>
                                    </div>
                                    <div class="info-more-date-time"> <i> Đã đăng:
                                            <?php echo $post['createddate'] ?>
                                        </i></div>
                                </div>

                            </div>
                            <div class="info-more-option-icon">
                                <a href=""><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="info-more-posted"></div>
                        <div class="info-more-posted"></div>

                    </div>



                    <?php
                }
            }
            ?>
        </div>
        <div id="saved" class="info-more-list" style="display:none">
            <?php
            if ($result_non_post_by_user->num_rows > 0) {
                while ($post = $result_non_post_by_user->fetch_assoc()) {
                    ?>
                    <div class="info-more-item">
                        <div class="info-more-posted">
                            <div class="info-more-posted-img">
                                <img src="https://images.spiderum.com/sp-thumbnails/c78ad9c065d111eea4989d08f817c613.png"
                                    alt="">
                            </div>
                            <div class="info-more-posted-details">
                                <div class="info-more-title">
                                    <a href=""><strong>
                                            <?php echo $post['title'] ?>
                                        </strong></a>
                                </div>
                                <div class="info-more-date">
                                    <div class="info-more-date-asbtract">
                                        <?php echo $post['asbtract'] ?>
                                    </div>
                                    <div class="info-more-date-time"> <i> Đã đăng:
                                            <?php echo $post['createddate'] ?>
                                        </i></div>
                                </div>

                            </div>
                            <div class="info-more-option-icon">
                                <a href=""><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="info-more-posted"></div>
                        <div class="info-more-posted"></div>

                    </div>



                    <?php
                }
            }
            ?>

        </div>
        <div id="nth3" class="info-more-list" style="display:none">
            <div class="info-more-item">
                <div class="info-more-posted">
                    <div class="info-more-posted-img">
                        <img src="https://images.spiderum.com/sp-thumbnails/f9866bf061c211ee847657b0c0409077.jpg"
                            alt="">
                    </div>
                    <div class="info-more-posted-details">
                        <div class="info-more-title">
                            <a href=""><strong>Bai viet nay co title</strong></a>
                        </div>
                        <div class="info-more-date">
                            <div class="info-more-date-asbtract">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.</div>
                            <div class="info-more-date-time">20-20-2009</div>
                        </div>
                    </div>
                </div>
                <div class="info-more-posted"></div>
                <div class="info-more-posted"></div>

            </div>
            <div class="info-more-item">
                <div class="info-more-posted">
                    <div class="info-more-posted-img">
                        <img src="https://images.spiderum.com/sp-thumbnails/f9866bf061c211ee847657b0c0409077.jpg"
                            alt="">
                    </div>
                    <div class="info-more-posted-details">
                        <div class="info-more-title">
                            <a href=""><strong>Bai viet nay co title</strong></a>
                        </div>
                        <div class="info-more-date">
                            <div class="info-more-date-asbtract">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.</div>
                            <div class="info-more-date-time">20-20-2009</div>
                        </div>
                    </div>
                </div>
                <div class="info-more-posted"></div>
                <div class="info-more-posted"></div>

            </div>
            <div class="info-more-item">
                <div class="info-more-posted">
                    <div class="info-more-posted-img">
                        <img src="https://images.spiderum.com/sp-thumbnails/f9866bf061c211ee847657b0c0409077.jpg"
                            alt="">
                    </div>
                    <div class="info-more-posted-details">
                        <div class="info-more-title">
                            <a href=""><strong>Bai viet nay co title</strong></a>
                        </div>
                        <div class="info-more-date">
                            <div class="info-more-date-asbtract">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.</div>
                            <div class="info-more-date-time">20-20-2009</div>
                        </div>
                    </div>
                </div>
                <div class="info-more-posted"></div>
                <div class="info-more-posted"></div>

            </div>
            <!-- <div class="info-more-item">aaa</div>
            <div class="info-more-item">aaa</div> -->
        </div>
    </div>

</div>
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


<script>
    function openTab(cityName) {
        var i;
        var x = document.getElementsByClassName("info-more-list");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "flex";

    }
</script>