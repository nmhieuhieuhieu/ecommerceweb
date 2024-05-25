
<?php
    
	require_once('config.php');
    require_once('database/dbhelper.php');
	if(isset($_POST['submit'])){
		$tendangnhap = $_POST['tendangnhap'];
		$matkhau = $_POST['matkhau'];
        $sql = "SELECT * FROM user WHERE tendangnhap='".$tendangnhap."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count > 0){
            $user = mysqli_fetch_assoc($row);
            if ($user['role'] == 'admin'){
                // $_SESSION['submit'] = $tendangnhap;
                echo '<script>alert("Xin chào Admin ^^");
                window.location.href="index.php";
                </script>';
                $tendangnhap = trim(strip_tags($_POST['tendangnhap']));
                $matkhau = trim(strip_tags($_POST['matkhau']));
                session_start();
                setcookie("tendangnhap", $tendangnhap, time() + 30 * 24 * 60 * 60, '/');
                setcookie("matkhau", $matkhau, time() + 30 * 24 * 60 * 60, '/');
                
            }
            else {
                // $_SESSION['submit'] = $tendangnhap;
                echo '<script>alert("Đăng nhập thành công.");
                    window.location.href="index.php";
                    </script>';
                session_start();
                setcookie("tendangnhap", $tendangnhap, time() + 30 * 24 * 60 * 60, '/');
                setcookie("matkhau", $matkhau, time() + 30 * 24 * 60 * 60, '/');
            }
			
		}
        else{
			echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");</script>';
			
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
<!-- login content section start -->
<div class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="tb-login-form ">
                            <h5 class="tb-title">Đăng nhập</h5>
                            <p>Đăng nhập tài khoản để trải nghiệm mua sắm tại Luxury Store</p>
                            <!-- <div class="tb-social-login">
                                <a class="tb-facebook-login" href="#">
                                    <i class="fa fa-facebook"></i>
                                    Sign In With Facebook
                                </a>
                                <a class="tb-twitter-login res" href="#">
                                    <i class="fa fa-twitter"></i>
                                    Sign In With Twitter
                                </a>
                            </div> -->
                            <form action="#" method="POST">
                                <p class="checkout-coupon top log a-an">
                                    <label class="l-contact">
                                        Tên đăng nhập
                                        <em>*</em>
                                    </label>
                                    <input type="text" name="tendangnhap" required>
                                </p>
                                <p class="checkout-coupon top-down log a-an">
                                    <label class="l-contact">
                                        Mật khẩu
                                        <em>*</em>
                                    </label>
                                    <input type="password" name="matkhau" required>
                                </p>
                                
                                <div class="forgot-password1">
                                    <label class="inline2">
                                        <input type="checkbox" name="rememberme7">
                                        Remember me! <em>*</em>
                                    </label>
                                    <a class="forgot-password" href="#">Forgot Your password?</a>
                                </div>
                                <p class="login-submit5">
                                    <input class="button-primary" type="submit" name="submit" value="Đăng nhập">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-xs-12">
                        <div class="tb-login-form res">
                            <h5 class="tb-title">Create a new account</h5>
                            <p>Hello, Welcome your to account</p>
                            <form action="#">
                                <p class="checkout-coupon top log a-an">
                                    <label class="l-contact">
                                        Email Address
                                        <em>*</em>
                                    </label>
                                    <input type="email">
                                </p>
                                <p class="login-submit5 ress">
                                    <input value="SignUp" class="button-primary" type="submit">
                                </p>
                            </form>
                            <div class="tb-info-login ">
                                <h5 class="tb-title4">SignUp today and you'll be able to:</h5>
                                <ul>
                                    <li>Speed your way through the checkout.</li>
                                    <li>Track your orders easily.</li>
                                    <li>Keep a record of all your purchases.</li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
		<!-- login  content section end -->
        <hr class="opacity-20">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php require_once('Layout/footer.php'); ?>