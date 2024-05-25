<?php /*
    session_start();
	if(!isset($_SESSION['submit'])){
		header('Location: login.php');
	}
 */ ?>

<?php require_once('database/config.php');
require_once('database/dbhelper.php');?>
<?php 
 include("Layout/header.php");
?>

<body>
<!--------------------BANNER ONE PIECE--------------------------- -->
<section class="slider-main-area">
            <div class="main-slider an-si">
                <div class="bend niceties preview-2 hm-ver-1">
                    <div id="ensign-nivoslider-2" class="slides">	
                        <img src="/Web/images/banner_3.jpg" alt="" title="#slider-direction-3"  />
                        <img src="/Web/images/banner_1.jpg" alt="" title="#slider-direction-1"  />
                    </div>
                    <!-- direction 1 -->
                    <div id="slider-direction-3" class="t-cn slider-direction Builder">
                        <div class="slide-all">
                            <!-- layer 1 -->
                            <div class="layer-1">
                                <h2 class="title5">Phong cách mới</h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2">
                                <h2 class="title6">Luxury Fashion</h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2">
                                <p class="title0">giá cực ưu đãi!</p>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-3">
                                <a class="min1" href="#">Shop Now</a>
                                <!-- <a class="min1" href="shop.php?id_category=1"> -->
                            </div>
                        </div>
                    </div>
                    <div id="slider-direction-1" class="t-cn slider-direction Builder">
                        <div class="slide-all slide2">
                            <!-- layer 1 -->
                            <div class="layer-1">
                                <h2 class="title5">Chỉ hôm nay</h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2">
                                <h2 class="title6">Luxury Fashion</h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2">
                                <p class="title0">Thời trang hot giảm giá!</p>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-3">
                                <a class="min1" href="shop.php?id_category=3">Shop Now</a>
                            </div>
                        </div>
                    </div>
			    </div>
            </div>
        </section>
        <!-- collection section start -->
		<div class="banner-area">
            <div class="container">
                <div class="section-padding1">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="banner-box banner-box-re">
                                <a href="shop.php?id_category=3">
                                    <img alt="" src="images/banner/2.jpg">
                                    <div>
                                        <h2>
                                            Luxury
                                            <span>Store</span>
                                        </h2>
                                        <p>Duyên dáng sang trọng, chất lượng vượt thời gian - Luxury Store, nơi phong cách trở thành đẳng cấp.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="banner-box res-btm">
                                <a href="shop.php?id_category=1">
                                    <img alt="" src="images/banner/3.jpg">
                                    <div>
                                        <h2>
                                            Luxury
                                            <span>Store</span>
                                        </h2>
                                        <p>Duyên dáng sang trọng, chất lượng vượt thời gian - Luxury Store, nơi phong cách trở thành đẳng cấp.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="banner-container banner-box res-btm">
                                <a href="shop.php?id_category=2">
                                    <img alt="" src="images/banner/1.jpg">
                                    <div>
                                        <h2>
                                            Luxury
                                            <span>Store</span>
                                        </h2>
                                        <p>Duyên dáng sang trọng, chất lượng vượt thời gian - Luxury Store, nơi phong cách trở thành đẳng cấp.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="banner-box banner-box-re">
                                <a href="shop.php?id_category=2">
                                    <img alt="" src="images/banner/4.jpg">
                                    <div>
                                        <h2>
                                            Luxury
                                            <span>Store</span>
                                        </h2>
                                        <p>Duyên dáng sang trọng, chất lượng vượt thời gian - Luxury Store, nơi phong cách trở thành đẳng cấp.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="banner-box">
                                <a href="shop.php?id_category=4">
                                    <img alt="" src="images/banner/5.jpg">
                                    <div>
                                        <h2>
                                            Luxury
                                            <span>Store</span>
                                        </h2>
                                        <p>Duyên dáng sang trọng, chất lượng vượt thời gian - Luxury Store, nơi phong cách trở thành đẳng cấp.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- collection section end -->
        <!-- new-products section start -->
		<section class="featured-products single-products section-padding-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-title">
							<h3>SẢN PHẨM TIÊU BIỂU</h3>
							<div class="section-icon">
                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="product-tab nav nav-tabs">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#all">Tất cả sản phẩm</a></li>
                            <?php
                            $categories = executeResult("SELECT * FROM category");
                            foreach ($categories as $category) {
                                echo '<li><a data-toggle="tab" href="#' . $category['name'] . '">' . $category['name'] . '</a></li>';
                            }
                            ?>
                        </ul>
							<!-- <ul>                                        
								<li class="active"><a data-toggle="tab" href="#all">all shop</a></li>
								<li><a data-toggle="tab" href="#clothings">clothings</a></li>
								<li><a data-toggle="tab" href="#shoes">shoes</a></li>
								<li><a data-toggle="tab" href="#bags">bags</a></li>
								<li><a data-toggle="tab" href="#accessories">accessories</a></li>
							</ul> -->
						</div>
					</div>
				</div>
				<div class="row tab-content">
                    <div class="tab-pane  fade in active" id="all">
                            <div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
                            <?php
                                
                                $sql = "SELECT * FROM product";
                                $feature_product = executeResult($sql);
                                
                                $used_feproducts = array ();
                                foreach ($feature_product as $item) {
                                    if (!in_array ($item ['title'], $used_feproducts)) {  //check if the product id is not in the new array
                                        array_push ($used_feproducts, $item ['title']); //add the product id to the new array
                                        echo '
                                <div class="col-xs-12">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="pro-type">
                                                <span>sale</span>
                                            </div>
                                            <a href="single_product.php?id=' . $item['id'] . '"> 
                                                <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="' . $item['title'] . '" />
                                                <img class="secondary-image" alt="' . $item['title'] . '" src="admin/product/' . $item['thumbnail'] . '">
                                            </a>
                                        </div>
                                        <div class="product-dsc">
                                            <h3><a href="#">' . $item['title'] . '</a></h3>
                                            <div class="star-price">
                                                <span class="price-left">' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                                <span class="star-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="actions-btn">
                                            
                                        </div>
                                    </div>

                                </div>';
                                        
                                        
                                        }
                                }
                            ?>
                            </div>
                            
                    </div>
                    <!-- Hoodie product end -->
                    <?php
                    $categories = executeResult("SELECT * FROM category");
                    foreach ($categories as $category) {
                        echo '<div class="tab-pane fade in" id="' . $category['name'] . '">';
                        echo '<div id="tab-carousel-' . $category['id'] . '" class="owl-carousel product-slider owl-theme">';

                        $sql = "SELECT * FROM product WHERE id_category=" . $category['id'];
                        $category_products = executeResult($sql);
                        foreach ($category_products as $product) { // Sửa biến $item thành $product
                            echo '<div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="pro-type">
                                        <span>sale</span>
                                    </div>
                                    <a href="single_product.php?id=' . $product['id'] . '">
                                        <img class="thumbnail" src="admin/product/' . $product['thumbnail'] . '" alt="' . $product['title'] . '" /> <!-- Sửa $item thành $product -->
                                        <img class="secondary-image" alt="' . $product['title'] . '" src="admin/product/' . $product['thumbnail'] . '"> <!-- Sửa $item thành $product -->
                                    </a>
                                </div>
                                <div class="product-dsc">
                                    <h3><a href="#">' . $product['title'] . '</a></h3> <!-- Sửa $item thành $product -->
                                    <div class="star-price">
                                        <span class="price-left">' . number_format($product['price'], 0, ',', '.') . ' VNĐ</span> <!-- Sửa $item thành $product -->
                                        <span class="star-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="actions-btn">
                                    
                                </div>
                            </div>

                        </div>';
                        }

                        echo '</div></div>';
                    }
                    ?>

                

                    
					<!-- bags product end -->
					
					<!-- accessories product end -->
				</div>
			</div>
		</section>
		<!-- new-products section end -->
        <!--------------------BANNER SPRING OF THE Y--------------------------- -->
        <div id="banner2"><!--banner2 baneer rồng -->
            <div class="box-left" >
                <h2>
                    <span>SPRING OF THE ¥ </span>
                </h2>
                <a href="#"><button>Mua ngay </button><!--nút mua hàng --></a>
                <!-- <a href="thucdon_2.php?id_sanpham=2"> -->
            </div>
        </div>
