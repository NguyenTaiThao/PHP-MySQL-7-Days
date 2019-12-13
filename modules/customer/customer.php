<?php
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['mail']) && isset($_POST['add']) && isset($_SESSION['cart'])){
        if(($_POST['name'] != '') && ($_POST['phone'] != '') && ($_POST['mail'] != '') && ($_POST['add'] != '')){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['mail'];
        $add = $_POST['add'];

        $naiyou = '<div>
            <p style="text-align:center;font-size: 25px;font-weight: bold;color: lightcoral;">XÁC NHẬN ĐƠN HÀNG</p>
            <p>Họ và tên: ' . $name . '</p>
            <p>Số điện thoại: ' . $phone .'</p>
            <p>Địa chỉ: '. $add .'</p>
            <br>
            <table style="width:100%;">';
        $naiyou .= '<tr style="background:cornflowerblue">
            <th style="width:20%;">Mã sản phẩm</th>
            <th style="width:40%;">Tên sản phẩm</th>
            <th style="width:15%;">Giá tiền</th>
            <th style="width:10%;">Số lượng</th>
            <th style="width:15%;">Thành tiền</th>
        </tr>';
        $cart = $_SESSION['cart'];
        foreach($cart as $key=>$value){
            $arr[] = $key;
        }
        $str_key = implode(',',$arr);
        $sql = "SELECT * FROM product WHERE prd_id IN ($str_key)";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($query)){
            $naiyou .= '<tr>
                    <td style="text-align:center;">#'. $row['prd_id'] .'</td>
                    <td>Iphong 8 plus 64BG pink</td>
                    <td style="text-align:center;">'. number_format($row['prd_price'], 0, '', '.') .'</td>
                    <td style="text-align:center;">'. $cart[$row['prd_id']] .'</td>
                    <td style="text-align:center;">'. number_format($row['prd_price'] * $cart[$row['prd_id']], 0, '', '.') .'</td>
                </tr>';
        }
        $naiyou .= '</table>
                <hr>
                <div>
                    <p style="float:left;font-size:18px;color:lightcoral;font-weight: bold;">Tổng tiền:</p>
                    <p style="float:right;font-size:18px;color:lightcoral;font-weight: bold;">'.number_format($money_total, 0, '', '.') .'VNĐ</p>
                </div>
                <div style="clear:both;font-weight:bold;text-align:center;"><u>Cảm ơn bạn đã mua hàng ở BKShop</u></div>
            </div>';
        // $mail = new PHPMailer(true);

        // try {
        //     //Server settings
        //     $mail->isSMTP();                                            // Send using SMTP
        //     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        //     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        //     $mail->Username   = 'thaogreenhouses@gmail.com';                     // SMTP username
        //     $mail->Password   = 'qnvshrazikagnpok';                               // SMTP password
        //     $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        //     $mail->Port       = 587;                                    // TCP port to connect to
            
        //     $mail->CharSet = 'UTF-8';
        //     //Recipients
        //     $mail->setFrom('thaogreenhouses@gmail.com', 'BKShop');
        //     $mail->addAddress($email, $name);     // Add a recipient

        //     // Content
        //     $mail->isHTML(true);                                  // Set email format to HTML
        //     $mail->Subject = 'BKShop xác nhận đơn hàng';
        //     $mail->Body    = $naiyou;

        //     $mail->send();
        //     header("location:index.php?page_layout=success");
        //     include_once("modules/cart/add_dtb.php");
        //     unset($_SESSION['cart']);
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }
        include_once("modules/cart/add_dtb.php");
    }
}

?>
<div id="customer">
    <form method="post" id="frm">
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
        <div class="by-now col-lg-6 col-md-6 col-sm-12" onclick="submit_but()">
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
    function submit_but(){
        document.getElementById('frm').submit();
    }
</script>