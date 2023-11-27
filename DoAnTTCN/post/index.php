<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resource/user/css/contentBox.css">
    <title>Classic - About Page</title>
    <!--
Classic Template
http://www.templatemo.com/tm-488-classic
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="../resource/user/css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="../resource/user/css/templatemo-style.css"> <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>

    <div class="tm-header">
        <div class="container-fluid">
            <?php
            include '../config/config.php';
            include "../layout/header.php";

            $result_cate_side_bar = $conn->query("select * from tbl_category");
            $result_post_for_u = $conn->query("select * from view_post_full limit 3");
            if (!isset($_GET['cateid'])) {
                $post_by_cateid = $conn->query("select * from view_post_full");
            } else {
                $cateid = $_GET['cateid'];
                $post_by_cateid = $conn->query("select * from view_post_full where categoryid = $cateid");
            }

            ?>
        </div>
    </div>

    <div class="tm-about-img-container">
        <h2>KHOA HOC - CONG NGHE</h2>
    </div>

    <section class="tm-section">
        <div class="container-fluid">
            <div class="row tm-2-rows-sm-swap">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-2-rows-sm-down-2">

                    <h3 class="tm-gold-text">Thể Loại</h3>

                    <nav>
                        <ul class="nav">
                            <?php
                            if ($result_cate_side_bar->num_rows > 0) {
                                while ($row_cate_side_bar = $result_cate_side_bar->fetch_assoc()) {
                                    ?>
                                    <li><a href="#" class="tm-text-link">
                                            <?php echo $row_cate_side_bar['categoryname'] ?>
                                        </a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9 tm-2-rows-sm-down-1">
                    <div class="header-for-u">
                        <h3>DÀNH CHO BẠN</h3>
                    </div>

                    <?php
                    if ($result_post_for_u->num_rows > 0) {
                        while ($row_for_u = $result_post_for_u->fetch_assoc()) {
                            ?>
                            <div class="down-1-flex">
                                <div class="down-1-img">
                                    <img src="	https://images.spiderum.com/sp-thumbnails/d7797ab0dbe111eca7c4159745b65a6e.jpg"
                                        alt="">
                                </div>
                                <div class="down-1-item">
                                    <h3>
                                        <a class="tm-gold-text"
                                            href="/DoAnTTCN/post/post-detail.php?postid=<?php echo $row_for_u['postid'] ?>">
                                            <?php echo $row_for_u['title'] ?>
                                        </a>
                                    </h3>
                                    <p>
                                        <?php echo $row_for_u['fullname'] ?> -
                                        <?php echo $row_for_u['createddate'] ?>
                                    </p>
                                    <p>
                                        <?php echo $row_for_u['asbtract'] ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>


                </div>
            </div>
            <div class="header-for-u">
                <h3>DÀNH CHO BẠN</h3>
            </div>
            <div class="parents-box">

                <div class="content-box-flex">

                    <?php
                    if ($post_by_cateid->num_rows > 0) {
                        while ($row_by_cate = $post_by_cateid->fetch_assoc()) {
                            ?>
                            <div class="content-box-item">
                                <div class="content-box-img">
                                    <img src="../resource/user/img/tm-img-310x180-1.jpg" alt="">
                                </div>
                                <div class="content-box-name">
                                    <a class="content-box-name"
                                        href="/DoAnTTCN/post/post-detail.php?postid=<?php echo $row_by_cate['postid'] ?>">
                                        <?php echo $row_by_cate['title'] ?>
                                    </a>
                                </div>
                                <p class="content-box-name-date">
                                    <?php echo $row_by_cate['categoryname'] ?> ~
                                    <?php echo $row_by_cate['createddate'] ?>
                                </p>
                                <div class="content-box-abs">
                                    <p>
                                        <?php echo substr($row_by_cate['asbtract'], 0, 47) ?>...
                                    </p>
                                </div>
                                <div class="content-box-btn">
                                    <p> <a href="">
                                            <?php echo $row_by_cate['fullname'] ?>
                                        </a> - 6 phut doc</p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div style="grid-column:span 3">Chưa có bài viết nào cho thể loại bạn chọn!
                        </div>
                        <?php
                    }
                    ?>




                </div>

                <div class="right-can-u-know">
                    <div class="right-rules">
                        <div class="header-rules">
                            KHOA HOC - CONG NGHE
                        </div>
                        <div class="detail-rules">
                            <p> <b>Nội dung cho phép</b></p>
                            <p>Những tri thức, hiểu biết có liên quan tới các phát minh, xu hướng, lý thuyết trong tất
                                cả các lĩnh vực khoa học cơ bản, tâm lý học, triết học, công nghệ...</p>
                            <p> <b>Quy định</b></p>
                            <ul>
                                <li>Những nội dung không thuộc phạm trù của danh mục sẽ bị nhắc nhở và xoá (nếu không
                                    thay đổi thích hợp)</li>
                                <li>Nghiêm cấm spam, quảng cáo</li>
                                <li>Nghiêm cấm post nội dung 18+ hay những quan điểm cực đoan liên quan tới chính trị -
                                    tôn giáo</li>
                                <li>Nghiêm cấm phát ngôn thiếu văn hoá và đả kích cá nhân.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="right-rules">
                        <div class="can-u-caring">
                            Co the ban quan tam
                        </div>
                        <div class="list-u-caring">
                            <div class="item-u-caring">
                                <div class="item-caring-img">
                                    <img src="	https://images.spiderum.com/sp-xs-avatar/6af98060633a11e9a28fd11406bd98c6.jpg"
                                        alt="">
                                </div>
                                <div class="item-caring-info">
                                    <p><b>Thu nhập của bạn ở mức nào trong xã hội?</b> </p>
                                    <p> <b class="tag-b-author"> Tac gia</b> - 19-29-2002 </p>
                                </div>
                            </div>
                            <div class="item-u-caring">
                                <div class="item-caring-img">
                                    <img src="	https://images.spiderum.com/sp-xs-avatar/6af98060633a11e9a28fd11406bd98c6.jpg"
                                        alt="">
                                </div>
                                <div class="item-caring-info">
                                    <p><b>Thu nhập của bạn ở mức nào trong xã hội?</b> </p>
                                    <p> <b class="tag-b-author"> Tac gia</b> - 19-29-2002 </p>
                                </div>
                            </div>
                            <div class="item-u-caring">
                                <div class="item-caring-img">
                                    <img src="	https://images.spiderum.com/sp-xs-avatar/6af98060633a11e9a28fd11406bd98c6.jpg"
                                        alt="">
                                </div>
                                <div class="item-caring-info">
                                    <p><b>Thu nhập của bạn ở mức nào trong xã hội?</b> </p>
                                    <p> <b class="tag-b-author"> Tac gia</b> - 19-29-2002 </p>
                                </div>
                            </div>
                            <div class="item-u-caring">
                                <div class="item-caring-img">
                                    <img src="	https://images.spiderum.com/sp-xs-avatar/6af98060633a11e9a28fd11406bd98c6.jpg"
                                        alt="">
                                </div>
                                <div class="item-caring-info">
                                    <p><b>Thu nhập của bạn ở mức nào trong xã hội?</b> </p>
                                    <p> <b class="tag-b-author"> Tac gia</b> - 19-29-2002 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divide-pages">
                <ul class="divide-page-ul">
                    <li class="page-active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">Tiếp>> </a></li>
                </ul>
            </div>
        </div> <!-- row -->

        </div>
    </section>

    <?php include '../layout/footer.php' ?>
</body>

</html>