<!--------------------NEW ARRIVALS--------------------------- -->
    <!-- new-products section start -->
		<section class="new-products single-products section-padding-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-title">
							<h3>SẢN PHẨM HOT</h3>
							<div class="section-icon">
							    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
                    <div id="new-products" class="owl-carousel product-slider owl-theme">
                    <?php
                    $sql = 'SELECT * from product, order_details where order_details.product_id=product.id order by order_details.num DESC limit 6';
                    $productList = executeResult($sql);
                    $index = 1;
                    $used_products = array ();
                    foreach ($productList as $item) {
                        if (!in_array ($item ['thumbnail'], $used_products)) {  //check if the product id is not in the new array
                            array_push ($used_products, $item ['thumbnail']); //add the product id to the new array
                            echo '
                    <div class="col-xs-12">
                        <div class="single-product">
                            <div class="product-img">
                                <div class="pro-type">
                                    <span>sale</span>
                                </div>
                                <a href="single_product.php?id=' . $item['product_id'] . '">
                                    <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="' . $item['title'] . '" />
                                    <img class="secondary-image" alt="' . $item['title'] . '" src="admin/product/' . $item['thumbnail'] . '">
                                </a>
                            </div>
                            <div class="product-dsc">
                                <h3><a href="#">' . $item['title'] . '</a></h3>
                                <div class="star-price">
                                    <span class="price-left">' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                    <span class="star-right">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="actions-btn">
                               
                            </div>
                        </div>
                    </div>';
                            $index++;
                            if ($index > 6) {
                                break;
                            }
                            }
                    }
                    ?>
                    </div>
            </div>

			</div>

		</section>

