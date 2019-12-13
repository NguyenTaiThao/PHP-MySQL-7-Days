<?php
    $sql = "SELECT * FROM order_list  WHERE ord_status = 1 ORDER BY ord_id DESC";
    $query = mysqli_query($con, $sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách đặt hàng</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đặt hàng</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=order&done=1" class="btn btn-danger">
            <i class="glyphicon glyphicon-remove"></i> Các đơn hàng chưa xử lý
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th data-field="price" data-sortable="true">Giá đơn hàng</th>
                                <th data-sortable="true">Thời gian đặt hàng</th>
                                <th data-sortable="true">Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($row = mysqli_fetch_assoc($query)){
                                    $status = 'Chưa xử lý';
                                    $lable = "label label-danger";
                                    if($row['ord_status'] == 1){  
                                        $status = 'Đã xử lý';
                                        $lable = "label label-success";
                                    }
                            ?>
                            <tr>
                            <td style=""><?php echo $row['ord_id']?></td>
                                <td style=""><?php echo $row['ord_name']?></td>
                                <td style=""><?php echo $row['ord_phone']?></td>
                                <td><?php echo number_format($row['ord_total'], 0, '', '.')?> vnd</td>
                                <td><?php echo $row['ord_date']?></td>
                                <td><span class="<?php echo $lable ?>"><?php echo $status ?></span></td>
                                <td class="form-group">
                                    <a href="index.php?page_layout=complete_order&id=<?php echo $row['ord_id'] ?>" disabled class="btn btn-primary"><i
                                            class="glyphicon glyphicon-refresh"></i></a>
                                    <a href="index.php?page_layout=detail_order&id=<?php echo $row['ord_id'] ?>" class="btn btn-danger"><i
                                            class="glyphicon glyphicon-list-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
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
    </div>
    <!--/.row-->
</div>
<!--/.main-->