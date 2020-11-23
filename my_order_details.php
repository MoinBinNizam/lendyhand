<?php
require('top.php');
$order_id=get_safe_value($con,$_GET['id']);
?>
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Your order details</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- wishlist-area start -->
    <div class="wishlist-area ptb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="wishlist-content">
                        <form action="#">
                            <div class="wishlist-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="service-name"><span class="nobr">Service Name</span></th>
                                        <th class="service-thumbnail">Service Image</th>
                                        <th class="service-thumbnail">Qty</th>
                                         <th class="service-price">Service Price</th>
                                         <th class="service-price">Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $uid=$_SESSION['USER_ID'];
                                        $res=mysqli_query($con, "select distinct (order_detail.id),order_detail.*,services.name,services.img from 
                                                                    order_detail,services, `order` where order_detail.order_id = 
                                                                    '$order_id' and `order`.user_id='$uid' and 
                                                                    order_detail.services_id=services.id");
                                        $total_prices=0;
                                        while ($row=mysqli_fetch_assoc($res)){
                                            $total_prices=$total_prices+((int) $row['qty']*(int)$row['price'] );
                                    ?>
                                    <tr>
                                        <td class="service-name"><?php echo $row['name'] ?></td>
                                        <td class="service-name"><img src="<?php echo SERVICE_IMAGE_SITE_PATH.$row['img'] ?>" > </td>
                                        <td class="service-name"><?php echo $row['qty'] ?></td>
                                        <td class="service-name"><?php echo $row['price'] ?></td>
                                        <td class="service-name"><?php echo ((int) $row['qty']*(int)$row['price'] )?></td>

                                    </tr>
                                   <?php }?>
                                        <tr>
                                             <td colspan="3"></td>
                                            <td class="service-name">Total Price</td>
                                            <td class="service-name"><?php echo $total_prices?></td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                        </form>

                    </div>


                    <div class="main">
                        <div class="content">
                            <div class="section_group">
                                <div class="payment">
                                    <h2>Choose Payment Option</h2>
                                    <a href="?orderid=order">Offline Payment</a>
<!--                                    <a href="pay_online.php">Online Payment</a>-->

                                </div>
                                <div class="back">
                                    <a href="my_order.php">Back</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist-area end -->

    <!-- cart-main-area end -->

<?php
require('footer.php');

?>