<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc');

    $cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc ");
    $cat_array=array();
    while($row=mysqli_fetch_assoc($cat_res)){
        $cat_array[]=$row;
    }
    $obj = new add_to_cart();
    $totalService= $obj->totalService();

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LendyHand - At your service - Get home service by one click </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
<!-- Body main wrapper start -->
<div class="wrapper">
<header id="htc__header" class="htc__header__area header--one">
<div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
    <div class="container">
        <div class="row">
            <div class="menumenu__container clearfix">
                <div class="col-md-3 col-lg-2 col-sm-2 col-xs-3">
                    <div class="logo">
                            <a href="index.php"><img src="images/logo/1.png" alt="logo images"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg -6 col-sm-2 col-xs-3">
                    <nav class="main__menu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">
                            <div class="dropdown">
                                <button class="dropbtn">All Services
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                    <?php
                                        foreach($cat_array as $list){
                                            ?>
                                            <li><a href="categories.php?id=<?php echo $list['id']?> ">
                                            <?php echo $list['categories'] ?></a></li>
                                            <?php } ?> 
                                        </a>
                                </div>
                            </div>
							<li><a href="contacts.php">Contact</a></li>
							<li><a href="service_provider.php">Become service provider</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu clearfix visible-xs visible-sm">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <?php foreach($cat_array as $list){ ?>
								<li><a href="categories.php?id=<?php echo $list['id']?>">
                                <?php echo $list['categories']?> </a></li>
                            <?php } ?>
							<li><a href="contacts.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>  
                </div>
                <div class="col-md-3 col-lg-4 col-sm-8 col-xs-6">
                    <div class="header__right">
                        <div class="header__search search search__open">
                            <a href="#"><i class="icon-magnifier icons"></i></a>
                        </div>
                        <div class="header__account">
                            <?php
                                if (isset($_SESSION['USER_LOGIN'])){
                                    echo '<a href="logout.php">Logout</a> <a href="my_order.php">My Order</a>';
                                }else{
                                    echo '<a href="login.php">Login/Registration</a>';
                                }
                            ?>
                        </div>
                        <div class="htc__shopping__cart">
                            <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                            <a href="cart.php"><span class="htc__qua"><?= $totalService ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-area"></div>
    </div>
</div>
</header>
<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="search__inner">
                        <form action="search.php" method="get">
                        <input placeholder="Search here... " type="text" name="str">
                        <button type="submit"></button>
                    </form>
                    <div class="search__close__btn">
                        <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- End Search Popap -->