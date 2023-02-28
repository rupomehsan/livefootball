
$("#signUp").click(function () {
    $("#LoginForm").addClass('d-none')
    $("#SignUpForm").removeClass('d-none')
})

$("#Login").click(function () {
    $("#LoginForm").removeClass('d-none')
    $("#SignUpForm").addClass('d-none')
    $("#forgotPasswordForm").addClass('d-none')
})

$("#forgotPassword").click(function () {
    $("#LoginForm").addClass('d-none')
    $("#forgotPasswordForm").removeClass('d-none')
})


$('#loginForm').submit(function (e) {
    // alert("hi")
    e.preventDefault();
    let form = $(this);
    formSubmitAuth("post", "submit-button", form);
})

$('#signUpform').submit(function (e) {
    // alert("hi")
    e.preventDefault();
    let form = $(this);
    formSubmitAuth("post", "submit-button-signup", form);
})

$('#resetPassformUser').submit(function (e) {
    e.preventDefault();
    let form = $(this);
    resetFormSubmit("post", "submit-button-forgot", form);

})

$('#verifyCodeForm').submit(function (e) {
    // alert("hi")
    e.preventDefault();
    let form = $(this);
    formSubmitAuth("post", "submit-button-verify", form);
    //  $('#verifyCodeForm').addClass("d-none");
    //   $('#createNewPasswordForm').removeClass("d-none");
})
$('#ChangePasswordForm').submit(function (e) {
    // alert("hi")
    e.preventDefault();
    let form = $(this);
    formSubmitAuth("post", "submit-button-new-pass", form);
    //  $('#verifyCodeForm').addClass("d-none");
    //   $('#createNewPasswordForm').removeClass("d-none");
})


function formSubmitAuth(type, btn, form, headers = null) {
    let url = form.attr('action');

    let form_data = JSON.stringify(form.serializeJSON());
    formData = JSON.parse(form_data);
    $('.submit-button-loader').removeClass('d-none')
    $.ajax({
        type: type, url: url, data: formData, headers: headers, beforeSend: function () {
            $('#' + btn).prop('disabled', true);
        }, success: function (response) {
            if (response.status === 'success') {
                $('.submit-button-loader').addClass('d-none')
                toastr.success(response.message);
                if(response.data){
                    if(response.data.role==="user"){
                        localStorage.setItem("userInformation",JSON.stringify(response.data.user))
                    }
                    window.location.reload()
                }
                form[0].reset();
                window.location.reload()
            }
        }, error: function (xhr, resp, text) {
            // console.log(xhr)
            // on error, tell the failed
            if (xhr && xhr.responseText) {
                $('.submit-button-loader').addClass('d-none')
                let response = JSON.parse(xhr.responseText);
                if (response.status === 'validate_error') {
                    $('.submit-button-loader').addClass('d-none')
                    $.each(response.message, function (index, message) {
                        if (message.field && message.field !== 'global') {
                            $('#' + message.field).addClass('is-invalid');
                            $('#' + message.field + '_label').addClass('text-danger');
                            $('#' + message.field + '_error').html(message.error);
                            $('.' + message.field + '_error').html(message.error);
                        } else if (message.error) {
                            // $('.submit-button-loader').addClass('d-none')
                            // toastr.error(message.error);
                            console.log("err 0")
                        } else {
                            // toastr.error('Something went wrong', 'Please try again after sometime.');
                            console.log("err 1")
                            $('.submit-button-loader').addClass('d-none')
                        }
                    });
                }else if(response.status === 'server_error'){
                    toastr.error(response.message);
                }else {
                    // toastr.error('Something went wrong', 'Please try again after sometime.');
                    console.log("err 2")
                    $('.submit-button-loader').addClass('d-none')
                }
            } else {
                $('.submit-button-loader').addClass('d-none')
                // toastr.error('Something went wrong', 'Please try again after sometime.');
                console.log("err 3")
            }
        }, complete: function (xhr, status) {
            $('#' + btn).prop('disabled', false);
        }
    });


}