<!--------------------BANNER LILIWYUN--------------------------- -->
    <div id="banner3"><!--banner3 banner liliwyun  -->
        <div class="box-left" >
            <a href="#"><button>Mua ngay </button><!--nút mua hàng --></a>
            <!-- <a href="thucdon_2.php?id_sanpham=3"> -->
        </div>
    </div>



<!--------------------WHAT'S HOT--------------------------- -->

    <section class="blog section-padding-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-title">
							<h3>from the blog</h3>
							<div class="section-icon">
                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div id="blog" class="owl-carousel product-slider owl-theme re-blog">
						<div class="col-xs-12">
							<div class="blog-container-inner">
                                <div class="post-thumb">
                                    <a href="blog.html"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="Web/images/new1.jpg"></a>
                                </div>
                                <div class="visual-inner">
                                    <h2 class="blog-title">
                                        <div class="name">Phụ kiện thời trang - Khám Phá Sự Lịch Lãm Tại Luxury Store</div>
                                    </h2>
                                    <div class="blog-meta">
                                        <span class="post-category">
                                            in
                                            <a rel="category" href="blog.html">Luxury Store</a>
                                        </span>
                                        <span class="published">
                                            <i class="fa fa-clock-o"></i>
                                            Oct 31, 2024
                                        </span>
                                        <!-- <span class="published2">0 comment</span> -->
                                    </div>
                                    <div class="blog-content">
                                    Tại Luxury Store, chúng tôi tin rằng chi tiết là chìa khóa để tạo nên phong cách độc đáo. 
                                    Blog của chúng tôi sẽ giới thiệu đến bạn những chiếc nơ, dây lưng, trang sức và các loại phụ kiện khác, 
                                    giúp bạn tạo nên điểm nhấn hoàn hảo cho bộ trang phục của mình.
                                    </div>
                                </div>
                                <div class="box-left" >
                                    <a href="blog_2.php"><button>Xem thêm </button><!--nút mua hàng --></a>
                                </div>
                            </div>
						</div>
						<!-- single blog item end -->
						<div class="col-xs-12">
							<div class="blog-container-inner">
                                <div class="post-thumb">
                                    <a href="blog.html"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="Web/images/new2.jpg"></a>
                                </div>
                                <div class="visual-inner">
                                    <h2 class="blog-title">
                                        <div class="name">Áo Sơ Mi - Khám Phá Sự Tinh Tế Tại Luxury Store</div>
                                    </h2>
                                    <div class="blog-meta">
                                        <span class="post-category">
                                            in
                                            <a rel="category" href="blog.html">Luxury Store</a>
                                        </span>
                                        <span class="published">
                                            <i class="fa fa-clock-o"></i>
                                            Oct 31, 2024
                                        </span>
                                        <!-- <span class="published2">0 comment</span> -->
                                    </div>
                                    <div class="blog-content"> 
                                    Luxury Store tự hào về bộ sưu tập áo sơ mi nam phong phú từ các thương hiệu hàng đầu thế giới. 
                                    Chất liệu cao cấp, kiểu dáng đa dạng và màu sắc tinh tế, tất cả những yếu tố này được kết hợp tạo nên những chiếc áo sơ mi nam lý tưởng cho mọi dịp. </div>
                                
                                </div>
                                <div class="box-left" >
                                    <a href="Blog_1.php"><button>Xem thêm </button><!--nút mua hàng --></a>
                                </div>  
                            </div> 
						</div>
						<!-- single blog item end -->
						<div class="col-xs-12">
							<div class="blog-container-inner">
                                <div class="post-thumb">
                                    <a href="blog.html"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="Web/images/new3.jpg"></a>
                                </div>
                                <div class="visual-inner">
                                    <h2 class="blog-title">
                                        <div class="name">Giày - Khám Phá Sự Hoàn Hảo Tại Luxury Store</div>
                                    </h2>
                                    <div class="blog-meta">
                                        <span class="post-category">
                                            in
                                            <a rel="category" href="blog.html">Luxury Store</a>
                                        </span>
                                        <span class="published">
                                            <i class="fa fa-clock-o"></i>
                                            Oct 31, 2024
                                        </span>
                                        <!-- <span class="published2">0 comment</span> -->
                                    </div>
                                    <div class="blog-content"> 
                                    Tại Luxury Store, chúng tôi hiểu rằng đôi giày không chỉ là một phần của bộ trang phục mà còn là biểu tượng của phong cách và đẳng cấp. 
                                    Bạn sẽ được đắm chìm trong thế giới của sự sang trọng khi khám phá những mẫu giày độc đáo từ các thương hiệu danh tiếng.
                                    </div>
                                </div>
                                <div class="box-left" >
                                    <a href="Blog_1.php"><button>Xem thêm </button><!--nút mua hàng --></a>
                                </div>
                                
                            </div>
						</div>
						<!-- single blog item end -->
						<div class="col-xs-12">
							<div class="blog-container-inner">
                                <div class="post-thumb">
                                    <a href="#"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="Web/images/new1.jpg"></a>
                                </div>
                                <div class="visual-inner">
                                    <h2 class="blog-title">
                                        <div class="name">Áo Vest - Sự Lịch Lãm Tại Luxury Store</div>
                                    </h2>
                                    <div class="blog-meta">
                                        <span class="post-category">
                                            in
                                            <a rel="category" href="blog.html">Luxury Store</a>
                                        </span>
                                        <span class="published">
                                            <i class="fa fa-clock-o"></i>
                                            Oct 31, 2024
                                        </span>
                                        <!-- <span class="published2">0 comment</span> -->
                                    </div>
                                    <div class="blog-content"> 
                                    Áo Vest không chỉ là một món đồ, mà còn là biểu tượng của sự lịch lãm và tinh tế. 
                                    Chúng tôi tự hào mang đến cho bạn những mẫu áo Vest đẳng cấp từ những nhãn hiệu danh tiếng, với các kiểu dáng và màu sắc đa dạng để bạn có thể tự do lựa chọn phản ánh phong cách riêng của mình. </div>
                                </div>
                                <div class="box-left" >
                                    <a href="blog_3.php"><button>Xem thêm </button><!--nút mua hàng --></a>
                                </div>
                            </div>
						</div>
						<!-- single blog item end -->
					</div>
				</div>
			</div>
		</section>
