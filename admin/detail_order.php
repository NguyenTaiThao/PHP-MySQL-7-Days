<?php
    if(isset($_GET['id'])){
        $cur_id = $_GET['id'];  
        $query = mysqli_query($con, "SELECT * FROM order_list WHERE ord_id = $cur_id");
        $row = mysqli_fetch_assoc($query);
        $prd_arr = explode(';', $row['ord_list']);
        unset($prd_arr[sizeof($prd_arr)-1]);
        $cart = [];
        $cart1 = [];
        $list_id_arr = [];
        foreach($prd_arr as $key => $value){
            $cart[sizeof($cart)] = explode(':', $value);
            $list_id_arr[sizeof($list_id_arr)] = $cart[sizeof($list_id_arr)][0];
            $cart1[$cart[sizeof($cart1)][0]] = $cart[sizeof($cart1)][1];
        }
        $list_id = implode(',', $list_id_arr);
        $query_prd = mysqli_query($con, "SELECT * FROM product WHERE prd_id IN ($list_id)");
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Danh sách đặt hàng</li>
        </ol>
    </div><!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin chi tiết đơn hàng mã số <?php echo $cur_id ?></h1>
        </div>
    <div  style="display:inline-block;" class="col-lg-12">
        <p><b>Họ và tên:</b> <?php echo $row['ord_name'] ?></p>
        <p><b>Số điện thoại:</b> <?php echo $row['ord_phone'] ?></p>
        <p><b>Email:</b> <?php echo $row['ord_mail'] ?></p>
        <p><b>Địa chỉ:</b> <?php echo $row['ord_address'] ?></p>
        <p><b>Thời gian đặt hàng:</b> <?php echo $row['ord_date'] ?></p>
        <hr>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table 
                        data-toolbar="#toolbar"
                        data-toggle="table">

                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">Mã sản phẩm</th>
                            <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                            <th data-field="price" data-sortable="true">Giá bán</th>
                            <th>Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($row_prd = mysqli_fetch_assoc($query_prd)){
                            ?>
                            <tr>
                                <td style=""><?php echo $row_prd['prd_id'] ?></td>
                                <td style=""><?php echo $row_prd['prd_name'] ?></td>
                                <td style=""><?php echo number_format($row_prd['prd_price'], 0, '', '.')?>VND</td>
                                <td><span class="label label-danger"><?php echo $cart1[$row_prd['prd_id']] ?></span></td>
                                <td class="form-group">
                                    <a href="thanhvien-edit.html" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="/" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div><!--/.row-->	
</div>	<!--/.main-->