function resetFormSubmit(type, btn, form, headers = null) {
    // var dmeoUser = JSON.parse(localStorage.getItem('userData'))
    // if (dmeoUser.email !== "demoadmin@footballrover.com") {
    let url = form.attr('action');
    // alert(url);
    let form_data = JSON.stringify(form.serializeJSON());
    formData = JSON.parse(form_data);
    $('.submit-button-loader').removeClass('d-none')
    $.ajax({
        type: type, url: url, data: formData, headers: headers, beforeSend: function () {
            $('#' + btn).prop('disabled', true);
        }, success: function (response) {
            if (response.status === 'success') {
                $('.submit-button-loader').addClass('d-none')
                toastr.success(response.message);
                $("#forgotPasswordForm").addClass('d-none')
                $("#verifyCodeForm").removeClass('d-none')
                $(".requestEmail").text(response.email)
                $(".requestEmail").val(response.email)
            }
        }, error: function (xhr, resp, text) {
            // console.log(xhr)
            // on error, tell the failed
            if (xhr && xhr.responseText) {
                $('.submit-button-loader').addClass('d-none')
                let response = JSON.parse(xhr.responseText);
                if (response.status === 'validate_error') {
                    $('.submit-button-loader').addClass('d-none')
                    $.each(response.message, function (index, message) {
                        if (message.field && message.field !== 'global') {
                            $('#' + message.field).addClass('is-invalid');
                            $('#' + message.field + '_label').addClass('text-danger');
                            $('#' + message.field + '_error').html(message.error);
                            $('.' + message.field + '_error').html(message.error);
                        } else if (message.error) {
                            // $('.submit-button-loader').addClass('d-none')
                            // toastr.error(message.error);
                            console.log("err 0")
                        } else {
                            // toastr.error('Something went wrong', 'Please try again after sometime.');
                            console.log("err 1")
                            $('.submit-button-loader').addClass('d-none')
                        }
                    });
                } else {
                    toastr.error(response.message);
                    console.log("err 2")
                    $('.submit-button-loader').addClass('d-none')
                }
            } else {
                $('.submit-button-loader').addClass('d-none')
                // toastr.error('Something went wrong', 'Please try again after sometime.');
                console.log("err 3")
            }
        }, complete: function (xhr, status) {
            $('#' + btn).prop('disabled', false);
        }
    });
    // } else {
    //     toastr.error('Sorry You Are Demo Use')
    // }


}

$(document).on("click",".password-icon",function (){
    if ($("#password").attr("type") === "password") {
        $('#password').attr("type", "text")
        $('.password').attr("type", "text")
        $(this).attr('data-icon',"el:eye-open")
    }else{
        $('#password').attr("type", "password")
        $('.password').attr("type", "password")
        $(this).attr('data-icon',"el:eye-close")
    }
})
$(document).on("click",".con-password-icon",function (){
    if ($("#con-password").attr("type") === "password") {
        $('#con-password').attr("type", "text")
        $('.con-password').attr("type", "text")
        $(this).attr('data-icon',"el:eye-open")
    }else{
        $('#con-password').attr("type", "password")
        $('.con-password').attr("type", "password")
        $(this).attr('data-icon',"el:eye-close")
    }
})
$(document).on("click",".new-password-icon",function (){
    if ($("#new-password").attr("type") === "password") {
        $('#new-password').attr("type", "text")
        $(this).attr('data-icon',"el:eye-open")
    }else{
        $('#new-password').attr("type", "password")
        $(this).attr('data-icon',"el:eye-close")
    }
})
$(document).on("click",".con-new-password-icon",function (){
    if ($("#con-new-password").attr("type") === "password") {
        $('#con-new-password').attr("type", "text")
        $(this).attr('data-icon',"el:eye-open")
    }else{
        $('#con-new-password').attr("type", "password")
        $(this).attr('data-icon',"el:eye-close")
    }
})
