<?php require_once('database/config.php');
require_once('database/dbhelper.php');?>
<?php 
 include("Layout/header.php");
?>
    <!-- pages-title-start -->
    <section class="contact-img-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="con-text">
                                <h2 class="page-title">Bộ Sưu Tập</h2>
                                <p><a href="#">Home</a> | Thương hiệu</p>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <div class="container">
        <!-- END LAYOUT  -->
        <section class="main">
            <?php
            
            //switch
            if (isset($_GET['id_sanpham'])) {
                $id_sanpham = trim(strip_tags($_GET['id_sanpham']));
            } else {
                $id_sanpham = 0;
            }
            ?>
            <section class="recently">
                <div class="title">
                    <?php
                    $sql = "select * from collections where id=$id_sanpham";
                    $name = executeResult($sql);
                    foreach ($name as $ten) {
                        echo '<h1>' . $ten['name'] . '</h1>';
                    }
                    ?>
                </div>
                <div class="product-recently">
                    <div class="row">
                        <?php
                        $sql = "select * from product where id_sanpham=$id_sanpham";
                        $productList = executeResult($sql);
                        foreach ($productList as $item) {
                            echo '
                                <div class="col">
                                    <a href="single_product.php?id=' . $item['id'] . '">
                                        <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="images/icon/icon-star.svg" alt="">
                                                <span>4.9</span>
                                            </div>
                                            <div class="time">
                                                <img src="images/icon/icon-clock.svg" alt="">
                                                <span>99 comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                        }
                        ?>
                        <?php
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $sql = "SELECT * from product where title like '%$search%'";
                            $listSearch = executeResult($sql);
                            foreach ($listSearch as $item) {
                                echo '
                                <div class="col">
                                    <a href="single_product.php?id=' . $item['id'] . '">
                                        <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="images/icon/icon-star.svg" alt="">
                                                <span>4.9</span>
                                            </div>
                                            <div class="time">
                                                <img src="images/icon/icon-clock.svg" alt="">
                                                <span>99 comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- <style>
    /* Đặt code CSS tại đây */
    .row:before {
        content: none !important;
    }
    </style> -->

<?php require_once('Layout/footer.php'); ?>