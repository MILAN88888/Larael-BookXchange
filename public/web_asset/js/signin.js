$(document).ready(function () {
    $('#forget-pass').click(function (e) { 
        e.preventDefault();
        $('#forget-div').show();
        $('#login-div').hide();
        $('#register-div').hide();
    });
    $('#login-form').validate({
        rules:{
            email:{
                required:true,   
            },
            password:{
                required:true,
            }
        },messages:{
            email:{
                required:"Please enter Email!",
            },
            password:{
                required:"Please enter Password !",
            }
        }
    });
    $('#forget-form').validate({
        rules:{
            mobile_no:{
                required:true,
                number:true,
                minlength:15,
                maxlength:15,
            }
        },
            messages:{
                mobile_no:{
                    required:"Please enter Phone Number!",
                    number:"Please enter number format!",
                    minlength:"Please enter 10 digit Phone Number !",
                    maxlength:"Please enter 10 digit Phone Number !"
                }
            }
        
    });
});