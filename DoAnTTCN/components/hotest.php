<?php
$query_hotest_post = "select * from view_post_full limit 4";
$result_hotest_post = $conn->query($query_hotest_post);
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
        <h2 class="tm-gold-text tm-title">Giới thiệu</h2>
        <p class="tm-subtitle">Diễn đàn chia sẻ quan điểm <strong>PORUM</strong> Việt Nam, nơi tạo ra môi trường để mọi
            người chia sẻ
            quan điểm, đóng góp ý kiến, tiếp thu kiến thức một cách có chọn lọc đồng thời nâng cao kỹ năng phản biện.
        </p>
    </div>
</div>
<div class="row">

    <?php
    if ($result_hotest_post->num_rows > 0) {
        while ($row_hotest_post = $result_hotest_post->fetch_assoc()) {
            ?>


            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="tm-content-box">
                    <img src="<?php echo $row_hotest_post['thumnail'] ?>" alt="Image" class="tm-margin-b-20 img-fluid">
                    <h4 class="tm-margin-b-20 tm-gold-text">
                        <a class="content-box-name"
                            href="/DoAnTTCN/post/post-detail.php?postid=<?php echo $row_hotest_post['postid'] ?>">
                            <?php echo $row_hotest_post['title'] ?>
                        </a>
                    </h4>
                    <p class="tm-margin-b-20">
                        <?php echo substr($row_hotest_post['asbtract'], 0, 100) ?>
                    </p>
                    <div class="infor-post">
                        <div class="avatar">
                            <img src="https://images.spiderum.com/sp-xs-avatar/77fed73025bd11ed9d7ad9f089e43586.png" alt="">
                        </div>
                        <div class="infor-author">
                            <a href="" class="infor-author-link">
                                <?php echo $row_hotest_post['fullname'] ?>
                            </a>
                        </div>
                        <div class="time-post">
                            <p> -
                                <?php echo $row_hotest_post['createddate'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

</div> <!-- row -->
<hr>