<?php
header("content-type:text/html; charset=UTF-8");
require_once('../database/dbhelper.php');

$id = $title = $price = $number = $thumbnail = $content = $id_category = $id_sanpham = "";
$thumbnail_in_database = ""; // Thêm biến này và khởi tạo
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from product where id=' . $id;
    $product = executeSingleResult($sql);
    if ($product != null) {
        $title = $product['title'];
        $price = $product['price'];
        $number = $product['number'];
        $thumbnail = $product['thumbnail'];
        $thumbnail_1 = $product['thumbnail_1'];
		$thumbnail_2 = $product['thumbnail_2'];
		$thumbnail_3 = $product['thumbnail_3'];
		$thumbnail_4 = $product['thumbnail_4'];
		$thumbnail_5 = $product['thumbnail_5'];
        $thumbnail_in_database = $thumbnail; // Gán giá trị cũ cho biến mới
        $thumbnail_in_database = $thumbnail_1; // Gán giá trị cũ cho biến mới
        $thumbnail_in_database = $thumbnail_2; // Gán giá trị cũ cho biến mới
        $thumbnail_in_database = $thumbnail_3; // Gán giá trị cũ cho biến mới
        $thumbnail_in_database = $thumbnail_4; // Gán giá trị cũ cho biến mới
        $thumbnail_in_database = $thumbnail_5; // Gán giá trị cũ cho biến mới
        $content = $product['content'];
        $id_category = $product['id_category'];
        $id_sanpham = $product['id_sanpham'];
        $created_at = $product['created_at'];
        $updated_at = $product['updated_at'];
    }
}
if (!empty($_POST['title'])) {
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $title = str_replace('"', '\\"', $title);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $id = str_replace('"', '\\"', $id);
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
        $price = str_replace('"', '\\"', $price);
    }
    if (isset($_POST['number'])) {
        $number = $_POST['number'];
        $number = str_replace('"', '\\"', $number);
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        // Dữ liệu gửi lên server không bằng phương thức post
        echo "Phải Post dữ liệu";
        die;
    }

    // Kiểm tra có dữ liệu thumbnail trong $_FILES không
    if (isset($_FILES["thumbnail"])) {
        if ($_FILES["thumbnail"]['error'] == 0 && $_FILES["thumbnail"]["size"] > 0) {
            
            //Thư mục bạn sẽ lưu file upload
            $target_dir    = "uploads/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
                if ($check !== false) {
                    echo "Đây là file ảnh - " . $check["mime"] . ".";
                } else {
                    echo "Không phải file ảnh.";
                    die;
                }
            }

            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                die;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                die;
            }

            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $thumbnail = $target_file;
            } else {
                echo "Có lỗi xảy ra khi upload file.";
                die;
            }
        }
    } else {
        // Nếu không có file mới, giữ nguyên giá trị cũ trong cơ sở dữ liệu
        $thumbnail = $thumbnail_in_database;
    }
    // Kiểm tra có dữ liệu thumbnail_1 trong $_FILES không
    if (isset($_FILES["thumbnail_1"])) {
        if ($_FILES["thumbnail_1"]['error'] == 0 && $_FILES["thumbnail_1"]["size"] > 0) {
            
            //Thư mục bạn sẽ lưu file upload
            $target_dir_1    = "uploads/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file_1   = $target_dir_1 . basename($_FILES["thumbnail_1"]["name"]);

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType_1 = pathinfo($target_file_1, PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check_1 = getimagesize($_FILES["thumbnail_1"]["tmp_name"]);
                if ($check_1 !== false) {
                    echo "Đây là file ảnh - " . $check_1["mime"] . ".";
                } else {
                    echo "Không phải file ảnh.";
                    die;
                }
            }

            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail_1"]["size"] > $maxfilesize) {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                die;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType_1, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                die;
            }

            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["thumbnail_1"]["tmp_name"], $target_file_1)) {
                $thumbnail_1 = $target_file_1;
            } else {
                echo "Có lỗi xảy ra khi upload file.";
                die;
            }
        }
    } else {
        // Nếu không có file mới, giữ nguyên giá trị cũ trong cơ sở dữ liệu
        $thumbnail_1 = $thumbnail_in_database;
    }
    
    // Kiểm tra có dữ liệu thumbnail_2 trong $_FILES không
    if (isset($_FILES["thumbnail_2"])) {
        if ($_FILES["thumbnail_2"]['error'] == 0 && $_FILES["thumbnail_2"]["size"] > 0) {
            
            //Thư mục bạn sẽ lưu file upload
            $target_dir_2    = "uploads/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file_2   = $target_dir_2 . basename($_FILES["thumbnail_2"]["name"]);

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType_2 = pathinfo($target_file_2, PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check_2 = getimagesize($_FILES["thumbnail_2"]["tmp_name"]);
                if ($check_2 !== false) {
                    echo "Đây là file ảnh - " . $check_2["mime"] . ".";
                } else {
                    echo "Không phải file ảnh.";
                    die;
                }
            }

            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail_2"]["size"] > $maxfilesize) {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                die;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType_2, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                die;
            }

            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["thumbnail_2"]["tmp_name"], $target_file_2)) {
                $thumbnail_2 = $target_file_2;
            } else {
                echo "Có lỗi xảy ra khi upload file.";
                die;
            }
        }
    } else {
        // Nếu không có file mới, giữ nguyên giá trị cũ trong cơ sở dữ liệu
        $thumbnail_2 = $thumbnail_in_database;
    }

    // Kiểm tra có dữ liệu thumbnail_3 trong $_FILES không
    if (isset($_FILES["thumbnail_3"])) {
        if ($_FILES["thumbnail_3"]['error'] == 0 && $_FILES["thumbnail_3"]["size"] > 0) {
            
            //Thư mục bạn sẽ lưu file upload
            $target_dir_3    = "uploads/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file_3   = $target_dir_3 . basename($_FILES["thumbnail_3"]["name"]);

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType_1 = pathinfo($target_file_3, PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check_1 = getimagesize($_FILES["thumbnail_3"]["tmp_name"]);
                if ($check_1 !== false) {
                    echo "Đây là file ảnh - " . $check_1["mime"] . ".";
                } else {
                    echo "Không phải file ảnh.";
                    die;
                }
            }

            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail_3"]["size"] > $maxfilesize) {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                die;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType_1, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                die;
            }

            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["thumbnail_3"]["tmp_name"], $target_file_3)) {
                $thumbnail_3 = $target_file_3;
            } else {
                echo "Có lỗi xảy ra khi upload file.";
                die;
            }
        }
    } else {
        // Nếu không có file mới, giữ nguyên giá trị cũ trong cơ sở dữ liệu
        $thumbnail_3 = $thumbnail_in_database;
    }

    // Kiểm tra có dữ liệu thumbnail_4 trong $_FILES không
    if (isset($_FILES["thumbnail_4"])) {
        if ($_FILES["thumbnail_4"]['error'] == 0 && $_FILES["thumbnail_4"]["size"] > 0) {
            
            //Thư mục bạn sẽ lưu file upload
            $target_dir_4    = "uploads/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file_4   = $target_dir_4 . basename($_FILES["thumbnail_4"]["name"]);

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType_1 = pathinfo($target_file_4, PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check_1 = getimagesize($_FILES["thumbnail_4"]["tmp_name"]);
                if ($check_1 !== false) {
                    echo "Đây là file ảnh - " . $check_1["mime"] . ".";
                } else {
                    echo "Không phải file ảnh.";
                    die;
                }
            }

            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail_4"]["size"] > $maxfilesize) {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                die;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType_1, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                die;
            }

            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["thumbnail_4"]["tmp_name"], $target_file_4)) {
                $thumbnail_4 = $target_file_4;
            } else {
                echo "Có lỗi xảy ra khi upload file.";
                die;
            }
        }
    } else {
        // Nếu không có file mới, giữ nguyên giá trị cũ trong cơ sở dữ liệu
        $thumbnail_4 = $thumbnail_in_database;
    }

    // Kiểm tra có dữ liệu thumbnail_5 trong $_FILES không
    if (isset($_FILES["thumbnail_5"])) {
        if ($_FILES["thumbnail_5"]['error'] == 0 && $_FILES["thumbnail_5"]["size"] > 0) {
            
            //Thư mục bạn sẽ lưu file upload
            $target_dir_5    = "uploads/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file_5   = $target_dir_5 . basename($_FILES["thumbnail_5"]["name"]);

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType_1 = pathinfo($target_file_5, PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check_1 = getimagesize($_FILES["thumbnail_5"]["tmp_name"]);
                if ($check_1 !== false) {
                    echo "Đây là file ảnh - " . $check_1["mime"] . ".";
                } else {
                    echo "Không phải file ảnh.";
                    die;
                }
            }

            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail_5"]["size"] > $maxfilesize) {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                die;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType_1, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                die;
            }

            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["thumbnail_5"]["tmp_name"], $target_file_5)) {
                $thumbnail_5 = $target_file_5;
            } else {
                echo "Có lỗi xảy ra khi upload file.";
                die;
            }
        }
    } else {
        // Nếu không có file mới, giữ nguyên giá trị cũ trong cơ sở dữ liệu
        $thumbnail_5 = $thumbnail_in_database;
    }
    
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $content = str_replace('"', '\\"', $content);
    }
    if (isset($_POST['id_category'])) {
        $id_category = $_POST['id_category'];
        $id_category = str_replace('"', '\\"', $id_category);
    }
    if (isset($_POST['id_sanpham'])) {
        $id_sanpham = $_POST['id_sanpham'];
        $id_sanpham = str_replace('"', '\\"', $id_sanpham);
    }
    $created_at = $updated_at = date('Y-m-d H:s:i');
    // Lưu vào DB
    if ($id == '') {
        // Thêm danh mục
        $sql = 'insert into product(title, price, number, thumbnail, thumbnail_1, thumbnail_2, thumbnail_3, thumbnail_4, thumbnail_5, content, id_category, id_sanpham, created_at, updated_at) 
        values ("' . $title . '","' . $price . '","' . $number . '","' . $thumbnail . '","' . $thumbnail_1 . '","' . $thumbnail_2 . '","' . $thumbnail_3 . '","' . $thumbnail_4 . '","' . $thumbnail_5 . '","' . $content . '","' . $id_category . '","' . $id_sanpham . '","' . $created_at . '","' . $updated_at . '")';
    } else {
        // Sửa danh mục
        $sql = 'update product set title="' . $title . '",price="' . $price . '",number="' . $number . '",thumbnail="' . $thumbnail . '",thumbnail_1="' . $thumbnail_1 . '",thumbnail_2="' . $thumbnail_2 . '",thumbnail_3="' . $thumbnail_3 . '",thumbnail_4="' . $thumbnail_4 . '",thumbnail_5="' . $thumbnail_5 . '",content="' . $content . '",id_category="' . $id_category . '",id_sanpham="' . $id_sanpham . '", updated_at="' . $updated_at . '" where id=' . $id;
    }
    execute($sql);
    header('Location: index.php');
    die();
}


