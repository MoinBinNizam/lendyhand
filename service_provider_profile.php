<?php
require ('connection.inc.php');
require ('functions.inc.php');

if(isset($_POST['register'])){
    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $password=get_safe_value($con,$_POST['password']);
    $address=get_safe_value($con,$_POST['address']);
    $work_location=get_safe_value($con,$_POST['work_location']);
    $nid=get_safe_value($con,$_POST['nid']);
    //check existing email address
    $check_user = mysqli_num_rows(mysqli_query($con,"SELECT * FROM service_provider WHERE email='$email' "));
     if($check_user>0){
        echo "This Email address is already present";
        //header("Location:service_provider.php");
    }else{
        $added_on=date('Y-m-d h:i:s');
        mysqli_query($con,"INSERT INTO service_provider (name,email,mobile,password,address,work_location,nid,added_on) 
                                values ('$name','$email','$mobile','$password','$address','$work_location','$nid','$added_on')");
        echo "Data inserted successfully";
    }
}

    