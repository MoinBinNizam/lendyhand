// function send_message(){
//     alert('Hi');
//     var name=jQuery("#name").val();
//     var email=jQuery("#email").val();
//     var mobile=jQuery("#mobile").val();
//     var message=jQuery("#message").val();
//
//     if(name==""){
//         alert('Please enter name');
//     }else if(email==""){
//         alert('Please enter email');
//     }else if(mobile==""){
//         alert('Please enter mobile');
//     }else if(message==""){
//         alert('Please enter message');
//     }else{
//         jQuery.ajax({
//           url:'send_message.php',
//           type:'post',
//           data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
//             success:function(result){
//               alert(result);
//             }
//         });
//     }
// }
//

jQuery('#frmContactus').on('submit', function (e) {
    jQuery('#msg').html('');
    jQuery('#submit').html('Please wait');
    jQuery('#submit').attr('disabled', true);
    jQuery.ajax({
        url: 'submit.php',
        type: 'post',
        data: jQuery('#frmContactus').serialize(),
        success: function (result) {
            jQuery('#msg').html(result);
            jQuery('#submit').html('Submit');
            jQuery('#submit').attr('disabled', false);
            jQuery('#frmContactus')[0].reset();
        }
    });
    e.preventDefault();
});
//User registration validation
function user_register() {
    jQuery('.field_error').html('');
    var name = jQuery("#name").val();
    var email = jQuery("#email").val();
    var mobile = jQuery("#mobile").val();
    var password = jQuery("#password").val();
    var is_error = '';

    if (name == "") {
        jQuery('#name_error').html('Please enter Name');
        is_error = 'yes';
    } if (email == "") {
        jQuery('#email_error').html('Please enter Email');
        is_error = 'yes';
    } if (mobile == "") {
        jQuery('#mobile_error').html('Please enter Mobile');
        is_error = 'yes';
    } if (password == "") {
        jQuery('#password_error').html('Please enter Password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            url: 'register_submit.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
            success: function (result) {
                if (result == 'email_present') {
                    jQuery('#email_error').html('Email id already present');
                }
                if (result == 'insert') {
                    jQuery('.register_msg p').html('Thank you for registration');

                }
            }
        });
    }
}

//User login validation
function user_login() {
    jQuery('.field_error').html('');
    var email = jQuery("#login_email").val();
    var password = jQuery("#login_password").val();
    var is_error = '';

    if (email == "") {
        jQuery('#login_email_error').html('Please enter Email');
        is_error = 'yes';
    } if (password == "") {
        jQuery('#login_password_error').html('Please enter Password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            url: 'login_submit.php',
            type: 'post',
            data: 'email=' + email + '&password=' + password,
            success: function (result) {
                if (result == 'wrong') {
                    jQuery('.login_msg p').html('Please enter valid login details');
                }
                if (result == 'valid') {
                    window.location.href = window.location.href;

                }
            }
        });
    }
}
function manage_cart(sid, type) {
    if (type == 'update') {
        var qty = jQuery("#" + sid + "qty").val();
    } else {
        var qty = jQuery("#qty").val();
    }

    jQuery.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'sid=' + sid + '&qty=' + qty + '&type=' + type,
        success: function (result) {
            if (type == 'update' || type == 'remove') {
                window.location.href = window.location.href;
            }
            jQuery('.htc__qua').html(result);
        }
    });
}
//Service provider register
function validation() {
    var name = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;
    var password = document.getElementById('password').value;
    var address = document.getElementById('address').value;
    var work_location = document.getElementById('work_location').value;
    //Regular expression
    var namecheck = /^[A-Za-z. ]{3,30}$/;
    var emailcheck = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
    var mobilecheck = /^[01][0-9]{10}$/;
    var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
    // (?=.*[A-Z]) means Atleast 1 character shoulld be from A-Z

    if (namecheck.test(name)) {
        document.getElementById('username_error').innerHTML = " ";
    } else {
        document.getElementById('username_error').innerHTML = "Name is Invalid. Please Use Alphabates";
        return false;
    }
    if (emailcheck.test(email)) {
        document.getElementById('email_error').innerHTML = " ";
    } else {
        document.getElementById('email_error').innerHTML = "Email is Invalid";
        return false;
    }
    if (mobilecheck.test(mobile)) {
        document.getElementById('mobile_error').innerHTML = " ";
    } else {
        document.getElementById('mobile_error').innerHTML = "Mobile number is Invalid. Ex: 01...";
        return false;
    }
    if (passwordcheck.test(password)) {
        document.getElementById('password_error').innerHTML = " ";
    } else {
        document.getElementById('password_error').innerHTML = "Password is Invalid. Please use (8-16 digits) combination of 0-9,!-*,A-Z,a-z";
        return false;
    }
    if (address == "") {
        document.getElementById('address_error').innerHTML = "Current address must be filled";
        return false;
    } else {
        document.getElementById('address_error').innerHTML = " ";
    }
    if (work_location == "") {
        document.getElementById('work_location_error').innerHTML = "Your work location must be filled";
        return false;
    }
}
//Service provider login

// function validation() {
//     var login_email = document.getElementById('login_email').value;
//     var login_password = document.getElementById('login_password').value;
//     //Regular expression
//     var login_emailcheck = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
//     var login_passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;

//     if (login_emailcheck.test(login_email)) {
//         document.getElementById('login_email_error').innerHTML = " ";
//     } else {
//         document.getElementById('login_email_error').innerHTML = "Email is Invalid";
//         return false;
//     }

//     if (login_passwordcheck.test(login_password)) {
//         document.getElementById('login_password_error').innerHTML = " ";
//     } else {
//         document.getElementById('login_password_error').innerHTML = "Password is Invalid. Please use your correct password";
//         return false;
//     }
// }