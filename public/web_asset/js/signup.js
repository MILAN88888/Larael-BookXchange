$(document).ready(function () {
    $.validator.addMethod("my_size", function (value, element) {
        var img = $('#user_img').val();
        if (img != '') {
            var numb = $("input[name='user_img']")[0].files[0].size;
            if (numb > 1048576) {
                return false;
            } else {
                return true;
            }
        } else {
            return true
        }
    }, "too large, Image must be equal to or less than 1mb");

    $.validator.addMethod("my_type", function (value, element) {
        var img = $('#user_img').val();
        if (img != '') {
            var file_data = $("input[name='user_img']")[0].files;
            var myfile = file_data[0].name;
            var mytype = myfile.substring(myfile.lastIndexOf(".") + 1);
            console.log(mytype);
            if (mytype == 'jpeg' || mytype == 'jpg' || mytype == 'png' || mytype == 'svg') {
                return true;
            } else {
                return false;
            }
        } else {
            return true
        }

    }, "Image type must be jpeg, jpg, svg & png");
    $('#register-form').validate({
        rules: {
            user_img: {
                my_size: true,
                my_type: true,
            },
            firstname: {
                required: true,
                minlength: 2,
            },
            lastname: {
                minlength: 3,
            },
           phone: {
                required: true,
                number: true,
                maxlength: 10,
                minlength: 10,
            },
            address: {
                required: true,
            },
            password: {
                required: true,
                minlength: 5,
            },
            passwordConfirmation:{
                required:true,
                equalTo:"#password",
            }
        }, messages: {

            firstname: {
                required: "Please enter First Name !",
                minlength: "Please enter at least 4 character !",
            },
            lastname: {
                minlength: "Please enter at least 4 character !",
            },
            phone: {
                required: "Please enter Phone Number !",
                number: "please enter umber format !",
                maxlength: "Please enter 10 digit Phone Number !",
                minlength: "Please enter 10 digit Phone Number !",
            },
            address: {
                required: "Please enter Address !",
            },
            password: {
                required: "Please enter Password !",
                minlength: "atleast 5 Character !",
            },
            passwordConfirmation:{
                required:"Please enter confirm Password !",
                equalTo:"Confirm password not match !",
            }
        }
    })
});