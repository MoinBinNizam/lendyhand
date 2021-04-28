<?php
require ('top.inc.php');
//require ('functions.inc.php');
$categories_id='';
$name='';
$unit_price='';
$total_price='';
$qty='';
$img='';
$short_desc='';
$descpt='';
$meta_title='';
$meta_desc='';


$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id'] != ''){
   $image_required='';
   $id= get_safe_value($con, $_GET['id']);
   $sql="select * from services where id = '$id'";
   $res=mysqli_query($con,$sql);
   $check=mysqli_num_rows($res);
   
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $categories_id= $row['categories_id'];
      $name= $row['name'];
      $unit_price= $row['unit_price'];
      $total_price= $row['total_price'];
      $qty= $row['qty'];
      $short_desc= $row['short_desc'];
      $descpt= $row['descpt'];
      $meta_title= $row['meta_title'];
      $meta_desc= $row['meta_desc'];
      
     
   }else{
      header('location:service_provider/add_services.php ');
      die();
   } 
}

if (isset ($_POST['submit'])){
   $categories_id=get_safe_value($con, $_POST['categories_id']);
   $name=get_safe_value($con, $_POST['name']);
   $unit_price=get_safe_value($con, $_POST['unit_price']);
   $total_price=get_safe_value($con, $_POST['total_price']);
   $qty=get_safe_value($con, $_POST['qty']);
   $short_desc=get_safe_value($con, $_POST['short_desc']);
   $descpt=get_safe_value($con, $_POST['descpt']);
   $meta_title=get_safe_value($con, $_POST['meta_title']);
   $meta_desc=get_safe_value($con, $_POST['meta_desc']);

   
   $result=mysqli_query($con,"select * from services where name = '$name'");
   $check=mysqli_num_rows($result);
   if($check >0 ){
      if(isset($_GET['id']) && $_GET['id'] != ''){
         $getData=mysqli_fetch_assoc($result);
         if($id == $getData['id']){
         }else{
            $msg="Service already exist";
         }
      }else{
      $msg="Service already exist";
   }
}
$img_msg='';
if($_FILES['img']['type'] !='img/png' &&
   $_FILES['img']['type'] !='img/jpg' && 
   $_FILES['img']['type'] !='img/jpeg'){
      $img_msg= "Please select only png, jpg, jpeg image formate";
   
   }

if($msg ==''){
   if(isset($_GET['id']) && $_GET['id'] != ''){
      if($_FILES['img']['name'] != ''){
         $img = rand(111111111,999999999).'_'.$_FILES['img']['name'];
         move_uploaded_file($_FILES['img']['tmp_name'],SERVICE_IMAGE_SERVER_PATH.$img);
        
         $update_sql="update services set categories_id= '$categories_id',name= '$name',
         unit_price= '$unit_price',total_price= '$total_price',qty= '$qty',short_desc= '$short_desc',
         descpt= '$descpt',meta_title= '$meta_title',meta_desc= '$meta_desc', img= '$img' where id ='$id'";
      }else{
         $update_sql="update services set categories_id= '$categories_id',name= '$name',
         unit_price= '$unit_price',total_price= '$total_price',qty= '$qty',short_desc= '$short_desc',
         descpt= '$descpt',meta_title= '$meta_title',meta_desc= '$meta_desc' where id ='$id'";
      }
      mysqli_query ($con, $update_sql);
   }else{
      //Image Upload
      $img = rand(111111111,999999999).'_'.$_FILES['img']['name'];
      move_uploaded_file($_FILES['img']['tmp_name'],SERVICE_IMAGE_SERVER_PATH.$img);


         mysqli_query ($con, "insert into services(
            categories_id,name,unit_price,total_price,qty,short_desc,descpt,meta_title,meta_desc,status,img)
            values ('$categories_id','$name','$unit_price','$total_price','$qty','$short_desc','$descpt',
            '$meta_title','$meta_desc','1','$img')");
         }
   header('location:admin/manage_services.php ');
   die();
   }
}

?>
<div class="content pb-0">
   <div class="animated fadeIn">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
               <h4 class="box-title">Add Services </h4>   
               </div>
                  <form method="post" enctype="multipart/form-data">
                     <div class="card-body card-block">
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Categories
                        </label>
                           <select class="form-control" name="categories_id">
                              <option>Select Categories</option>
                              <?php
                              $res=mysqli_query($con,"select id,categories from categories order by categories asc");
                              while($row=mysqli_fetch_assoc($res)){
                                 if($row['id'] == $categories_id){
                                    echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                 }else{ 
                                 }
                                 echo "<option value=".$row['id'].">".$row['categories']."</option>";
                              }
                              ?>
                           </select>
                        </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service name
                        </label>
                        <input type="text" name="name" placeholder="Enter Service name" class="form-control" required value="<?php echo $name;?>">
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service unit price
                        </label>
                        <input type="text" name="unit_price" placeholder="Enter unit price" class="form-control" required value="<?php echo $unit_price;?>">
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service total price
                        </label>
                        <input type="text" name="total_price" placeholder="Enter total price" class="form-control" required value="<?php echo $total_price;?>">
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service quantity
                        </label>
                        <input type="text" name="qty" placeholder="Enter quantity" class="form-control" required value="<?php echo $qty;?>">
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service short description
                        </label>
                        <textarea  name="short_desc" placeholder="Enter short description" class="form-control"  <?php echo $short_desc;?>></textarea>
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service description
                        </label>
                        <textarea  name="descpt" placeholder="Enter description" class="form-control" <?php echo $descpt;?>></textarea>
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service meta title
                        </label>
                        <textarea  name="meta_title" placeholder="Enter meta title" class="form-control"  <?php echo $meta_title;?>></textarea>
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Service meta description
                        </label>
                        <textarea  name="meta_desc" placeholder="Enter meta description" class="form-control"  <?php echo $meta_desc;?>></textarea>
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Image
                        </label>
                        <input type="file" name="img"  class="form-control" <?php $image_required; ?> >
                        <div class="field_error"> 
                           <?php echo $img_msg ?>
                        </div>
                     </div>
                     
      
                     <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Submit</span>
                     </button>
                     <div class="field_error"> 
                  <?php echo $msg ?>
               </div>
                  </div>
               </form>
               
            </div>
         </div>
      </div>
   </div>
</div>

<?php
require ('footer.inc.php');

?>