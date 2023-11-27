<?php
$query_menu = "select * from tbl_menu where position = 0 limit 4";
$result_menu = $conn->query($query_menu);
$result_categories = $conn->query("select * from tbl_category limit 7");
$result_categories_hidden = $conn->query("select * from tbl_category limit 7,100");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PORUM - Đồ án thực tập</title>
    <!--
Classic Template
http://www.templatemo.com/tm-488-classic
-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/templatemo-style.css"> <!-- Templatemo style -->
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/blogcss.css">
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/contentBox.css">
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/nav-item-list.css">
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/form-account.css">
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/createblog.css">
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/hidden-list.css">
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/info-acc.css">
    <link rel="stylesheet" href="/DoAnTTCN/resource/user/css/change-info.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
   <script  src="/DoAnTTCN/resource/user/js/hidden-list.js"></script>
</head>

<body>
    <div class="tm-header">
        <div class="container-fluid">
            <!-- header-1 -->

            <div class="tm-header-inner">
                <a href="/DoAnTTCN/" class="navbar-brand tm-site-name">Porum</a>

                <!-- navbar -->
                <nav class="navbar tm-main-nav">

                    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse"
                        data-target="#tmNavbar">
                        &#9776;
                    </button>

                    <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                        <ul class="nav navbar-nav">


                            <?php
                            if ($result_menu->num_rows > 0) {
                                while ($row_menu = $result_menu->fetch_assoc()) {
                                    ?>
                                    <li class="nav-item">
                                        <a href="<?php echo $row_menu['link'] ?>" class="nav-link">
                                            <?php echo $row_menu['menuname'] ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <li class="nav-item">
                                <a href="/DoAnTTCN/admin" class="nav-link">
                                    Admin
                                </a>
                            </li>
                            <?php
                            if (isset($_SESSION['username'])) {
                                ?>
                                <li class="nav-item"  onclick="showDiv('profile')" >
                                    <div class="nav-link">
                                        <?php echo $_SESSION['username'] ?>
                                    </div>
                                    <div class="nav-item-setting" id="profile">
                                        <ul>
                                            <li> <a href="/DoAnTTCN/account/account-info.php">Profile</a> </li>
                                            <li><a href="/DoAnTTCN/account/logout.php">Log out</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php
                            } else {


                                ?>
                                <li class="nav-item">
                                    <a href="/DoAnTTCN/account/register.php" class="nav-link">
                                        Đăng ký
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>

                    </div>

                </nav>

            </div>

            <div class="tm-header-2-inner">

                <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="/DoAnTTCN/post/" class="nav-link">
                                Tất cả
                            </a>
                        </li>
                        <?php
                        if ($result_categories->num_rows > 0) {
                            while ($row_cate = $result_categories->fetch_assoc()) {
                                ?>
                                <li class="nav-item">
                                    <a href="/DoAnTTCN/post/?cateid=<?php echo $row_cate['categoryid'] ?>" class="nav-link">
                                        <?php echo $row_cate['categoryname'] ?>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="showDiv('choosecate')"><i class="fa-solid fa-bars"></i></a>
                            <div id="choosecate" class="nav-item-list">
                                <ul class="ul-choose-cate">
                                   <?php 
                                    if($result_categories_hidden->num_rows>0){
                                        while($roww = $result_categories_hidden->fetch_assoc()){
                                    ?>
                                            <li class="list-choose-cate"> <a href="/DoAnTTCN/post/?cateid=<?php echo $roww['categoryid'] ?>"> <?php echo $roww['categoryname']; ?> </a></li>
                                    <?php
                                       }
                                        }
                                    ?>
                                    
                        
                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>

                </nav>

            </div>
        </div>
    </div>
    <?php

    ?>