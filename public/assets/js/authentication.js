$('#resetPassform').submit(function (e) {
    e.preventDefault();
    let form = $(this);
    resetFormSubmit("post", "submit-button", form);
    function resetFormSubmit(type, btn, form, headers = null) {
        // var dmeoUser = JSON.parse(localStorage.getItem('userData'))
        // if (dmeoUser.email !== "demoadmin@footballrover.com") {
        let url = form.attr('action');
        // alert(url);
        let form_data = JSON.stringify(form.serializeJSON());
        formData = JSON.parse(form_data);
        // $('#preloader').removeClass('d-none')
        $.ajax({
            type: type, url: url, data: formData, headers: headers, beforeSend: function () {
                // $('#' + btn).prop('disabled', true);
            }, success: function (response) {
                if (response.status === 'success') {
                    $('#preloader').addClass('d-none')
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
                    $('#preloader').addClass('d-none')
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'validate_error') {
                        // $('#preloader').addClass('d-none')
                        $.each(response.message, function (index, message) {
                            if (message.field && message.field !== 'global') {
                                $('#' + message.field).addClass('is-invalid');
                                $('#' + message.field + '_label').addClass('text-danger');
                                $('#' + message.field + '_error').html(message.error);
                            } else if (message.error) {
                                // $('#preloader').addClass('d-none')
                                // toastr.error(message.error);
                                console.log("err 0")
                            } else {
                                // toastr.error('Something went wrong', 'Please try again after sometime.');
                                console.log("err 1")
                                $('#preloader').addClass('d-none')
                            }
                        });
                    } else {
                        toastr.error(response.message);
                        console.log("err 2")
                        $('#preloader').addClass('d-none')
                    }
                } else {
                    $('#preloader').addClass('d-none')
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
})

$('#UserVarifyForm').submit(function (e) {
    e.preventDefault();
    let form = $(this);
    UserVarifyFormSubmit("post", "submit-button", form);

    function UserVarifyFormSubmit(type, btn, form, headers = null) {
        // var dmeoUser = JSON.parse(localStorage.getItem('userData'))
        // if (dmeoUser.email !== "demoadmin@footballrover.com") {
        let url = form.attr('action');
        // alert(url);
        let form_data = JSON.stringify(form.serializeJSON());
        formData = JSON.parse(form_data);
        // $('#preloader').removeClass('d-none')
        $.ajax({
            type: type, url: url, data: formData, headers: headers, beforeSend: function () {
                // $('#' + btn).prop('disabled', true);
            }, success: function (response) {
                if (response.status === 'success') {
                    $('#preloader').addClass('d-none')
                    toastr.success(response.message);
                    $("#createNewPasswordForm").removeClass('d-none')
                    $("#verifyCodeForm").addClass('d-none')


                }
            }, error: function (xhr, resp, text) {
                // console.log(xhr)
                // on error, tell the failed
                if (xhr && xhr.responseText) {
                    $('#preloader').addClass('d-none')
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'validate_error') {
                        // $('#preloader').addClass('d-none')
                        $.each(response.message, function (index, message) {
                            if (message.field && message.field !== 'global') {
                                $('#' + message.field).addClass('is-invalid');
                                $('#' + message.field + '_label').addClass('text-danger');
                                $('.' + message.field + '_error').html(message.error);
                            } else if (message.error) {
                                // $('#preloader').addClass('d-none')
                                // toastr.error(message.error);
                                console.log("err 0")
                            } else {
                                // toastr.error('Something went wrong', 'Please try again after sometime.');
                                console.log("err 1")
                                $('#preloader').addClass('d-none')
                            }
                        });
                    } else {
                        toastr.error(response.message);
                        console.log("err 2")
                        $('#preloader').addClass('d-none')
                    }
                } else {
                    $('#preloader').addClass('d-none')
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
})
$('#ChangePasswordForm').submit(function (e) {
    e.preventDefault();
    let form = $(this);
    ChangePasswordFormSubmit("post", "submit-button", form);

    function ChangePasswordFormSubmit(type, btn, form, headers = null) {
        // var dmeoUser = JSON.parse(localStorage.getItem('userData'))
        // if (dmeoUser.email !== "demoadmin@footballrover.com") {
        let url = form.attr('action');
        // alert(url);
        let form_data = JSON.stringify(form.serializeJSON());
        formData = JSON.parse(form_data);
        // $('#preloader').removeClass('d-none')
        $.ajax({
            type: type, url: url, data: formData, headers: headers, beforeSend: function () {
                // $('#' + btn).prop('disabled', true);
            }, success: function (response) {
                if (response.status === 'success') {
                    $('#preloader').addClass('d-none')
                    toastr.success(response.message);

                }
            }, error: function (xhr, resp, text) {
                // console.log(xhr)
                // on error, tell the failed
                if (xhr && xhr.responseText) {
                    $('#preloader').addClass('d-none')
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'validate_error') {
                        // $('#preloader').addClass('d-none')
                        $.each(response.message, function (index, message) {
                            if (message.field && message.field !== 'global') {
                                $('#' + message.field).addClass('is-invalid');
                                $('#' + message.field + '_label').addClass('text-danger');
                                $('#' + message.field + '_error').html(message.error);
                            } else if (message.error) {
                                // $('#preloader').addClass('d-none')
                                // toastr.error(message.error);
                                console.log("err 0")
                            } else {
                                // toastr.error('Something went wrong', 'Please try again after sometime.');
                                console.log("err 1")
                                $('#preloader').addClass('d-none')
                            }
                        });
                    } else {
                        // toastr.error('Something went wrong', 'Please try again after sometime.');
                        console.log("err 2")
                        $('#preloader').addClass('d-none')
                    }
                } else {
                    $('#preloader').addClass('d-none')
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
})


