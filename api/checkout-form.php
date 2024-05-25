<?php
require_once('database/dbhelper.php');

if (!empty($_POST)) {
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    var_dump($cart);
    if ($cart == null || count($cart) == 0) {
        header('Location: index.php');
        die();
    }
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $orderDate = date('Y-m-d H:i:s');


    $sql = "INSERT INTO orders(fullname,email, phone_number,address, note, order_date) 
    values ('$fullname','$email','$phone_number','$address','$note','$orderDate')";
    execute($sql);

    $sql = "SELECT * FROM orders WHERE order_date = '$orderDate'";
    $order = executeResult($sql);  
    foreach ($order as $item) {
        $orderId = $item['id'];
    }

    if (isset($_COOKIE['tendangnhap'])) {
        $tendangnhap = $_COOKIE['tendangnhap'];
        $sql = "SELECT * FROM user WHERE tendangnhap = '$tendangnhap'";
        $user = executeResult($sql);
        foreach ($user as $item) {
            $userId = $item['id_user'];
        }
    }



    $idList = [];
    foreach ($cart as $item) {
        $idList[] = $item['id'];
    }
    if (count($idList) > 0) {
        $idList = implode(',', $idList); 
       

        $sql = "SELECT * FROM product where id in ($idList)";
        $cartList = executeResult($sql);
    } else {
        $cartList = [];
    }
    $status = 'Đang chuẩn bị';
    
    foreach ($cartList as $item) {
        $num = 0;
        foreach ($cart as $value) {
            if ($value['id'] == $item['id']) {
                $num = $value['num'];
                break;
            }
        }
        $sql = "INSERT into order_details(order_id, product_id,id_user, num, price,status) values ('$orderId', " . $item['id'] . ",'$userId','$num', " . $item['price'] . ",'$status')";
        execute($sql);
        echo '<script language="javascript">
                alert("Thêm đơn hàng thành công!"); 
                window.location = "history_product.php";
            </script>';
    }
    setcookie('cart', '[]', time() - 1000, '/');
}