<!--------------------BANNER SALE--------------------------- -->
    <div id="banner4"><!--banner4 banner sale off  -->
        <div class="box-left" >
            <a href="signup.php"><button>SIGN UP FOR FREE →</button><!--nút đăng ký --></a>
        </div>
    </div>
    
   </section>
   <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- parallax js -->
    <script src="js/parallax.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Img Zoom js -->
    <script src="js/img-zoom/jquery.simpleLens.min.js"></script>
    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- jquery.countdown js -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- Nivo slider js
    ============================================ --> 		
    <script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="lib/home.js" type="text/javascript"></script>
    <!-- jquery-ui js -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- sticky js -->
    <script src="js/sticky.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
</body>
<style>     /* ------------------------Banner one piece------------------------------*/
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    
}
#banner1 {
    width: 100%;
    
    background-image :url("/Web/images/banner onepiece.png");
    
    height: 880px;/*chỉnh size banner*/
    margin-top:70px;
    display: flex;
    padding:0px 133px;
    position:relative;
}
#banner1 .box-left ,#banner .box-right {
    width: 50%;
}


#banner1 .box-left button {/*nút buttom mua ngay*/
    font-size:20px;/*chỉnh size chữ*/
    width: 170px;/*chỉnh size dài bóng đen*/
    height: 45px;/*chỉnh size rộng bóng đen*/
    margin-top:420px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:-18px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
}
#banner1 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}



