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

//Login
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
