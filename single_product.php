
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
// Lấy id từ trang index.php truyền sang rồi hiển thị nó
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select product.*, collections.name as collection_name from product, collections where product.id_sanpham = collections.id and product.id=' . $id;
    $product = executeSingleResult($sql);
    // Kiểm tra nếu ko có id sp đó thì trả về index.php
    if ($product == null) {
        header('Location: index.php');
        die();
    }
}

?>
<?php 
 include("Layout/header.php");
?>
<!-- pages-title-start -->
<section class="contact-img-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="con-text">
                                <h2 class="page-title">Shop</h2>
                                <p><a href="#">Home</a> | shop</p>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
<main>
    <div class="container">
        <!-- END LAYOUT  -->
        <section class="main">
            <section class="oder-product" >
                <div class="title">
                    <section class="main-order">
                        <h1><?= $product['title'] ?></h1>
                        <div class="box">
                          <div class="left" >
                            <li >
                              <div class="main_image" >
                                <img src="<?='admin/product/'.$product['thumbnail'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_1'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_2'] ?>" alt="">
                              </div>
                            </li>

                            <li>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_3'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_4'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_5'] ?>" alt="">
                              </div>
                            </li>

                        </div>
                        <div class="about">
                            <p style="padding-top:105px;margin-left:10px; width:300px"><?= $product['content'] ?></p>
                            <p style="padding-top:20px;margin-left:10px; width:300px">Thương Hiệu: <span style="font-weight: 600; color:#FF6600"><?= $product['collection_name'] ?></span></p>
                            <div id="myDIV"style="padding-top:10px;margin-left:10px;">
                                <button class="btn">S</button>
                                <button class="btn active">M</button>
                                <button class="btn">L</button>
                            
                            </div>
                            
                            <script>
                            // Add active class to the current button (highlight it)
                            var header = document.getElementById("myDIV");
                            var btns = header.getElementsByClassName("btn");
                            for (var i = 0; i < btns.length; i++) {
                                btns[i].addEventListener("click", function() {
                                var current = document.getElementsByClassName("active");
                                current[0].className = current[0].className.replace(" active", "");
                                this.className += " active";
                                });
                            }
                            </script> 
                            
                            <div class="number"style="padding-top:10px;margin-left:10px;">
                                <span class="number-buy"">Số lượng</span>
                                <input id="num" type="number" value="1" min="1" onchange="updatePrice()">
                            </div>
                            
                            <p class="price"style="padding-top:70px;margin-left:10px;">Giá: <span id="price"><?= number_format($product['price'], 0, ',', '.') ?></span><span> VNĐ</span><span class="gia none"><?= $product['price'] ?></span></p>
                            <?php 
                                if(isset($_COOKIE['tendangnhap'])){
                                    echo '<button class="add-cart" style="margin-left:10px;" onclick="addToCart(' . $id . ')"><i class="fas fa-cart-plus"></i><a href="/cart.php"></a> Thêm vào giỏ hàng</button>
                                    <p></p>
                                    
                                    <button class="buy-now" style="margin-left:10px;" onclick="buyNow(' . $id . ')"><i class="fas fa-money-check"></i> Mua ngay</button>';
                                } else {
                                    echo '<div class="wc-proceed-to-checkout" style="text-align: center;">
                                    <p class="return-to-shop">
                                        <a class="button wc-backward" href="login.php">Đăng nhập để thêm giỏ hàng</a>
                                    </p>
                                    </div>';
                                }
                            ?>
                            

                            <script>
                                function updatePrice() {
                                    var price = document.getElementById('price').innerText; // giá tiền
                                    var num = document.querySelector('#num').value; // số lượng
                                    var gia1 = document.querySelector('.gia').innerText;
                                    var gia = price.match(/\d/g);
                                    gia = gia.join("");
                                    var tong = gia1 * num;
                                    document.getElementById('price').innerHTML = tong.toLocaleString();
                                }
                            </script>
                            <script type="text/javascript">
                                function addToCart(id) {
                                    var num = document.querySelector('#num').value; // số lượng
                                    $.post('api/cookie.php', {
                                        'action': 'add',
                                        'id': id,
                                        'num': num
                                    }, function(data) {
                                        location.reload()
                                    })
                                }

                                function buyNow(id) {
                                        $.post('api/cookie.php', {
                                            'action': 'add',
                                            'id': id,
                                            'num': 1
                                        }, function(data) {
                                            location.assign("checkout_product.php");
                                        })
                                }
                            </script>
                        </div>
                        <div class="fb-comments" data-href="http://localhost/PROJECT/details.php" data-width="750" data-numposts="5"></div>

                    </section>
                </div>
            </section>
            <section class="restaurants">
                <div class="title">
                    <h1>Các sản phẩm khác tại <span class="green" style="color: #0099FF;">LUXURY STORE</span></h1>
                </div>
                <div class="product-restaurants">
                    <div class="row">
                        <?php
                        $sql = 'select * from product';
                        $productList = executeResult($sql);
                        $index = 0;
                        foreach ($productList as $item) {
                            if ($index >= 4) {
                                break;
                            }
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
                            $index++;
                        }
                        ?>
                    </div>
                </div>
            </section>
        </section>
    </div>
</main>
<?php require_once('Layout/footer.php'); ?>