/* ------------------------NEW ARRIVALS------------------------------*/
  section.main {
  padding: 0 0;
  width: 100%;
  margin: 0px auto;
}
section.main a {
  text-decoration: none;
}
section.main section.recently {
  padding-bottom: 3rem;
  padding-left: 3rem;
  padding-right: 3rem;
}
section.main section.recently .link a {
  text-decoration: none;
  color: black;
  font-size: 20px;
}
section.main section.recently .title h1 {
  font-size: 35px;
  margin: 0px;
  padding: 30px;
  color: black;
  text-align:center;
}
section.main section.recently .product-recently {
  padding-top: 2rem;
}
section.main section.recently .product-recently .row {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-column-gap: 30px;
  grid-row-gap: 30px;
}

section.main section.recently .product-recently .row .col img {
  width: 100%;
  border-radius: 10px;
}
section.main section.recently .product-recently .row .col img.thumbnail {
  border: 1px solid rgb(76, 78, 85);
  transition: 0.1s;
}
section.main section.recently .product-recently .row .col img.thumbnail:hover {
  box-shadow: 0px 0px 5px 0px grey;
}
section.main section.recently .product-recently .row .col .title p {
  font-size: 20px;
  font-weight: 600;
  padding: 0px;
  margin: 5px 0;
  color: black;
  font-family: "Encode Sans SC", sans-serif;
}
section.main section.recently .product-recently .row .col .price span {
  padding: 10px 0;
  color: #676767;
  font-size: 20px;
  font-weight: 600;
  color: rgba(207, 16, 16, 0.815);
  font-family: "Bebas Neue", cursive;
}
section.main section.recently .product-recently .row .col .dish span {
  padding: 10px 0;
  color: #676767;
}

section.main section.recently .product-recently .row .col .more {
  display: flex;
  color: #676767;
  padding: 5px 0;
  font-size: 18px;
}
section.main section.recently .product-recently .row .col .more .star {
  display: flex;
  align-items: center;
  justify-content: center;
}

section.main section.recently .product-recently .row .col .more .star img {
  width: 25px;
  height: 25px;
  
}
section.main section.recently .product-recently .row .col .more .time {
  display: flex;
  padding: 0 10px;

}
section.main section.recently .product-recently .row .col .more .time img {
  width: 24px;
  height: 24px;

}
#wp-products {/*căn nguyên lish new arrival và sản phẩm */
    padding-top:130px;/*cách banner trên*/
    padding-bottom: 78px;
    padding-left:0px;
    padding-right:0px;/*căn phải với web*/
}

#wp-products h2 {
    text-align: center;
    margin-bottom: 76px;/*căn trên so với chữ new arrival*/
    font-size:5x;/*size chữ New Arrival*/
    color:black;
    margin-left:40px;
}


#list-products {
    font-size:17px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
}

#list-products .item {
    width: 100%px;/*căn trái phải của hình ảnh so với lề*/
    height: 0px;/*chỉnh khung border sau ảnh*/
    background:#fafafa;
    border-radius: 0px;
    margin-bottom: 460px;/*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
}


#list-products .item .name {
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:0px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
}

#list-products .item .price {
    text-align: center;
    color:#090909;
    font-weight: bold;
    margin-top:0px;/*chỉnh khoảng cách từ giá tiền so với tên sản phẩm*/
}


