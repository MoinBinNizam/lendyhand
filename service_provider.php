<?php
ob_start();
require('top.php');

// if (isset($_SESSION['SERVICE_PROVIDER_LOGIN']) && $_SESSION['SERVICE_PROVIDER_LOGIN']=='yes'){
//     header('location:service_provider/manage_service.php');
//     die();
// }
$msg = '';
  if(isset ($_POST['submit'])){
    $login_email = get_safe_value($con, $_POST['login_email']);
    $login_password = get_safe_value($con, $_POST['login_password']);
    $sql = "SELECT * from service_provider where email = '$login_email' and password = '$login_password'";
    $result = mysqli_query($con, $sql);
    $count= mysqli_num_rows($result);
    if ($count >0){
      $_SESSION['SERVICE_PROVIDER_LOGIN']='yes';
      $_SESSION['SERVICE_PROVIDER_EMAIL']=$login_email;
      header('location:service_provider/manage_services.php');
      echo "Logged in as service provider";
 
      die();
    }else{
      $msg = "Please enter the correct login details again";
    }
  }

//?>
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
                                <span class="breadcrumb-item active">Service provider registration</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <section class="htc__contact__area ptb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class="headline">
                    <h1>Become A Proud Service Provider</h1>
                    <h4>It's simple!</h4>
                </div>
                <div class="col-md-6">
                    <div class="contact-form-wrap mt--60">
                        <div class="col-xs-12">
                            <div class="contact-title">
                                <h2 class="title__line--6">Login</h2>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <form    method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="email" name="login_email" id="login_email"  placeholder="Your Email*" style="width:100%">
                                    </div>
                                    <span class="field_error" id="login_email_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                    </div>
                                    <span class="field_error" id="login_password_error"></span>
                                </div>
                                <div class="contact-btn">
                                    <!-- <input type="submit" name="login" class="fv-btn" id="login"> -->
                                    <button type="submit" name="submit" class="fv-btn">Log in</button>
              
                                    <!-- <button type="button" class="fv-btn" onclick="user_login()">Login</button> -->
                                </div>
                            </form>
                            <div class="field_error"> 
                            <?php echo $msg ?>
                        </div>
                            <div class="form-output login_msg">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form-wrap mt--60">
                        <div class="col-xs-12">
                            <div class="contact-title">
                                <h2 class="title__line--6">Register</h2>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <form method="POST" action="service_provider_profile.php" onsubmit="return validation()">
                            <div class="single-contact-form">
                            <div class="dropdown">
                                <button class="dropbtn">Select Work Location
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                    <?php
                                        foreach($cat_array as $list){
                                            ?>
                                            <li><a href="categories.php?id=<?php echo $list['id']?> ">
                                                    <?php echo $list['categories'] ?> </a></li>
                                            <?php
                                        }
                                        ?> </a>

                                </div>
                            </div>
                                    </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="name" id="username" placeholder="Your Name*" >
                                    </div>
                                    <span class="field_error" id="username_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="email" name="email" class="email_checking" id="email"  placeholder="Your Email Address*" >
                                    </div>
                                    <span class="field_error" id="email_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" >
                                    </div>
                                    <span class="field_error" id="mobile_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="password" name="password" id="password" placeholder="Your Password*" >
                                    </div>
                                    <span class="field_error" id="password_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input  type="text" name="address" id="address" placeholder="Your Current Address*" >
                                    </div>
                                    <span class="field_error" id="address_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <label for="categories" class=" form-control-label">Photo of Your NID
                                        </label>
                                        <input type="file" name="nid" id="nid" class="form-control">
                                    </div>
                                    <span class="field_error" id="nid_error"></span>
                                </div>
                                <div class="contact-btn">
                                    <!-- <button type="button" class="fv-btn" onclick="sProvider_register()" >Register</button> -->
                                    <input type="submit" name="register" class="fv-btn" id="registration">
                                    
                                </div>
                            </form>
                            <div class="form-output register_msg">

                                <p class="form-messege field_error"></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
    </section>
<?php
require('footer.php');

?>