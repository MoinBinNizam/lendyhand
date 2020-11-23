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

jQuery('#frmContactus').on('submit',function(e){
    jQuery('#msg').html('');
    jQuery('#submit').html('Please wait');
    jQuery('#submit').attr('disabled',true);
    jQuery.ajax({
        url:'submit.php',
        type:'post',
        data:jQuery('#frmContactus').serialize(),
        success:function(result){
            jQuery('#msg').html(result);
            jQuery('#submit').html('Submit');
            jQuery('#submit').attr('disabled',false);
            jQuery('#frmContactus')[0].reset();
        }
    });
    e.preventDefault();
});
//User reg validation
function user_register(){
    jQuery('.field_error').html('');
    var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var password=jQuery("#password").val();
    var is_error='';

    if(name==""){
        jQuery('#name_error').html('Please enter Name');
        is_error='yes';
    } if(email==""){
        jQuery('#email_error').html('Please enter Email');
        is_error='yes';
    } if(mobile==""){
        jQuery('#mobile_error').html('Please enter Mobile');
        is_error='yes';
    } if(password==""){
        jQuery('#password_error').html('Please enter Password');
        is_error='yes';
    }
    if(is_error==''){
        jQuery.ajax({
            url:'register_submit.php',
            type:'post',
            data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
            success:function(result){
                if(result=='email_present'){
                    jQuery('#email_error').html('Email id already present') ;
                }
                if(result=='insert'){
                    jQuery('.register_msg p').html('Thank you for registration') ;

                }
            }
        });
    }
}

////User login validation
function user_login(){
    jQuery('.field_error').html('');
    var email=jQuery("#login_email").val();
    var password=jQuery("#login_password").val();
    var is_error='';

    if(email==""){
        jQuery('#login_email_error').html('Please enter Email');
        is_error='yes';
    } if(password==""){
        jQuery('#login_password_error').html('Please enter Password');
        is_error='yes';
    }
    if(is_error==''){
        jQuery.ajax({
            url:'login_submit.php',
            type:'post',
            data:'email='+email+'&password='+password,
            success:function(result){
                if(result=='wrong'){
                    jQuery('.login_msg p').html('Please enter valid login details') ;
                }
                if(result=='valid'){
                    window.location.href=window.location.href;

                }
            }
        });
    }
}
function manage_cart(sid,type){
    if(type =='update'){
        var qty=jQuery("#"+sid+"qty").val();
    }else {
        var qty=jQuery("#qty").val();
    }

    jQuery.ajax({
        url:'manage_cart.php',
        type:'post',
        data:'sid='+sid+'&qty='+qty+'&type='+type,
        success:function(result){
            if(type=='update' || type=='remove'){
                window.location.href=window.location.href;
            }
            jQuery('.htc__qua').html(result);
        }
    });
}
//Service provider register
function user_register(){
    jQuery('.field_error').html('');
    var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var password=jQuery("#password").val();
    var address=jQuery("#address").val();
    var work_location=jQuery("#work_location").val();
    var service=jQuery("#service").val();
    var nid=jQuery("#nid").val();
    var is_error='';

    if(name==""){
        jQuery('#name_error').html('Please enter Name');
        is_error='yes';
    } if(email==""){
        jQuery('#email_error').html('Please enter Email');
        is_error='yes';
    } if(mobile==""){
        jQuery('#mobile_error').html('Please enter Mobile');
        is_error='yes';
    } if(password==""){
        jQuery('#password_error').html('Please enter Password');
        is_error='yes';
    }if(address==""){
        jQuery('#address_error').html('Please enter Address');
        is_error='yes';

    } if(work_location==""){
        jQuery('#work_location_error').html('Please enter Work Location');
        is_error='yes';
    } if(service==""){
        jQuery('#service_error').html('Please enter Service');
        is_error='yes';

    } if(nid==""){
        jQuery('#nid_error').html('Please enter NID');
        is_error='yes';
    }if(is_error==''){
        jQuery.ajax({
            url:'service_provider_reg_submit.php',
            type:'post',
            data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password
                +'&address='+address+'&work_location='+work_location+'&service='+service+'&mobile='+nid,
            success:function(result){
                if(result=='email_present'){
                    jQuery('#email_error').html('Email id already present') ;
                }
                if(result=='insert'){
                    jQuery('.register_msg p').html('Thank you for registration') ;

                }
            }
        });
    }
}