.list-page {
    width: 50%;
    margin:0px auto;
}

.list-page {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
}


/* ------------------------Banner SPRING OF THE Y------------------------------*/
#banner2 {/* banner rồng*/
    width: 100%;
    background-image :url("/Web/images/banner rồng2.jpg");
    background-size:cover;
    height: 710px;/*chỉnh size banner*/
    margin-top:40px;
    display: flex;
    padding:0px 133px;
    position:relative;
}
#banner2 .box-left ,#banner .box-right {
    width: 50%;
}

#banner2  .box-left h2 {/* chỉnh chữ spring of the Y*/
    
    font-size:50px;
    margin-top:55px;
    margin-left:409px;
    width: 100%;
    padding:0px 30px;   
    font-family:Tahoma ;
    color:#AE611D
}

#banner2 .box-left button {/*nút buttom mua ngay*/
    font-size:20px;/*chỉnh size chữ*/
    width: 170px;/*chỉnh size dài bóng đen*/
    height: 45px;/*chỉnh size rộng bóng đen*/
    margin-top:460px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:565px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
}
#banner2 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}


/* ------------------------Banner LILIWUYN------------------------------*/
#banner3 {/* banner lilywuyn*/
    width: 100%;
    background-image :url("/Web/images/banner liliwuyn2.jpg");
    background-size:cover;
    height: 700px;/*chỉnh size banner*/
    margin-top:-40px;
    display: flex;
    padding:0px 133px;
    position:relative;
}
#banner3 .box-left ,#banner .box-right {
    width: 50%;
}

#banner3 .box-left button {/*nút buttom mua ngay*/
    font-size:20px;/*chỉnh size chữ*/
    width: 170px;/*chỉnh size dài bóng đen*/
    height: 45px;/*chỉnh size rộng bóng đen*/
    margin-top:435px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:565px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
}
#banner3 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}



/* ------------------------WHAT'S HOT------------------------------*/


#new {/*căn nguyên lish new arrival và sản phẩm */
    padding-top:50px;/*cách banner trên*/
    padding-bottom: 78px;
    padding-left:0px;
    padding-right:160px;/*căn phải với web*/
     
}

#new h2 {
    padding-left:175px;
    text-align: center;
    margin-bottom: 50px;/*căn trên so với chữ WHAT'S HOT*/
    font-size:5x;/*size chữ WHAT'S HOT*/
    color:black;
    
}


#list-new {
    font-size:13px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
}

#list-new .item {
    width: 100%px;/*căn trái phải của hình ảnh so với lề*/
    height: 0px;/*chỉnh khung border sau ảnh*/
    background:#fafafa;
    border-radius: 0px;
    margin-bottom: 460px;/*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
}


#list-new .item .name {
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:20px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
}


.list-page {
    width: 50%;
    margin:0px auto;
}

.list-page {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
}
.blog-container-inner .box-left{
    text-align: center;
    margin-top:15px;/*chỉnh lên xuống nút xem thêm */
    
    
}
.blog-container-inner .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}

.blog-container-inner .box-left button {/*nút buttom mua ngay*/
    font-size:13px;/*chỉnh size chữ*/
    width: 90px;/*chỉnh size dài bóng đen*/
    height: 35px;/*chỉnh size rộng bóng đen*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
}


/* ------------------------Banner 4------------------------------*/
#banner4 {/* banner sale off*/
    width: 100%;
    background-image :url("/Web/images/banner saleoff2.jpg");
    background-size:cover;
    height: 113px;/*chỉnh size banner*/
    margin-top:-20px;
    margin-left:0px;
    display: flex;
    padding:0px 133px;
    position:relative;
}
#banner4 .box-left ,#banner .box-right {
    width: 50%;
}

#banner4 .box-left button {/*nút buttom mua ngay*/
    font-size:15px;/*chỉnh size chữ*/
    width: 190px;/*chỉnh size dài bóng đen*/
    height: 55px;/*chỉnh size rộng bóng đen*/
    margin-top:27px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:670px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;
}
#banner4 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}
  @media screen and  (max-width: 870px)  and (min-width:300px){
    body {
   width: 1600px;
    }

}

</style>


<?php require_once('Layout/footer.php'); ?>
