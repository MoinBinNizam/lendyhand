<?php
require('top.php');
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
                                <span class="breadcrumb-item active">Thank You</span>
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
                                         <th class="service-thumbnail">Order ID</th>
                                        <th class="service-name"><span class="nobr"> Order Date</span></th>
                                        <th class="service-price"><span class="nobr"> Address </span></th>
                                        <th class="service-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                        <th class="service-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                        <th class="service-stock-stauts"><span class="nobr"> Order Status </span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $uid=$_SESSION['USER_ID'];
                                       echo "select `order`.* order_status.name as order_status_str from 
                                                                            `order`,order_status where`order`.user_id='$uid' and 
                                                                            order_status.id=`order`.order_status";
                                              $res=mysqli_query($con, "select `order`.* order_status.name as order_status_str from 
                                                                            `order`,order_status where`order`.user_id='$uid' and 
                                                                            order_status.id=`order`.order_status");
                                            while ($row=mysqli_fetch_assoc($res)){

                                                ?>
                                    <tr>
                                        <td class="service-add-to-cart"><a href="my_order_details.php?id=<?php echo $row['id'] ?>"> <?php echo $row['id'] ?></a></td>
                                        <td class="service-name"><?php echo $row['added_on'] ?></td>
                                        <td class="service-name">
                                            <?php echo $row['address'] ?><br>
                                            <?php echo $row['city'] ?><br>
                                            <?php echo $row['post_code'] ?>

                                        </td>
                                        <td class="service-name"><?php echo $row['payment_type'] ?></td>
                                        <td class="service-name"><?php echo $row['payment_status'] ?></td>
                                        <td class="service-name"><?php echo $row['order_status_str'] ?></td>

                                    </tr>
                                   <?php }?>

                                    </tbody>
                                </table>
                            </div>
                        </form>
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