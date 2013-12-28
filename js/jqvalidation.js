$(document).ready(function(){

    $("#RegisterForm").validate({
        errorClass: 'control-label',            
        rules:{         
            username:{
                required: true,
                maxlength: 30
            },
            city:{
                required: true,
                maxlength: 30
            },
            age:{
                required: true,
                number: true,
                range: [1900, 2013]
            },
            login:{
                required: true,
                maxlength: 100,
                remote : {
                  url: base_url+"profile/login_jq_check",
                  type: "post"
                }
            },            
            email:{
                required: true,
                my_email_validation: true,
                remote : {
                  url: base_url+"profile/email_jq_check",
                  type: "post"
                }
            },
            password:{
                required: true,
                minlength: 6
            },
            repassword:{
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function(element) {
            element
            .text('Input with success').addClass('control-label')
            .closest('.form-group').removeClass('has-error').addClass('has-success');
        },

        messages:{
            login:{
                remote: "Login is busy",
            },
            email:{
                remote: "E-mail is busy",
            },  
            repassword:{
                equalTo: "Passwords do not match"
            }, 
        }  
    });

    $("#EditProfile").validate({

        errorClass: 'control-label',

        rules:{         
            username:{
                required: true,
                maxlength: 30
            },
            city:{
                required: true,
                maxlength: 30
            },
            age:{
                required: true,
                number: true,
                range: [1900, 2013]
            },
            email:{
                required: true,
                my_email_validation: true,
                remote : {
                  url: base_url+"profile/email_jq_edit_check",
                  type: "post"
                }
            },
            password:{
                minlength: 6
            },
            repassword:{
                minlength: 6,
                equalTo: "#password"
            },

        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function(element) {
            element
            .text('Input with success').addClass('control-label')
            .closest('.form-group').removeClass('has-error').addClass('has-success');
        },

        messages:{
            email:{
                remote: "E-mail is busy",
            }, 
            repassword:{
                equalTo: "Passwords do not match"
            }, 
        }  
    });

    $.validator.addMethod('my_email_validation',
        function(val,el)
    {
        var reg = /^[A-z0-9._-]+@[A-z0-9.-]+\.[A-z]{2,4}$/;
        if (!reg.test(val)) {
                return  false;
            } else {
                return  true;
            }
        },"Enter a valid email address!");

});