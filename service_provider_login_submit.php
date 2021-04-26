<?php
session_start();
require ('connection.inc.php');
require ('functions.inc.php');

$msg = '';
  if(isset ($_POST['submit'])){
    $username = get_safe_value($con, $_POST['username']);
    $password = get_safe_value($con, $_POST['password']);
    $sql = "select * from admin_user where username = '$username' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $count= mysqli_num_rows($result);
    if ($count >0){
      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=$username;
      header('location:manage_categories.php');
      die();
    }else{
      $msg = "Please enter the correct login details";
    }
  }


if(isset($_POST['login'])){
    $email=get_safe_value($con,$_POST['email']);
    $password=get_safe_value($con,$_POST['password']);
    //check existing email address and password
    $result=mysqli_query($con,"SELECT * from service_provider where email='$email' AND password='$password'");
    $check_user = mysqli_num_rows($result);
    if($check_user){
        $row=mysqli_fetch_assoc($result);
        $db_password=$row['password'];
        if($db_password){
            echo "Login success";
        }else{
            echo "password incorrect";
        }
    }else{
         echo "Invalid email";
    }
}