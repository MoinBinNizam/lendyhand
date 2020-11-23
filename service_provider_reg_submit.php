<?php
require ('connection.inc.php');
require ('functions.inc.php');


    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $password=get_safe_value($con,$_POST['password']);
    $address=get_safe_value($con,$_POST['address']);
    $work_location=get_safe_value($con,$_POST['work_location']);
    $service=get_safe_value($con,$_POST['service']);
    $nid=get_safe_value($con,$_POST['nid']);
    //check existing email address
    $check_user = mysqli_num_rows(mysqli_query($con,"select * from service_provider where email='$email' "));
    if($check_user>0){
        echo "email_present";
    }else{
        $added_on=date('Y-m-d h:i:s');
        mysqli_query($con,"insert into service_provider (name,email,mobile,password,address,work_location,service,nid,added_on,status) 
                                values ('$name','$email','$mobile','$password','$address','$work_location','$service','$nid','$added_on')");
        echo "insert";
    }