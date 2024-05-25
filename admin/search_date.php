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
     $date = date('Y-m-d', time());
    
     $dateBegin =  date('Y-m-d', strtotime($_POST['date_begin'])) ;
     $dateEnd =  date('Y-m-d', strtotime($_POST['date_end'])); 
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
                <div class="row g-6 mb-6">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Doanh Thu Ngày <?php echo $time ?> </span>
                                        <?php
                                        $sql_daily = "SELECT SUM(od.price) AS total_price FROM `order_details` od
                                                    INNER JOIN `orders` o ON od.order_id = o.id
                                                    WHERE od.status = 'Đã nhận hàng' AND DATE(o.order_date) = CURDATE()";
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
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Doanh Tháng <?php echo $mont ?></span>
                                        <?php
                                        $sql_monthly = "SELECT SUM(od.price) AS total_price FROM `order_details` od
                                                    INNER JOIN `orders` o ON od.order_id = o.id
                                                    WHERE od.status = 'Đã nhận hàng' AND MONTH(o.order_date) = MONTH(CURDATE())";
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
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Doanh Thu Theo Quý</span>
                                    <?php
                                    $currentQuarter = ceil(date('n') / 3);
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
                    <form class="data-table" action="index.php?page=search_date" method="post">
                        <div class="main__top">
                            <div class="input-group">
                                <div class="tk">
                                    <div class="form-outline " style="display: flex;margin-left: 100px;">
                                        <input id="date_begin" name="date_begin" type="date" class="form-control" placeholder="Ngày 24/4/2024" required style="width: 300px;font-size: 18px ; margin-right: 400px">
                                        <input id="date_end" name="date_end" type="date"  class="form-control" placeholder="Ngày 25/4/2024" required style="width: 300px;font-size: 18px ; margin-right: 100px">
                                    </div>
                                    <button  class="btn search-btn" type="submit" name="btn-search_date" > <i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-header">
                    <form class="data-table" action="" method="POST">
                    <div class="main__top">
                        <div class="input-group">
                            <div class="tk">
                                <div class="form-outline" style="display: flex; margin-left: 100px;">
                                            <input id="date_begin" name="date_begin" type="date" class="form-control" value=" <?php echo date('yyyy-mm-dd',strtotime($_POST['date_begin']))  ?> " required="" style="width: 300px;font-size: 18px ; margin-right: 400px">
                                            <input id="date_end" name="date_end" type="date"  class="form-control" value=" <?php echo $_POST['date_end']  ?> " required="" style=" width: 300px;font-size: 18px ; margin-right: 100px">
                                        </div>
                                <button class="btn search-btn" type="submit" name="btn-search_date" > <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <div class="main__table">
                    <table class="table" id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" onclick="sortTableNumber(0)" class="sort">Mã Phiếu Đặt</th>
                                <th scope="col" >Tên Khách Hàng</th>
                                <th scope="col" onclick="sortTable(2)" class="sort">Thời Gian</th>
                                <th scope="col" onclick="sortTable(3)" class="sort">Trạng thái</th>
                                <th scope="col" onclick="sortTableNumber(4)" class="sort">Tổng Tiền</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php
                             $sql = "SELECT * FROM dathang ,khachhang WHERE `ThoiGianDat`   BETWEEN '$dateBegin' AND ' $dateEnd' AND dathang.MaKH = khachhang.MaKH ";
                            $result_set=mysqli_query($con, $sql);
                            if(mysqli_num_rows($result_set)>0)
                            {
                                while($row=mysqli_fetch_array($result_set))
                                {
                                    ?>
                                        <tr class= "table__row text-center">
                                            <td scope="row"><?php echo $row['MaPhieuDat'] ?></td>
                                            <td><?php echo $row['TenKH'] ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($row['ThoiGianDat']))?></td>
                                            <td><?php echo $row['TrangThai'] ?></td>
                                            <td><?php echo number_format(floatval($row['TongTien'])); ?></td>
                                        </tr> 
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class= "d-flex justify-content-end align-items-center" style="margin-right: 40px;">
                    <h4 style="margin: 0 300px 0 0;">Tổng cộng</h4>
                    <?php 
                     echo number_format(floatval(mysqli_fetch_row(mysqli_query($con, "SELECT SUM(TongTien) FROM dathang WHERE `ThoiGianDat`  BETWEEN '$dateBegin' AND ' $dateEnd'"))[0]));
                    ?>
                    </div>
                </div>
            </form>
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
