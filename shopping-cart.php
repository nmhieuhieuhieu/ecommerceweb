<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('utils/utility.php');

    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    $idList = [];
    foreach ($cart as $item) {
        $idList[] = $item['id'];
    }
    if (count($idList) > 0) {
        $idList = implode(',', $idList); // chuyeern
        //[2, 5, 6] => 2,5,6

        $sql = "select * from product where id in ($idList)";
        $cartList = executeResult($sql);
    } else {
        $cartList = [];
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
<!-- shopping-cart content section start -->
<div class="shopping-cart-area s-cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="s-cart-all">
                            <div class="cart-form table-responsive">
                                <?php
                                    if(!isset($_COOKIE['tendangnhap'])){
                                        echo '<p style="font-weight: bold; text-align: center; font-size: 16px;">Vui lòng đăng nhập trước khi thêm vào giỏ hàng.</p>
                                        <hr class="opacity-20">
                                        <div class="row">
                                            <div class="second-all-class">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="sub-total">
                                                        <table>
                                                            <tbody>
                                                                <!-- <tr class="cart-subtotal">
                                                                    <th>Subtotal:</th>
                                                                    <td>
                                                                        <span class="amount">$297.00</span>
                                                                    </td>
                                                                </tr> -->
                                                                <tr class="order-total">
                                                                    <th>Tổng Đơn Hàng:</th>
                                                                    <td>
                                                                        <strong>
                                                                            <span class="amount">0</span>
                                                                            <span> VNĐ</span>
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="wc-proceed-to-checkout" style="text-align: center;">
                                                        <p class="return-to-shop">
                                                            <a class="button wc-backward" href="login.php">Đăng nhập để tiếp tục</a>
                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    <div>
                </div>
            </div>
            </div>
    </div>
</div>   ';
                                    } elseif (empty($cartList)) {
                                        echo '<p style="font-weight: bold; text-align: center; font-size: 16px;">Không có sản phẩm nào ở giỏ hàng.</p>
                                        <hr class="opacity-20">
                                        <div class="col-sm-12 col-xs-12 mx-auto">
                                            <div class="sub-total">
                                                <table>
                                                    <tbody>
                                                        <tr class="order-total">
                                                            <th>Total:</th>
                                                            <td>
                                                                <strong>
                                                                    <span class="amount">0 VNĐ</span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="wc-proceed-to-checkout">
                                                <p class="return-to-shop">
                                                    <a class="button wc-backward" href="index.php">Continue Shopping</a>
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div>
                </div>
            </div>
            </div>
    </div>
</div>   ';
                                    } else {
                                ?>
                                <table id="shopping-cart-table" class="data-table cart-table">
                                    <tr>
                                        <th class="low8">STT</th>
                                        <th class="low1">Ảnh Sản Phẩm</th>
                                        <th class="low1">Tên Sản Phẩm</th>
                                        <th class="low7">Số Lượng</th>
                                        <th class="low7">Giá</th>
                                        <th class="low7">Tổng Tiền</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                    <?php
                                        $count = 0;
                                        $grandTotal = 0; // Sử dụng một biến mới để tính tổng giá trị mới của đơn hàng
                                        foreach ($cartList as $item) {
                                            $num = 0;
                                            foreach ($cart as $value) {
                                                if ($value['id'] == $item['id']) {
                                                    $num = $value['num'];
                                                    break;
                                                }
                                            }
                                            $itemTotal = $num * $item['price']; // Tính tổng giá trị của từng sản phẩm
                                            $grandTotal += $itemTotal; // Cập nhật tổng giá trị mới của đơn hàng
                                            $itemId = 'item_' . $item['id']; // Đặt id động cho mỗi sản phẩm
                                            echo '
                                            <tr style="text-align: center;">
                                                <td width="50px">' . (++$count) . '</td>
                                                <td class="sop-cart an-shop-cart">
                                                    <a><img src="admin/product/' . $item['thumbnail'] . '" alt=""></a>
                                                </td>
                                                <td class="sop-cart an-shop-cart">
                                                    <a>' . $item['title'] . '</a>
                                                </td>
                                                <td class="sop-cart an-sh">
                                                    <div class="quantity ray">
                                                        <input class="input-text qty text" id="' . $itemId . '_num" type="number" size="4" title="Qty" value="' . $num . '" min="1" onchange="updatePrice(\'' . $itemId . '\', ' . $item['price'] . ')" >
                                                    </div>
                                                </td>
                                                <td class="b-500 red">
                                                    <span class="gia none">' . $item['price'] . '</span>
                                                    <span> VNĐ</span>
                                                </td>
                                                <td class="b-500 red">
                                                    <span id="' . $itemId . '_price">' . number_format($itemTotal, 0, ',', '.') . '</span>
                                                    <span> VNĐ</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger" onclick="deleteCart(' . $item['id'] . ')">Xoá</button>
                                                </td>
                                            </tr>
                                            ';
                                        }
                                    ?>
                                        
                                    </tr>

                                </table>
                                
                            </div>
                            <div class="last-check1">
                                <div class="yith-wcwl-share yit">
                                    <p class="checkout-coupon an-cop">
                                        <input type="submit" value="Update Cart" data-item-id="<?= $itemId ?>" onclick="addToCart(this)">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="second-all-class">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="sub-total">
                                <table>
                                    <tbody>
                                        <!-- <tr class="cart-subtotal">
                                            <th>Subtotal:</th>
                                            <td>
                                                <span class="amount">$297.00</span>
                                            </td>
                                        </tr> -->
                                        <tr class="order-total">
                                            <th>Tổng Đơn Hàng:</th>
                                            <td>
                                                <strong>
                                                    <span class="amount"><?= number_format($grandTotal, 0, ',', '.') ?></span>
                                                    <span> VNĐ</span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="wc-proceed-to-checkout">
                                <p class="return-to-shop">
                                    <a class="button wc-backward" href="index.php">Continue Shopping</a>
                                </p>
                                <a class="wc-forward" href="checkout_product.php">Confirm Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php
     }
?>
		<!-- shopping-cart  content section end -->
    <script>
    function addToCart(button) {
    var itemId = button.getAttribute('data-item-id');
    var num = document.getElementById(itemId + '_num').value;

    $.post('api/cookie.php', {
        'action': 'update',
        'id': itemId.split('_')[1],
        'num': num
    }, function (data) {
        location.reload();
    });
}
    function updatePrice(itemId, itemPrice) {
        // Kiểm tra nếu giá trị nhập vào không phải là số hoặc là số nguyên âm
        var priceId = itemId + '_price';
        var num = document.getElementById(itemId + '_num').value;
        if (isNaN(num) || num <= 0) {
                // Nếu không hợp lệ, đặt giá trị mặc định là 1
                numInput.value = 1;
                num = 1;
            }
        var tong = itemPrice * num; // Tính tổng giá trị mới của sản phẩm
        document.getElementById(priceId).innerHTML = tong.toLocaleString();
        updateGrandTotal(); // Gọi hàm cập nhật tổng giá trị mới của đơn hàng
    }
    

    function updateGrandTotal() {
        var grandTotal = 0;
        var itemPrices = document.querySelectorAll('.gia.none');
        var itemQuantities = document.querySelectorAll('.input-text.qty.text');
        for (var i = 0; i < itemPrices.length; i++) {
            var price = itemPrices[i].innerText.match(/\d/g).join("");
            var quantity = itemQuantities[i].value;
            grandTotal += price * quantity;
        }
        document.querySelector('.order-total .amount').innerText = grandTotal.toLocaleString();
    }
    </script>
    <hr class="opacity-20">
<?php require_once('Layout/footer.php'); ?>