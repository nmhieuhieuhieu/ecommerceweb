
<?php
    
	require_once('config.php');
    require_once('database/dbhelper.php');
	if(isset($_POST['submit']) && $_POST["password"] != '' && $_POST["newpassword"] != '' && $_POST["renewpassword"] != ''){
		$password = $_POST['password'];
		$newpassword = $_POST['newpassword'];
        $renewpassword = $_POST['renewpassword'];
        $sql = "SELECT * FROM user WHERE matkhau= '$password'";
        execute($sql);
        if (isset($_COOKIE['matkhau'])) {
            if($password == $_COOKIE['matkhau']) {
                if ($newpassword != $renewpassword) {
                    echo '<script language="javascript">
                    alert("Mật khẩu không khớp, vui lòng nhập lại!!! ");
                    window.location = "changePass.php";
                    </script>';
                    die();
                } else {
                    if (isset($_COOKIE['tendangnhap'])) {
                        $tendangnhap = $_COOKIE['tendangnhap'];
                        $sql = "UPDATE user set matkhau = '$newpassword' WHERE tendangnhap = '$tendangnhap'";
                        execute($sql);
                       
                        echo '<script language ="javascript">
                        alert("Đổi mật khẩu thành công !");
                        window.location = "index.php";
                        </script>';

                        session_start();
                        if (isset($_COOKIE['tendangnhap']) && ($_COOKIE['tendangnhap'])) {
                            setcookie("tendangnhap", "", time() - 30 * 24 * 60 * 60, '/');
                            setcookie("matkhau", "", time() - 30 * 24 * 60 * 60, '/');

                            setcookie("tendangnhap", $tendangnhap, time() + 30 * 24 * 60 * 60, '/');
                            setcookie("matkhau", $newpassword, time() + 30 * 24 * 60 * 60, '/');

                            
                        }
                    }
                }
            } else {
                echo '<script language="javascript">
                        alert("Mật khẩu bạn nhập không chính xác !!!");
                        window.location = "login.php";
                     </script>';
            }
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
                                <h2 class="page-title">ĐỔI MẬT KHẨU</h2>
                                <p><a href="#">Home</a> | Đổi mật khẩu</p>
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
                            <h5 class="tb-title">Đổi mật khẩu</h5>
                            <p>Đổi mật khẩu tài khoản để trải nghiệm mua sắm tại Luxury Store</p>
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
                                        Mật khẩu hiện tại
                                        <em>*</em>
                                    </label>
                                    <input type="password" name="password" required>
                                </p>
                                <p class="checkout-coupon top-down log a-an">
                                    <label class="l-contact">
                                        Mật khẩu mới
                                        <em>*</em>
                                    </label>
                                    <input type="password" name="newpassword" required>
                                </p>
                                <p class="checkout-coupon top-down log a-an">
                                    <label class="l-contact">
                                        Nhập lại mật khẩu mới
                                        <em>*</em>
                                    </label>
                                    <input type="password" name="renewpassword" required>
                                </p>
                                
                                <div class="forgot-password1">
                                    <a class="forgot-password" href="#">Forgot Your password?</a>
                                </div>
                                <p class="login-submit5">
                                    <input class="button-primary" type="submit" name="submit" value="Đổi mật khẩu">
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