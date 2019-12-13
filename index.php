<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/category.css">
</head>
<body>
<?php
    session_start();
    include_once('config/connect.php');
?>
<div id="header">
	<div class="container">
    	<div class="row">
            <?php
                include_once('modules/logo/logo_header.php');
                include_once('modules/search/search_box.php');
                include_once('modules/cart/cart_notify.php');
            ?>
        </div>
    </div>
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
                <?php
                    include_once('modules/category/nav.php');
                ?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
                <?php
                    include_once('modules/slider/slider.php');
                    if(isset($_GET['page_layout'])){
                        switch($_GET['page_layout']){
                            case 'search':
                                include_once('modules/search/search.php');
                                break;
                            case 'cart':
                                include_once('modules/cart/cart.php');
                                break;
                            case 'category':
                                include_once('modules/category/category.php');    
                                break;
                            case 'product':
                                include_once('modules/product/product.php');
                                break;
                            case 'add_cart':
                                include_once('modules/cart/add_cart.php');
                                break;
                        }
                    }else{
                        include_once('modules/product/featured.php');
                        include_once('modules/product/latest.php');
                    }
                ?> 
            </div>
            
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
                <?php
                    include_once('modules/aside/aside.php');
                ?>
            </div>
        </div>
    </div>
</div>
<div id="footer-top">
	<div class="container">
    	<div class="row">
            <?php
                include_once('modules/logo/logo_footer.php');
                include_once('modules/service/service.php');
                include_once('modules/hotline/hotline.php');
            ?>
        </div>
    </div>
</div>
<div id="footer-bottom">
	<div class="container">
    	<div class="row">
            <?php
                include_once('modules/footer/footer.php');
            ?>
        </div>
    </div>
</div>
</body>
</html>
