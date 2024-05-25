
<?php
    session_start();
    if(!isset($_COOKIE['tendangnhap'])){
		header('Location: login.php');
	}
    include('config.php');
    require_once('database/dbhelper.php');
  if(isset($_POST['submit'])){
    $hovaten = $_POST['hovaten'];
    $email = $_POST['email'];
    $message_contact = $_POST['message_contact'];
    $created_at = $updated_at = date('Y-m-d H:s:i');
    if (isset($_COOKIE['tendangnhap'])) {
      $tendangnhap = $_COOKIE['tendangnhap'];
      $sql = "SELECT * FROM user WHERE tendangnhap = '$tendangnhap'";
      $user = executeResult($sql);
      foreach ($user as $item) {
          $userId = $item['id_user'];
      }
    } else{
      $userId = "";
    }
    
    if(empty($hovaten) || empty($email) || empty($message_contact)) {
      echo 'Vui lòng nhập đầy đủ thông tin!';
      exit;
      } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo 'Vui lòng nhập đúng định dạng email!';
      exit;
      }
    
		else{
      if(isset($_COOKIE['tendangnhap'])){
        if($hovaten!="" && $email!="" &&  $message_contact!=""){
          $sql = mysqli_query($mysqli,"INSERT INTO contact(hoten,email,message_contact,id_user,created_at,updated_at) VALUE('".$hovaten."','".$email."','".$message_contact."','".$userId."','".$created_at."','".$updated_at."')");
                  echo '<script>alert("Gửi liên hệ thành công.");
                  window.location.href="index.php";
                  </script>';
                  
        } 
      } else {
        if($hovaten!="" && $email!="" &&  $message_contact!=""){
          $sql = mysqli_query($mysqli,"INSERT INTO contact(hoten,email,message_contact,created_at,updated_at) VALUE('".$hovaten."','".$email."','".$message_contact."','".$created_at."','".$updated_at."')");
                  echo '<script>alert("Gửi liên hệ thành công.");
                  window.location.href="index.php";
                  </script>';
        }
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
                                <h2 class="page-title">Liên hệ</h2>
                                <p><a href="#">Home</a> | Liên hệ</p>
                            </div>
                        </div>
                    </div>
                </div>
</section>
<body >
<hr class="opacity-20">
<body>
    <div style>
        <h2 style="color: blue;width: 900px;margin-left: 500px;margin-bottom: 20px;">
        Chúng tôi đã nhận được ý kiến của bạn! cảm ơn bạn </h2>
    </div>

<!-- <div class="container">
    <h2>Mailbox đã gửi</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Họ Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Lấy danh sách Sản Phẩm
            if (!isset($_GET['page'])) {
                $pg = 1;
                echo 'Bạn đang ở trang: 1';
            } else {
                $pg = $_GET['page'];
                echo 'Bạn đang ở trang: ' . $pg;
            }

            try {

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $limit = 5;
                $start = ($page - 1) * $limit;
                $sql = "SELECT * FROM contact, user WHERE contact.id_user = user.id_user limit $start,$limit";;
                executeResult($sql);
                // $sql = 'select * from product limit $star,$limit';
                $contactList = executeResult($sql);

                
                foreach ($contactList as $item) {
                    echo '  <tr>
        
                                <td class="text-heading font-semibold">' . $item['hoten'] . '</td>
                                <td class="text-heading font-semibold">' . $item['email'] . '</td> 
                                <td class="text-heading font-semibold">' . $item['message_contact'] . '</td> 
                                <td class="text-heading font-semibold">' . $item['created_at'] . '</td>                                                  
                            </tr>';
                }
            } catch (Exception $e) {
                die("Lỗi thực thi sql: " . $e->getMessage());
            }
        ?>
        </tbody>
    </table>
    <div class="card-footer border-0 py-5">
                        
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                          <?php
                            $sql = "SELECT * FROM `contact`";
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                $numrow = mysqli_num_rows($result);
                                $current_page = ceil($numrow / 5);
                                // echo $current_page;
                            }
                            for ($i = 1; $i <= $current_page; $i++) {
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page) {
                                    echo '
                            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '
                            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>
                                    ';
                                }
                            }
                        ?>
                          </ul>
                        </nav>
                    </div>
</div> -->


<!-- Bootstrap JS và Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</body>

</html>
<?php 
include("Layout/footer.php"); 
?>