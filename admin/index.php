<?php 
    session_start();
	if(!isset($_COOKIE['tendangnhap_admin'])){
		header('Location: login.php');
	}
 ?>

<?php require_once('database/dbhelper.php'); ?>
<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
     date_default_timezone_set('Asia/Ho_Chi_Minh');
     $time = date('d/m/Y', time());
     $mont = date('m', time());
     $date = date('Y-m-d', time());
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Luxury Store</title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<!-- bytewebster.com -->
<!-- bytewebster.com -->
<!-- bytewebster.com -->
<body>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <h3 class="text-success"><img src="/Web/images/logo.png" width="40" ><span class="text-info">LUXURY</span>STORE</h3> 
            </a>
            <!-- Divider -->
            <hr class="navbar-divider my-18 opacity-20">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="product/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Sản Phẩm
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="user/index.php">
                            <i class="bi bi-person-check"></i>Quản Lý Khách Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">
                            <i class="bi bi-cash-stack"></i>Quản Lý Đơn Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="category/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Danh Mục
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="collection/index.php">
                            <i class="bi bi-collection"></i>Quản Lý Thương Hiệu
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="contact/index.php">
                            <i class="bi bi-collection"></i>Quản Lý Liên Hệ
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-18 opacity-20">
        
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="bi bi-house-heart-fill"></i></i> Trang Chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php" onclick="return confirm('Are you sure you want to logout?')">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">
                                <img src="/Web/images/logo.png" width="60"> Luxury Store</h1>
                        </div>
                    </div>
                    <!-- Nav -->
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="col-xl-12 col-sm-12 col-24">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Doanh Thu Tổng</span>
                                    
                                    <span class="h1 font-bold mb-0" style="display: block; text-align: center;">
                                        <?php
                                        $sql = "SELECT SUM(od.price) AS total_price FROM `order_details` od
                                                INNER JOIN `orders` o ON od.order_id = o.id
                                                WHERE od.status = 'Đã nhận hàng'";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        $totalPrice = $row['total_price'];
                                        echo '<span>' .number_format($totalPrice, 0, ',', '.') . ' VNĐ</span>';
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                        <i class="bi bi-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row g-6 mb-6">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="GET" action="">
                                            <label for="selected_date">Chọn ngày:</label>
                                            <input type="date" id="selected_date" name="selected_date">
                                            <button type="submit">Xem</button>
                                        </form>
                                        <?php
                                        $selected_date = isset($_GET['selected_date']) ? $_GET['selected_date'] : date('d-m');
                                        ?>
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Doanh Thu Ngày <?php echo $selected_date; ?> </span>
                                        <?php
                                        $sql_daily = "SELECT SUM(od.price) AS total_price FROM `order_details` od
                                                    INNER JOIN `orders` o ON od.order_id = o.id
                                                    WHERE od.status = 'Đã nhận hàng' AND DATE(o.order_date) = '$selected_date'";
                                        $result_daily = mysqli_query($conn, $sql_daily);
                                        $row_daily = mysqli_fetch_assoc($result_daily);
                                        $totalPrice_daily = $row_daily['total_price'];
                                        echo '<span>' .number_format($totalPrice_daily, 0, ',', '.') . ' VNĐ</span>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="GET" action="">
                                            <label for="selected_month">Chọn tháng:</label>
                                            <input type="month" id="selected_month" name="selected_month">
                                            <button type="submit">Xem</button>
                                        </form>
                                        <?php
                                        $selected_month = isset($_GET['selected_month']) ? $_GET['selected_month'] : date('Y-m');
                                        ?>
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Doanh Thu Tháng <?php echo $selected_month; ?></span>
                                        <?php
                                        $sql_monthly = "SELECT SUM(od.price) AS total_price FROM `order_details` od
                                                    INNER JOIN `orders` o ON od.order_id = o.id
                                                    WHERE od.status = 'Đã nhận hàng' AND DATE_FORMAT(o.order_date, '%Y-%m') = '$selected_month'";
                                        $result_monthly = mysqli_query($conn, $sql_monthly);
                                        $row_monthly = mysqli_fetch_assoc($result_monthly);
                                        $totalPrice_monthly = $row_monthly['total_price'];
                                        echo '<span>' .number_format($totalPrice_monthly, 0, ',', '.') . ' VNĐ</span>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="GET" action="">
                                            <label for="selected_quarter">Chọn quý:</label>
                                            <select id="selected_quarter" name="selected_quarter">
                                                <option value="1" <?php if(isset($_GET['selected_quarter']) && $_GET['selected_quarter'] == '1') echo 'selected'; ?>>Quý 1</option>
                                                <option value="2" <?php if(isset($_GET['selected_quarter']) && $_GET['selected_quarter'] == '2') echo 'selected'; ?>>Quý 2</option>
                                                <option value="3" <?php if(isset($_GET['selected_quarter']) && $_GET['selected_quarter'] == '3') echo 'selected'; ?>>Quý 3</option>
                                                <option value="4" <?php if(isset($_GET['selected_quarter']) && $_GET['selected_quarter'] == '4') echo 'selected'; ?>>Quý 4</option>
                                            </select>
                                            <button type="submit">Xem</button>
                                        </form>
                                        <?php
                                        $currentQuarter = isset($_GET['selected_quarter']) ? $_GET['selected_quarter'] : ceil(date('n') / 3);
                                        ?>
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Doanh Thu Quý <?php echo $currentQuarter; ?></span>
                                        <?php
                                        $sql_quarterly = "SELECT SUM(od.price) AS total_price FROM `order_details` od
                                                        INNER JOIN `orders` o ON od.order_id = o.id
                                                        WHERE od.status = 'Đã nhận hàng' AND QUARTER(o.order_date) = $currentQuarter";
                                        $result_quarterly = mysqli_query($conn, $sql_quarterly);
                                        $row_quarterly = mysqli_fetch_assoc($result_quarterly);
                                        $totalPrice_quarterly = $row_quarterly['total_price'];
                                        echo '<span>' .number_format($totalPrice_quarterly, 0, ',', '.') . ' VNĐ</span>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Sản Phẩm</span>
                                        
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                        $sql = "SELECT * FROM `product`";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        echo '<span>' . mysqli_num_rows($result) . '</span>';
                                        ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Khách Hàng</span>
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                            $sql = "SELECT * FROM `user`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Đơn Hàng</span>
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                            $sql = "SELECT * FROM `order_details`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Danh Mục</span>
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                            $sql = "SELECT * FROM `category`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                            <i class="bi bi-minecart-loaded"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Đơn hàng mới *</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Số Thứ Tự</th>
                                    <th scope="col">Tên Khách Hàng</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Giá Sản Phẩm</th>
                                    <th scope="col">Địa Chỉ</th>
                                    <th scope="col">Số Điện Thoại</th>
                                    <th scope="col">Thời Gian Đặt Hàng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
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
                                                $limit = 10;
                                                $start = ($page - 1) * $limit;

                                                $sql = "SELECT * from orders, order_details, product
                                                where order_details.order_id=orders.id and product.id=order_details.product_id ORDER BY order_date DESC limit $start,$limit ";
                                                $order_details_List = executeResult($sql);
                                                $total = 0;
                                                $count = 0;
                                                // if (is_array($order_details_List) || is_object($order_details_List)){
                                                foreach ($order_details_List as $item) {
                                                    echo '
                                                        <tr>
                                                            <td> 
                                                                <a class="text-heading " href="#">
                                                                    ' . (++$count) . '
                                                                </a>
                                                            </td>
                                                            
                                                            <td> 
                                                                <a class="text-heading font-semibold" href="#">
                                                                    ' . $item['fullname'] . '
                                                                </a>
                                                            </td>

                                                            <td> 
                                                                <a class="text-heading font-semibold" href="#">
                                                                    ' . $item['title'] . '
                                                                </a>
                                                            </td>

                                                            <td> 
                                                                <a class="text-heading " href="#">
                                                                    ' . $item['num'] . '
                                                                </a>
                                                            </td>

                                                            <td> 
                                                                <a class="text-heading " href="#">
                                                                    ' . number_format($item['num'] * $item['price'], 0, ',', '.') . '<span> VNĐ</span>
                                                                </a>
                                                            </td>

                                                            <td> 
                                                                <a class="text-heading " href="#">
                                                                    ' . $item['address'] . '
                                                                </a>
                                                            </td>

                                                            <td> 
                                                                <a class="text-heading " href="#">
                                                                    ' . $item['phone_number'] . '
                                                                </a>
                                                            </td>

                                                            <td> 
                                                                <a class="text-heading " href="#">
                                                                    ' . $item['order_date'] . '
                                                                </a>
                                                            </td>  
                                                        </tr>
                                                    ';
                                                }
                                            } catch (Exception $e) {
                                                die("Lỗi thực thi sql: " . $e->getMessage());
                                            }
                                        ?>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <?php
                                $sql = "SELECT * FROM `product`";
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
                </div>
            </div>
        </main>
    </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>
</html>
