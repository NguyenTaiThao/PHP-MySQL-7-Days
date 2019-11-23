<?php
    $sql = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id ASC LIMIT 6";
    $query = mysqli_query($con, $sql);
?>
<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <div class="product-list card-deck">
        <?php 
            while($row = mysqli_fetch_assoc($query)){
        ?>
        <div class="product-item card text-center">
            <a href="index.php?page_layout=product&id=<?php echo $row['prd_id'];?>"><img src="admin/img/products/<?php echo $row['prd_image'];?>"></a>
            <h4><a href="index.php?page_layout=product&id=<?php echo $row['prd_id'];?>"><?php echo $row['prd_name'];?></a></h4>
            <p>Giá Bán: <span><?php echo number_format($row['prd_price'], 0, '', '.');?></span></p>
        </div>
        <?php
            }
        ?>
    </div>
</div>