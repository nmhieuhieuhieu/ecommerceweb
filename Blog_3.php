
<?php 
 include("Layout/header.php");
?>
<!-- pages-title-start -->
<section class="contact-img-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="con-text">
                                <h2 class="page-title">Blog</h2>
                                <p><a href="#">Home</a> | THÔNG TIN CHƯƠNG TRÌNH</p>
                            </div>
                        </div>
                    </div>
                </div>
</section>
<body>
    
<h2><i class="fas fa-star"></i>  THÔNG TIN CHƯƠNG TRÌNH THẺ THÀNH VIÊN DIRTYCOINS</h2>
<h1>Định nghĩa và quy định về thẻ:</h1></br>
<h5>Thẻ thành viên DirtyCoins là tài sản của công ty TNHH DirtyCoins. Bằng việc sử dụng thẻ, bạn được xem như đã đọc, hiểu rõ và chấp nhận các Điều khoản & Điều kiện của DirtyCoins .</h5></br>
<h5>Vui lòng xuất trình thẻ trước khi giao dịch để được bảo đảm quyền lợi tối đa. Chúng tôi sẽ không giải quyết nếu hoá đơn đã được in ra trước khi xuất trình thẻ thành viên hoặc bạn quên mang thẻ theo.</h5></br>
<h5>Thẻ thành viên DirtyCoins chỉ dành cho chủ sở hữu được ghi nhận khi đăng ký trên hệ thống, không được chuyển nhượng dưới mọi hình thức. Nếu phát hiện ra bất kì dấu hiệu vi phạm, chúng tôi sẽ tiến hành khoá thẻ vì mục đích bảo mật mà không cần báo trước</h5></br>
<h1>Điều kiện đăng ký thẻ thành viên DirtyCoins:</h1></br>
<h6>Hạng thẻ Bronze:</h6></br>
<h3>- Với hoá đơn tích lũy từ 1,000,000đ/năm: khách hàng là thành viên Bronze.</h3></br>
<h6>Hạng thẻ Silver:</h6></br>
<h3>- Với hoá đơn tích lũy từ 5,000,000đ/năm: khách hàng là thành viên Silver.</h3></br>
<div class="image">
    <img src="images/Blog/Blog_3/ảnh1.png" width="700" height="400"/>
</div>
<h6>Hạng thẻ Gold:</h6></br>
<h3>- Với hoá đơn tích luỹ từ 20,000,000đ/năm: khách hàng nhận ngay thẻ Gold.</h3></br>
<div class="image">
    <img src="images/Blog/Blog_3/ảnh2.png"width="700" height="400" />
</div>
<h6>Hạng thẻ Platinum:</h6></br>
<h3>- Với hoá đơn tích luỹ từ 50,000,000đ/năm: khách hàng nhận ngay thẻ Platinum .</h3></br>
<div class="image">
    <img src="images/Blog/Blog_3/ảnh3.png" width="700" height="400"/>
</div>


<!-----------------------Table--------------------------- -->

<h1 class="chitiet">BẢNG CHI TIẾT</h1></br>
<table border="1"  width="822" height="380">
    <tr>
        <th>HẠNG MỤC</td>
        <th>BROZEN</th>
        <th>SIVER</th>
        <th>GOLD</th>
        <th>PLATINUM</th>
    </tr>
    <tr>
        <td >Chi tiêu mua sắm</td>
        <td>1.000.000</td>
        <td>5.000.000</td>
        <td>20.000.000</td>
        <td>50.000.000</td>
    </tr>
    <tr>
        <td>Tích điểm(400k/1 điểm =30k)</td>
        <td>x</td>
        <td>x</td>
        <td>x</td>
        <td>x</td>
    </tr>
    <tr>
        <td>Đổi sản phẩm</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Tên loại thẻ</td>
        <td></td>
        <td>Silver Card</td>
        <td>Gold Card</td>
        <td>Platinum Card</td>
    </tr>
</table>
</html>




