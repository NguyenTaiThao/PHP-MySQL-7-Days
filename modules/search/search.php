<?php
    if($_GET['search_box'] != ''){
        $key_work = $_GET['search_box'];
        $arr_key = explode(' ', $key_work);
        $str_new = implode('%', $arr_key);
        $str_key = '%' . $str_new . '%';
        $sql = "SELECT * FROM product WHERE prd_name LIKE '$str_key'";
        $query = mysqli_query($con, $sql);
    }else{
        header("location:index.php");
    }
?>
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $key_work;?></span></div>
    <div class="product-list card-deck">
        <?php 
            while($row = mysqli_fetch_assoc($query)){
        ?>
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&id=<?php echo $row['prd_id'];?>"><img src="admin/img/products/<?php echo $row['prd_image'];?>"></a>
                <h4><a href="#"><?php echo $row['prd_name']?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($row['prd_price'], '0', '', '.');?>đ</span></p>
            </div>
        <?php } ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>