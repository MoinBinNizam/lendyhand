<?php
ob_start();
require('top.php');

if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
    header('location:my_order.php');
    die();
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
                            <form id="login-form"  method="post">
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
                                    <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                </div>
                            </form>
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
                            <form id="register-form"  method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="name" id="name" placeholder="Your Name*" >
                                    </div>
                                    <span class="field_error" id="name_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="email" name="email" id="email"  placeholder="Your Email Address*" >
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
                                        <input type="text" name="work_location" id="work_location" placeholder="Your Work Location*" >
                                    </div>
                                    <span class="field_error" id="work_location_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="service" id="service" placeholder="Your Service Name*" >
                                    </div>
                                    <span class="field_error" id="service_error"></span>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <label for="categories" class=" form-control-label">NID Photo
                                        </label>
                                        <input type="file" name="nid" id="nid" class="form-control">
                                    </div>
                                    <span class="field_error" id="nid_error"></span>
                                </div>
                                <div class="contact-btn">
                                    <button type="button" class="fv-btn" onclick="user_register()" >Register</button>
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