<!--------------------------------BÀI VIẾT LIÊN QUAN---------------------- -->
<hr  width="56%" align="center" /><!--đường kẻ ngăn cách giữa bài viết liên quan với ảnh trên -->
<h1 class="bvlq">BÀI VIẾT LIÊN QUAN</h1>

<ul id="list-new">
    <div class="item"><!--sản phẩm 2 -->
        <img src="images/Blog/Blog_3/new2.jpg"width="345" height="345"  alt="">                   
        <div class="name" >7 TIPS PHỐI ĐỒ VỚI VARSITY JACKET </div>
        <div class="name" >THU HÚT MỌI ÁNH</div>
    </div>  
    <div class="box-left" >
        <a href="Blog_1.php"><button>Xem thêm </button><!--nút mua hàng --></a>
    </div>   
    <div class="item"><!--sản phẩm 1 -->
        <img src="images/Blog/Blog_3/new1.jpg"width="345" height="345"  alt="">                   
        <div class="name">DIRTYCOINS X LIL' WUYN: CÚ BẮT TAY </div>
        <div class="name">ĐẬM CHẤT VĂN HÓA ĐƯỜNG PHỐ</div>
    </div>
    <div class="box-left" >
        <a href="Blog_2.php"><button>Xem thêm </button><!--nút mua hàng --></a>
    </div>       
</ul>
<hr class="opacity-20">
</body>
<?php 
include("Layout/footer.php"); 
?>
<style>
    *{
    margin: 0;
    padding: 0;
}

i{/*  chỉnh icon ngôi sao */
    font-size:16px;
    text-align: center;
    padding-right: 10px;
}

h2{/*  chỉnh ô chứa chữ H2 */
text-align: center;
font-size:23px; 
padding-left:345px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
padding-right:343px;
padding-bottom:70px;
padding-top:100px;
}
h1{
    text-align: left;
    font-size:20px; 
    font-weight: 900;
    padding-left:345px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    margin-bottom:10px
}
h5{/*  chỉnh ô chứa chữ H5 */
    text-align: left;
    font-size:16px; 
    font-weight: 50;
    padding-left:345px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    margin-bottom:-10px;
    padding-bottom:20px;
 }

h6{/*  chỉnh ô chứa chữ H6 */
    text-align: left;
    font-size:17px; 
    font-weight: 500;
    padding-left:345px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    text-decoration:underline;

}
h3{
    text-align: left;
    font-size:17px; 
    font-weight: 100;
    padding-left:345px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    margin-top:10px;


}
.image{/*  chỉnh ảnh trong mục body */
    align-items: center;
    text-align: center;
    margin-top:10px;
    margin-bottom:20px;
    margin-left:-120px;

}
/*  ------------------Table-------------------------------- */
h1.chitiet{
    
    padding-top:60px;
    padding-left:875px
}

table{
    align-items: center;
    text-align: center;
    margin-left:500px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    margin-right:343px;
    border-style: solid;
    margin-bottom:70px
    
    
}
td{
    font-size: 16px;
    border-style: solid;
  
    
}


th{
    font-weight:560;

}





/*-----------------BÀI VIẾT LIÊN QUAN--------------------------*/
h1.bvlq{
    text-align: left;
    font-size:16px;
    font-weight: 550;
    padding-left:325px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    padding-bottom:18px;
    margin-top:15px;/*  chỉnh khoảng cách so với chữ bên trên */
}
hr{
    margin-left:326px;
    margin-top:180px
}

#list-new {/*  chỉnh ảnh bài viết liên quan */
    font-size:10px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    padding-left:190px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:317px;
    margin-top:40px;

}

#list-new .item .name {/*  chỉnh chữ bài viết liên quan */
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:20px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
}


#list-new .box-left{
    text-align: center;
    margin-top:435px;/*chỉnh lên xuống nút xem thêm */
    margin-left:-480px;/*chỉnh trái phải nút xem thêm*/
    
}
#list-new .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}
#list-new .box-left button {/*nút buttom mua ngay*/
    font-size:12px;/*chỉnh size chữ*/
    width: 80px;/*chỉnh size dài bóng đen*/
    height: 30px;/*chỉnh size rộng bóng đen*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
}

</style>