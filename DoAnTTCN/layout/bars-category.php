<div class="tm-header-2-inner">

    <div class="collapse navbar-toggleable-sm" id="tmNavbar">
        <ul class="nav navbar-nav">
            <?php
            if ($result_categories->num_rows > 0) {
                while ($row_cate = $result_categories->fetch_assoc()) {
                    ?>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">
                            <?php echo $row_cate['categoryname'] ?>
                        </a>
                    </li>
                    <?php
                }
            }
            ?>
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fa-solid fa-bars"></i></a>
            </li>

        </ul>
    </div>

    </nav>

</div>