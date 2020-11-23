<?php
require ('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
   $update_order_status= $_POST['update_order_status'];
   mysqli_query($con, "update `order` set order_status='$update_order_status' where id='$order_id' " );


}

?>
    <div class="content pb-0">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Order Details </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
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
                                    /*prx("select distinct (order_detail.id),order_detail.*,services.name,services.img,
                                                                        `order`.address,`order`.city,`order`.post_code  from
                                                                        order_detail,services,`order` where order_detail.order_id =
                                                                        '$order_id' and  order_detail.services_id=services.id");
                                    */
                                    $res=mysqli_query($con, "select distinct (order_detail.id),order_detail.*,services.name,services.img  from 
                                                            order_detail,services where order_detail.order_id= 
                                                            '$order_id' and  order_detail.services_id=services.id");
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
                                <div id="address_details">
                                    <strong>Address</strong>
                                    <?php
                                    $add = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `order` WHERE id ='$order_id' "));

                                    ?>
                                    <?php echo $add['address'];?>, <?php echo $add['city'];?>, <?php  echo $add['post_code'];?>
                                    <br><br>

                                    <strong>Order Status</strong>
                                    <?php
                                    $order_status_arr= mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`order` 
                                                            where `order`.id ='$order_id' and `order`.order_status=order_status.id"));
                                    echo $order_status_arr['name'];
                                    ?>
                                    <div>
                                        <form method="post">
                                            <select class="form-control" name="update_order_status">
                                                <option>Select Status</option>
                                                <?php
                                                $res=mysqli_query($con,"select * from order_status");
                                                while($row=mysqli_fetch_assoc($res)){
                                                    if($row['id'] == $categories_id){
                                                        echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                                    }else{
                                                    }
                                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="submit" class ="form-control">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require ('footer.inc.php');

?>