?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Sản Phẩm</title>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- summernote -->
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</head>

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
                        <a class="nav-link" href="../index.php">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../product/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Sản Phẩm
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../user/index.php">
                            <i class="bi bi-person-check"></i>Quản Lý Khách Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../order.php">
                            <i class="bi bi-cash-stack"></i>Quản Lý Đơn Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../category/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Danh Mục
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../collection/index.php">
                            <i class="bi bi-collection"></i>Quản Lý Thương Hiệu
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
                        <a class="nav-link" href="../../index.php">
                            <i class="bi bi-house-heart-fill"></i></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php" onclick="return confirm('Are you sure you want to logout?')">
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
                    
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
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
                        <h5 class="mb-0">Thêm Sản Phẩm</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Tên Sản Phẩm:</label>
                                    <input type="text" id="id" name="id" value="<?= $id ?>" hidden="true">
                                    <input required="true" type="text" class="form-control" id="title" name="title" value="<?= $title ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Chọn Danh Mục</label>
                                    <select class="form-control" id="id_category" name="id_category">
                                        
                                        <?php
                                        $sql = 'select * from category';
                                        $categoryList = executeResult($sql);
                                        foreach ($categoryList as $item) {
                                            if ($item['id'] == $id_category) {
                                                echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Chọn Thương Hiệu/Bộ Sưu Tập</label>
                                    <select class="form-control" id="id_sanpham" name="id_sanpham">
                                        
                                        <?php
                                        $sql = 'select * from collections';
                                        $collectionList = executeResult($sql);
                                        foreach ($collectionList as $item) {
                                            if ($item['id'] == $id_sanpham) {
                                                echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Giá Sản Phẩm:</label>
                                    <input required="true" type="text" class="form-control" id="price" name="price" value="<?= $price ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số Lượng Sản Phẩm:</label>
                                    <input required="true" type="number" class="form-control" id="number" name="number" value="<?= $number ?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Thumbnail:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail" name="thumbnail" value="<?= $thumbnail ?>">
                                    <img src="<?= $thumbnail ?>" style="max-width: 200px" id="img_thumbnail">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Thumbnail:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_1" name="thumbnail_1" value="<?= $thumbnail_1 ?>">
                                    <img src="<?= $thumbnail_1 ?>" style="max-width: 200px" id="img_thumbnail_1">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Thumbnail:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_2" name="thumbnail_2" value="<?= $thumbnail_2 ?>">
                                    <img src="<?= $thumbnail_2 ?>" style="max-width: 200px" id="img_thumbnail_2">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Thumbnail:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_3" name="thumbnail_3" value="<?= $thumbnail_3 ?>">
                                    <img src="<?= $thumbnail_3 ?>" style="max-width: 200px" id="img_thumbnail_3">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Thumbnail:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_4" name="thumbnail_4" value="<?= $thumbnail_4 ?>">
                                    <img src="<?= $thumbnail_4 ?>" style="max-width: 200px" id="img_thumbnail_4">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Thumbnail:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_5" name="thumbnail_5" value="<?= $thumbnail_5 ?>">
                                    <img src="<?= $thumbnail_5 ?>" style="max-width: 200px" id="img_thumbnail_5">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nội dung</label>
                                    <textarea class="form-control" id="content" rows="3" name="content"><?= $content ?></textarea>
                                </div>
                                <hr class="navbar-divider my-3 opacity-20">
                                <button class="btn btn-success" onclick="addProduct()">Lưu</button>
                                <?php
                                $previous = "javascript:history.go(-1)";
                                if (isset($_SERVER['HTTP_REFERER'])) {
                                    $previous = $_SERVER['HTTP_REFERER'];
                                }
                                ?>
                                <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                            </form>
                        </div>
                        </table>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
</div>
    <script type="text/javascript">
        function updateThumbnail() {
            $('#img_thumbnail').attr('src', $('#thumbnail').val())
        }
        $(function() {
            //doi website load noi dung => xu ly phan js
            $('#content').summernote({
                height: 200
            });
        })
		function addProduct()
        {
            var option = confirm('Bạn thêm sản phẩm thành công')
            if (!option) {
                return;
            }
        }
    </script>
  
</body>
</html>
