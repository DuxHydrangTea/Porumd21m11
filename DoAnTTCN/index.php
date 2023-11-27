<?php
if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
    header('location: account/register.php');
}
include "../DoAnTTCN/config/config.php"
    ?>


<?php include "../DoAnTTCN/layout/header.php" ?>
<!-- header-2 -->

<div class="tm-home-img-container">
    <h1>PORUM - Diễn đàn chia sẻ quan điểm Việt Nam</h1>
    <p>Môi trường chọn lọc thông tin và rèn luyện kỹ năng phản biện</p>
</div>

<section class="tm-section">
    <div class="container-fluid">
        <?php include "../DoAnTTCN/components/hotest.php" ?>

        <div class="row tm-margin-t-big">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="tm-2-col-left">

                    <h6 class="tm-gold-text tm-title">BÀI VIẾT CỦA TUẦN</h6>
                    <hr>
                    <a href="">

                        <?php
                        $post_index = "select * from view_post_full where postid = 4";
                        $result_post_index = $conn->query($post_index);
                        $week_post = $result_post_index->fetch_array();
                        ?>
                        <h3 class="tm-gold-text tm-title">
                            <?php echo $week_post['title'] ?>
                        </h3>
                    </a>
                    <p class="tm-margin-b-30">
                        <?php echo $week_post['asbtract'] ?>
                    </p>
                    <img src="<?php echo $week_post['thumnail'] ?>" alt="Image" class="tm-margin-b-40 img-fluid">
                    <p>
                        <?php echo substr($week_post['content'], 0, 570) ?>...
                    </p>
                    <a href="#" class="tm-btn text-uppercase">Tìm hiểu thêm</a>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

                <div class="tm-2-col-right">

                    <div class="tm-2-rows-md-swap">
                        <div class="tm-overflow-auto row tm-2-rows-md-down-2">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <h3 class="tm-gold-text tm-title">
                                    Thể loại
                                </h3>
                                <nav>
                                    <ul class="nav">
                                        <li><a href="#" class="tm-text-link">Văn Hoá</a>
                                        </li>
                                        <li><a href="#" class="tm-text-link">Thể dục</a></li>
                                        <li><a href="#" class="tm-text-link">Cuộc sống</a></li>
                                        <li><a href="#" class="tm-text-link">Thể thao</a></li>
                                        <li><a href="#" class="tm-text-link">Du lịch</a></li>
                                    </ul>
                                </nav>
                            </div> <!-- col -->

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 tm-xs-m-t">
                                <h3 class="tm-gold-text tm-title">
                                    Tác giả nổi tiếng
                                </h3>
                                <nav>
                                    <ul class="nav">
                                        <li><a href="#" class="tm-text-link">Lê Hoài Tú</a></li>
                                        <li><a href="#" class="tm-text-link">Nguyễn Ngọc Dũng</a></li>
                                        <li><a href="#" class="tm-text-link">Nguyễn Đức Đạt</a></li>
                                        <li><a href="#" class="tm-text-link">Trần Văn Đức</a></li>
                                        <li><a href="#" class="tm-text-link">DHD Đụt</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> <!-- col -->
                        </div>

                        <div class="row tm-2-rows-md-down-1 tm-margin-t-mid">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h3 class="tm-gold-text tm-title tm-margin-b-30">Bài viết vừa ra mắt <i
                                        class="fa-solid fa-arrow-down"></i></h3>
                                <hr>
                                <?php
                                $result_released_post = $conn->query("select * from view_post_full limit 3");
                                while ($row_released = $result_released_post->fetch_array()) {
                                    ?>
                                    <div class="media tm-related-post">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <img class="media-object" src="<?php echo $row_released['thumnail'] ?>"
                                                    alt="Generic placeholder image" width="240px">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="#">
                                                <h4 class="media-heading tm-gold-text tm-margin-b-15">
                                                    <?php echo $row_released['title'] ?>
                                                </h4>
                                            </a>
                                            <p class="tm-small-font tm-media-description">
                                                <?php echo $row_released['asbtract'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!-- <div class="media tm-related-post">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img class="media-object" src="./resource/user/img/tm-img-240x120-2.jpg"
                                                alt="Generic placeholder image">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#">
                                            <h4 class="media-heading tm-gold-text tm-margin-b-15">Lorem ipsum dolor
                                            </h4>
                                        </a>
                                        <p class="tm-small-font tm-media-description">Aenean cursus tellus mauris,
                                            quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra.
                                        </p>
                                    </div>
                                </div>
                                <div class="media tm-related-post">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img class="media-object" src="./resource/user/img/tm-img-240x120-3.jpg"
                                                alt="Generic placeholder image">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#">
                                            <h4 class="media-heading tm-gold-text tm-margin-b-15">Lorem ipsum dolor
                                            </h4>
                                        </a>
                                        <p class="tm-small-font tm-media-description">Aenean cursus tellus mauris,
                                            quis consequat mauris dapibus id. Donec scelerisque porttitor pharetra.
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div> <!-- row -->

    </div>
</section>
<?php include "../DoAnTTCN/layout/footer.php" ?>