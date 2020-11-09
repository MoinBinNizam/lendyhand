<?php
require('top.php');
//pr($_SESSION['cart']);
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Thank You</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion" >
                            <div class="thank-you">
                                Your order has been placed successfully
                        </div>
                            <a class="fr__btn" href="<?php  echo SITE_PATH ?>my_order.php" >See your Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


Shipped


<?php
require('footer.php');

?>

