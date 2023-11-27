<?php
include '../config/config.php';
ob_start();
    $var_postid = $_GET['postid'];
    $query_post_byid = "select * from view_post_full where postid = $var_postid";
    $result_full_post = $conn->query($query_post_byid);

$result_cate_side_bar = $conn->query("select * from tbl_category");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Classic - Blog Page</title>
    <!--
Classic Template
http://www.templatemo.com/tm-488-classic
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="../resource/user/css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="../resource/user/css/templatemo-style.css"> <!-- Templatemo style -->
    <link rel="stylesheet" href="../resource/user/css/blogcss.css">
    <link rel="stylesheet" href="../resource/user/css/contentBox.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

</head>

<body>

    <?php
    include '../layout/header.php';
    ?>

    <div class="tm-blog-img-container">

    </div>


    <?php
    if ($result_full_post->num_rows > 0) {
        $post_by_id = $result_full_post->fetch_assoc();
        ?>

        <section class="tm-section">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                        <div class="tm-blog-post">
                            <p>
                                <?php echo $post_by_id['categoryname'] ?>
                            </p>
                            <h3 class="tm-gold-text">
                                <?php echo $post_by_id['title'] ?>
                            </h3>
                            <p>
                                <i>
                                    <?php echo $post_by_id['asbtract'] ?>
                                </i>
                            </p>
                            <div class="post-info-author">
                                <div class="post-info-author-avatar">
                                    <img src="https://images.spiderum.com/sp-xs-avatar/ffb377e0a52811edbcb3fba075c365bd.png"
                                        alt="">
                                </div>
                                <div class="post-info-author-title">
                                    <div class="author-name">
                                        <p> <strong>
                                                <?php echo $post_by_id['fullname'] ?>
                                            </strong></p>
                                    </div>
                                    <div class="created-post">
                                        <p>
                                            <?php echo $post_by_id['createddate'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <img src="../resource/user/img/tm-img-1010x336-1.jpg" alt="Image" class="img-fluid tm-img-post">

                            <br>
                            <?php echo $post_by_id['content'] ?>
                        </div>

                        <div class="form-comment">
                            <div class="form-comment-inline">
                                <form class="input-comment-form"  method="post">
                                    <input type="text" name="postid" value="<?php echo $var_postid ?>" hidden>
                                    <input type="text" name="username" value="<?php  echo $_SESSION['username'] ?>" hidden>
                                    <input type="text" placeholder="Nhập bình luận của bạn vào đây..." name="commenttext">
                                    <button type="submit" name="comment-button">Gửi</button>
                                </form>


                                <div class="comment-list">
                                 <?php 
                                    $comments = $conn->query("select * from view_comment_full where postid = $var_postid order by createddate desc");
                                    if($comments->num_rows>0){
                                        while ($row_cmt = $comments->fetch_assoc()) {
                                ?>

                                    <div class="commenter">
                                        <div class="commenter-info">
                                            <div class="commenter-img">
                                                <img src="  https://www.gravatar.com/avatar/f872ad683a54d281e05c3cc40b819eb2?d=wavatar&f=y"
                                                    alt="">
                                            </div>
                                            <div class="commenter-info-detail">
                                                <div class="commenter-info-name">
                                                    <p> <?php echo $row_cmt['fullname'] ?> </p>
                                                </div>
                                                <div class="commenter-info-date">
                                                    <p><?php echo $row_cmt['createddate'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            <p>
                                               <?php echo $row_cmt['commenttext'] ?>
                                            </p>
                                        </div>
                                    </div>


                                <?php
                                        }
                                    }
                                ?>
                               
                                    
                                </div>
                            </div>

                        </div>
                        <div class="row tm-margin-t-big">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                <div class="tm-content-box">
                                    <img src="../resource/user/img/tm-img-310x180-1.jpg" alt="Image"
                                        class="tm-margin-b-30 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">Lorem ipsum dolor #1</h4>
                                    <p class="tm-margin-b-20">Aenean cursus tellus mauris, quis
                                        consequat mauris dapibus id. Donec
                                        scelerisque porttitor pharetra</p>
                                    <a href="#" class="tm-btn text-uppercase">Detail</a>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                <div class="tm-content-box">
                                    <img src="../resource/user/img/tm-img-310x180-2.jpg" alt="Image"
                                        class="tm-margin-b-30 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">Lorem ipsum dolor #2</h4>
                                    <p class="tm-margin-b-20">Aenean cursus tellus mauris, quis
                                        consequat mauris dapibus id. Donec
                                        scelerisque porttitor pharetra</p>
                                    <a href="#" class="tm-btn text-uppercase">Read More</a>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                <div class="tm-content-box">
                                    <img src="../resource/user/img/tm-img-310x180-3.jpg" alt="Image"
                                        class="tm-margin-b-30 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">Lorem ipsum dolor #3</h4>
                                    <p class="tm-margin-b-20">Aenean cursus tellus mauris, quis
                                        consequat mauris dapibus id. Donec
                                        scelerisque porttitor pharetra</p>
                                    <a href="#" class="tm-btn text-uppercase">Detail</a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-aside-r">

                        <div class="tm-aside-container">
                            <h3 class="tm-gold-text tm-title">
                                Categories
                            </h3>
                            <nav>
                                <ul class="nav">
                                    <?php
                                    if ($result_cate_side_bar->num_rows > 0) {
                                        while ($row_cate_side_bar = $result_cate_side_bar->fetch_assoc()) {
                                            ?>

                                            <li><a href="/DoAnTTCN/post/?cateid=<?php echo $row_cate_side_bar['categoryid'] ?>"
                                                    class="tm-text-link">
                                                    <?php echo $row_cate_side_bar['categoryname'] ?>
                                                </a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <hr class="tm-margin-t-small">

                        </div>


                    </aside>

                </div>

            </div>
        </section>

        <?php
    }
    ?>
    <?php include '../layout/footer.php' ?>
    <?php 

            if (isset($_POST['comment-button'])) {
                $us = $_POST['username'];
                $p = $_POST['postid'];
                $cmt = $_POST['commenttext'];
                $date = date('Y-m-d H:i:s');
                $queryAddcmt = "insert into tbl_comment values (NULL, '$us',$p, '$cmt', '$date') ";
                if($conn->query($queryAddcmt)){
                    $address = "location: post-detail.php?postid=$p";
                    header($address);
                    ob_end_flush();
                }
            else{
                echo "fal cmt";
            }
            }
 ?>

</body>

</html>