<?php
session_start();
if (isset($_COOKIE['tendangnhap']) && ($_COOKIE['tendangnhap'])) {
    setcookie("tendangnhap", "", time() - 30 * 24 * 60 * 60, '/');
    setcookie("matkhau", "", time() - 30 * 24 * 60 * 60, '/');
    setcookie("cart", "", time() - 30 * 24 * 60 * 60, '/');
    header('Location: index.php');
    
}
if (isset($_COOKIE['tendangnhap_admin']) && ($_COOKIE['matkhau_admin'])) {
    setcookie("tendangnhap_admin", "", time() - 30 * 24 * 60 * 60, '/');
    setcookie("matkhau_admin", "", time() - 30 * 24 * 60 * 60, '/');
    header('Location: index.php');
    
}
