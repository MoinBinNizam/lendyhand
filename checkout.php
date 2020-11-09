<?php
require('top.php');
//check cart in checkout page
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
  ?>
   <script>
    window.location.href='index.php';
    </script>
    <?php
}
$cart_total=0;

if(isset($_POST['submit'])) {
    $address = get_safe_value($con, $_POST['address']);
    $city = get_safe_value($con, $_POST['city']);
    $post_code = get_safe_value($con, $_POST['post_code']);
    $payment_type = get_safe_value($con, $_POST['payment_type']);
    $address = get_safe_value($con, $_POST['address']);
    $user_id = $_SESSION['USER_ID'];
    foreach ($_SESSION['cart'] as $key=>$val) {
        $serviceArr = get_services($con, '', '', $key);
        $total_price = $serviceArr[0]['total_price'];
        $qty = $val['qty'];
        $cart_total = $cart_total + ((int)$total_price * (int)$qty);

    }
    $total_prices = $cart_total;
    $payment_status = 'pending';
    if ($payment_type == 'cod') {
        $payment_status = 'success';
    }
    $order_status = '1';
    $added_on = date('Y-m-d h:i:s');

    mysqli_query($con, "INSERT INTO `order` (user_id,address,city,post_code,payment_type,total_prices,payment_status,order_status,added_on) 
                    values ('$user_id','$address','$city','$post_code','$payment_type','$total_prices','$payment_status','$order_status','$added_on')");

    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $key => $val) {
        $serviceArr = get_services($con, '', '', $key);
        $total_price = $serviceArr[0]['total_price'];
        $qty = $val['qty'];
        mysqli_query($con, "INSERT INTO order_detail (order_id,services_id,qty,price) 
                    values ('$order_id','$key','$qty','$total_price')");

    }
    unset($_SESSION['cart']);
    ?>
    <script>
        window.location.href='thank_you.php';
    </script>
    <?php
}

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
                                <span class="breadcrumb-item active">checkout</span>
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
                <div class="col-md-8">
                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">

                                <?php
                                $accordion_class='accordion__title';
                                if (!isset($_SESSION['USER_LOGIN'])){
                                    $accordion_class='accordion__hide';
                                    ?>

                                    <div class="accordion__title">
                                        Checkout Method
                                    </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form id="login-form"  method="post">
                                                        <h5 class="checkout-method__title">Login</h5>
                                                        <div class="single-input">
                                                            <input type="email" name="login_email" id="login_email"  placeholder="Your Email*" style="width:100%">
                                                            <span class="field_error" id="login_email_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                                            <span class="field_error" id="login_password_error"></span>
                                                        </div>
                                                        <p class="require">* Required fields</p>
                                                        <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_login()">Login</button>
<!--                                                            <div class="form-output login_msg">-->
<!--                                                                <p class="form-messege"></p>-->
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form id="register-form"  method="post">
                                                        <h5 class="checkout-method__title">Register</h5>
                                                        <div class="single-input">
                                                            <input type="text" name="name" id="name" placeholder="Your Name*" >
                                                            <span class="field_error" id="name_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="email" name="email" id="email"  placeholder="Your Email*" >
                                                            <span class="field_error" id="email_error"></span>

                                                        </div>

                                                        <div class="single-input">
                                                            <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" >
                                                            <span class="field_error" id="mobile_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="password" name="password" id="password" placeholder="Your Password*" >
                                                            <span class="field_error" id="password_error"></span>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_register()" >Register</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="<?php echo $accordion_class ?>">
                                    Address Information
                                </div>
                                <form method="post">
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address" placeholder="Street Address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="City/State" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text"  name="post_code" placeholder="Post code/ zip" required >
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="<?php echo $accordion_class ?>">
                                        payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                COD <input type="radio" name="payment_type" value="COD" required>
                                                &nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="payu" required>
                                                </div>
                                            <div class="single-method">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dark-btn">
                                        <input class="fv-btn" type="submit" name="submit" >
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-details">
                        <h5 class="order-details__title">Your Order</h5>
                        <div class="order-details__item">
                        <?php
                            $cart_total=0;
                            foreach ($_SESSION['cart'] as $key=>$val) {
                            $serviceArr = get_services($con, '', '', $key);
                            $name = $serviceArr[0]['name'];
                            $unit_price = $serviceArr[0]['unit_price'];
                            $total_price = $serviceArr[0]['total_price'];
                            $img = $serviceArr[0]['img'];
                            $qty = $val['qty'];
                            $cart_total = $cart_total+((Int)$total_price*(int)$qty);

                        ?>
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="<?php echo SERVICE_IMAGE_SITE_PATH.$img?>" />
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?php echo $name ?></a>
                                    <span class="price"><?php echo ((int)$total_price*(int)$qty) ?></span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Order total</h5>
                            <span class="price"><?php echo $cart_total;?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
<?php
require('footer.php');

?>