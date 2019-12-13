<?php
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        foreach($cart as $key=>$value){
            $arr[] = $key;
        }
        $str_key = implode(',',$arr);
        $sql = "SELECT * FROM product WHERE prd_id IN ($str_key)";
        $query = mysqli_query($con, $sql);
    }
    if(isset($_POST['sbm'])){
        $_SESSION['cart'] = $_POST['quantity'];
        header("location:index.php?page_layout=cart");
    }
?>
<div id="my-cart">
    <?php
        if(isset($_SESSION['cart'])){
        $money_total = 0;
    ?>
    <div class="row">
        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
    </div>
    <form method="post">
        <?php while($row = mysqli_fetch_assoc($query)){ 
            $money_total += $row['prd_price'] * $_SESSION['cart'][$row['prd_id']];    
        ?>
        <div class="cart-item row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <img src="admin/img/products/<?php echo $row['prd_image'];?>">
                <h4><?php echo $row['prd_name'];?></h4>
            </div>

            <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                <input type="number" id="quantity" name="quantity[<?php echo $row['prd_id']?>]" class="form-control form-blue quantity" value="<?php echo $_SESSION['cart'][$row['prd_id']];?>" min="1">
            </div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($row['prd_price'], 0, '', '.');?>đ</b><a href="#">Xóa</a></div>
        </div>
        <?php } ?>

        <div class="row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
            </div>
            <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($money_total, 0, '', '.');?>đ</b></div>
        </div>
    </form>
    <?php }else{ echo '<div class="alert alert-danger" role="alert"> Gio hang rong </div>';} ?>

</div>
<!--	End Cart	-->

<!--	Customer Info	-->
<div id="customer">
    <form method="post">
        <div class="row">

            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
            </div>
            <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add"
                    class="form-control" required>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="by-now col-lg-6 col-md-6 col-sm-12" onclick="submit_button()" id="frm">
            <a href="#">
                <b>Mua ngay</b>
                <span>Giao hàng tận nơi siêu tốc</span>
            </a>
        </div>
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#">
                <b>Trả góp Online</b>
                <span>Vui lòng call (+84) 0988 550 553</span>
            </a>
        </div>
    </div>
</div>
<!--	End Customer Info	-->
<script>
    function submit_button(){
        document.getElementById("frm").submit();
    }
</script>