<?php
require ('connection.inc.php');
//require_once ('contacts.php');

$msg="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['message'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$message=mysqli_real_escape_string($con,$_POST['message']);

////default variables and set to empty values
//$name_error = $email_error = $mobile_error = $message_error= "";
//$name= $email = $mobile =$message = "";
//
////form submitted with post method
//if ($_SERVER["REQUEST_METHOD"] =="POST"){
//    if(empty($_POST["name"])){
//        $name_error ="Name is required";
//    }else{
//        $name = test_input($_POST['name']);
//        //check if name only contains letters and whitespaces
//        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
//            $name_error = "Only letters and white spaces are allowed";
//        }
//    }
//    if(empty($_POST["email"])){
//        $email_error ="Email is required";
//    }else{
//        $email = test_input($_POST['email']);
//        //check if email address is well formed
//        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
//            $email_error = "Invalid email format";
//        }
//    }
//    if(empty($_POST["mobile"])){
//        $mobile_error ="Mobile number is required";
//    }else{
//        $mobile = test_input($_POST['mobile']);
//        //check if phone number is well formed
//        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$mobile)) {
//            $mobile_error = "Invalid mobile number";
//        }
//        }
//    if(empty($_POST['message'])){
//        $message = "Input your message";
//    }else{
//        $message= test_input($_POST['message']);
//    }
//    if($name_error =='' and $email_error =='' and  $mobile_error =='' ){
//        $message_body = '';
//        unset($_POST['submit']);
//        foreach ($_POST as $key => $value){
//            $message_body .= "$key: $value \n";
//        }
//    }
	mysqli_query($con,"insert into contact_us(name,email,mobile,message) values('$name','$email','$mobile','$message')");
	$msg="Thanks message";

	$html="<table>
                <tr>
                    <td>Name</td>
                    <td>$name</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>$email</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>$mobile</td>
                </tr>
                <tr>
                    <td>message</td>
                    <td>$message</td>
                </tr>
            </table>";
//    function test_input($data){
//    $data   = trim($data);
//    $data   = stripslashes($data);
//    $data   = htmlspecialchars($data);
//    return $data;
//}

	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="moinuddin9042@gmail.com";
	$mail->Password="01747969042";
	$mail->SetFrom("moinuddin9042@gmail.com");
	$mail->addAddress("moinuddin9042@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="New Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	echo $msg;
}
?>