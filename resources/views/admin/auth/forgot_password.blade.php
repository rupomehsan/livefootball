<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
{{--    <link href="{{asset('assets/vendor/MDB5-STANDARD-UI-KIT-Free-3.10.2/css/mdb.min.css')}}" rel="stylesheet">--}}
<!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- =======================================================
    * Template Name: Admin - v1.1.0
    * Author: CCN Infotech.Ltd
    ======================================================== -->
</head>
<body>
<style>
    .otc {
        position: relative;
        width: 320px;
        margin: 0 auto;
    }

    .otc fieldset {
        border: 0;
        padding: 0;
        margin: 0;
    }

    .otc fieldset div {
        display: flex;
        align-items: center;
    }

    .otc input[type="number"] {
        width: 1em;
        line-height: 1;
        margin: .1em;
        padding: 8px 0 4px;
        font-size: 2.65em;
        text-align: center;
        appearance: textfield;
        -webkit-appearance: textfield;
        border: none;
        border-bottom: 2px solid #FF3D00;
        color: #FF3D00;
    }

    .otc input::-webkit-outer-spin-button,
    .otc input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* 2 group of 3 items */
    .otc input[type="number"]:nth-child(n+4) {
        order: 2;
    }

    .otc input:focus {
        outline: none !important;
        border-color: #719ECE;
    }

    .otc label {
        border: 0 !important;
        clip: rect(1px, 1px, 1px, 1px) !important;
        -webkit-clip-path: inset(50%) !important;
        clip-path: inset(50%) !important;
        height: 1px !important;
        margin: -1px !important;
        overflow: hidden !important;
        padding: 0 !important;
        position: absolute !important;
        width: 1px !important;
        white-space: nowrap !important;
    }

    d-none {
        display: none;
    }

</style>
<div class="row login-content justify-content-center">
    <div class="container">
        <div class="row mt-5">
            <div class="showmessage">

            </div>
            <div class="col-lg-6 col-12 offset-lg-3 " id="sendEmail">
                <div class="card p-5">
                    <div class="card-body">
                        <center>
                            <h4>Password Recovery</h4>
                            <span>Enter your email & the instructions will be sent to you</span>
                        </center>
                        <div class="login-submit-form">
                            <form id="forgotPasswordForm">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="customInput mt-3">
                                        <input placeholder=" " id="email" name="email" class="form-control" type="text" onchange="clearError(this)">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="text-danger email_error" id="email_error" ></div>
                                </div>

                                <div class="form-group text-right">
                                    <button id="forgotPassword" type="submit" class="form-control btn btn-danger mb-3 ">
                                        <span id="submit-button-loader" class="spinner-border spinner-border-sm d-none"
                                              role="status" aria-hidden="true"></span>
                                        Send</button>
                                </div>
                            </form>
                        </div>
                        <center>
                            <span>© 2021 All Rights Reserved.  <a href="https://ccninfotech.com/" target="_blank"> CCN Infotech Ltd.</a></span>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 offset-lg-3 d-none" id="otp">
                <div class="card p-5">
                    <div class="card-body">
                        <div id="otp_content" class="">
                            <div id="otp_heading" class="text-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     aria-hidden="true" role="img" class="iconify iconify--bx" width="100" height="100"
                                     preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="bx:bxs-lock"
                                     data-width="100" data-height="100" style="color: rgb(255, 61, 0);">
                                    <path
                                        d="M12 2C9.243 2 7 4.243 7 7v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7c0-2.757-2.243-5-5-5zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7zm4 10.723V20h-2v-2.277a1.993 1.993 0 0 1 .567-3.677A2.001 2.001 0 0 1 14 16a1.99 1.99 0 0 1-1 1.723z"
                                        fill="currentColor"></path>
                                </svg>
                                <h6 id="mailNotification"></h6>
                            </div>
                            <form class="otc" action="" id="otp_form" name="otp_form"
                                  novalidate="">
                                <fieldset>
                                    <label for="otc-1">Number 1</label>
                                    <label for="otc-2">Number 2</label>
                                    <label for="otc-3">Number 3</label>
                                    <label for="otc-4">Number 4</label>
                                    <label for="otc-5">Number 5</label>
                                    <label for="otc-6">Number 6</label>
                                    <div>
                                        <input type="hidden" id="otp_email" name="email" value="">
                                        <input type="hidden" id="otp_code" name="code" value="">
                                        <input type="number" pattern="[0-9]*" value="" inputtype="numeric"
                                               autocomplete="one-time-code" id="otc-1" name="code[]" required="">
                                        <!-- Autocomplete not to put on other input -->
                                        <input type="number" pattern="[0-9]*" min="0" max="9" name="code[]"
                                               maxlength="1" value="" inputtype="numeric" id="otc-2" required="">
                                        <input type="number" pattern="[0-9]*" min="0" max="9" name="code[]"
                                               maxlength="1" value="" inputtype="numeric" id="otc-3" required="">
                                        <input type="number" pattern="[0-9]*" min="0" max="9" name="code[]"
                                               maxlength="1" value="" inputtype="numeric" id="otc-4" required="">
                                        <input type="number" pattern="[0-9]*" min="0" max="9" name="code[]"
                                               maxlength="1" value="" inputtype="numeric" id="otc-5" required="">
                                        <input type="number" pattern="[0-9]*" min="0" max="9" name="code[]"
                                               maxlength="1" value="" inputtype="numeric" id="otc-6" required="">
                                    </div>
                                </fieldset>
                                <span id="code_error"></span>

                                <h6 class="text-center my-5">Didn’t get code? <span class="text-danger">
                                   <button class="btn btn-warning" id="resend">Resend</button> </span>
                                </h6>
                                <button id="sendOtp-button" type="submit" class="form-control btn btn-danger mb-3 ">
                                    <span id="submit-button-loader" class="spinner-border spinner-border-sm d-none"
                                          role="status" aria-hidden="true"></span>
                                    Send OTP
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 offset-lg-3 d-none" id="changePassword">
                <div class="card p-5">
                    <div class="card-body">
                        <center>
                            <h3>Recover  Your Password</h3>
                        </center>
                        <div class="login-submit-form">
                            <form id="recoverPassword">
                                @csrf
                                <input type="hidden" id="rec_email" name="email" value="">
                                <div class="form-group mb-3">
                                    <label class="my-2" for="">New Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <!-- <i class="bi bi-person-circle"></i> -->
                                            <i class="bi bi-envelope"></i>
                                        </span>

                                        <input id="new_password" type="password" class="form-control"
                                               name="new_password" value="" placeholder="Type your new password" onchange="clearError(this)">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="my-2" for="">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <!-- <i class="bi bi-person-circle"></i> -->
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input id="con_new_password" type="password" class="form-control"
                                               name="con_new_password" value="" placeholder="Type your confirm_password" onchange="clearError(this)">
                                    </div>
                                </div>
                        </div>
                        <div class="form-group text-right">
                            <button id="recoverPass" type="submit" class="form-control btn btn-danger mb-3 ">
                                    <span id="submit-button-loader" class="spinner-border spinner-border-sm d-none"
                                          role="status" aria-hidden="true"></span>
                                Send
                            </button>
                        </div>
                        </form>
                    </div>
                    <center>
                        <span>© 2022 All Rights Reserved.   <a href="https://ccninfotech.com/" target="_blank"> CCN Infotech Ltd.</a></span>
                    </center>
                </div>
            </div>
            <div class="col-lg-6 col-12 offset-lg-3 d-none" id="loginredirect">
                <div class="card p-5">
                    <div class="card-body">
                        <div class="form-group text-right" style="text-align: center">
                            <h4>You have successfully reset your password! </h4>
                            <span class="iconify my-5" data-icon="clarity:success-standard-solid" style="color: red;text-align: center;
    font-size: 60px !important;
    float: left;
    margin-left: 50%;"></span>
                            <a href="login">
                                <button id="" class="form-control btn btn-danger mb-3 ">
                                        <span id="submit-button-loader" class="spinner-border spinner-border-sm d-none"
                                              role="status" aria-hidden="true"></span>
                                    Go to Login</button>
                            </a>

                        </div>
                    </div>
                    <center>
                        <span>© 2022 All Rights Reserved.  <a href="https://ccninfotech.com/" target="_blank"> CCN Infotech Ltd.</a></span>
                    </center>
                </div>
            </div>



        </div>

    </div>
</div>

{{--!-- Vendor JS Files -->--}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--<script src="{{asset('assets/vendor/MDB5-STANDARD-UI-KIT-Free-3.10.2/js/mdb.min.js')}}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/3.2.1/jquery.serializejson.min.js"></script>--}}
<!-- CDN JS Files-->
<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
<!--<script src="assets/vendor/iconify.min.js_3.2.0/iconify.min.js"></script>-->

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        let token = localStorage.getItem('token') || null
        // console.log(token);
        if (token) {
            window.location.href = window.origin+"/admin/dashboard";
        }
    });

    $(document).on("click", "#forgotPassword", function (e) {
        e.preventDefault();
        var formData = new FormData($('#forgotPasswordForm')[0]);
        var options = {
            closeButton: true,
            debug: false,
            positionClass: "toast-bottom-right",
            onclick: null
        };
        $.ajax({
            url:window.origin+"/api/v1/auth/user/forgot-password",
            type: 'POST',
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            beforeSend: function () {
                $('#forgotPassword').prop('disabled', true);
                $('#submit-button-loader').removeClass('d-none');
                $('#submit-icon').addClass('d-none');
            },
            success: function (res) {
                console.log(res)
                if (res.status === "success") {
                    toastr.success("Otp Successfully Send");
                    $("#sendEmail").addClass('d-none')
                    $("#otp").removeClass('d-none')
                    $("#mailNotification").append(`
                               <h6>${res.message}<br> <b>"${res.email}"</b><h6/>
                            `)
                    $("#otp_email").val(res.email)
                    $("#rec_email").val(res.email)
                }
                // setTimeout(location.reload.bind(location), 1000);
            },
            error: function (xhr, resp, text) {
                // on error, tell the failed
                if (xhr && xhr.responseText) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'validate_error') {
                        $('#submit-button-loader').addClass('d-none');
                        $('#forgotPassword').prop('disabled', false);
                        $.each(response.message, function (index, message) {
                            if (message.field && message.field !== 'global') {
                                $('#' + message.field).addClass('is-invalid');
                                $('#' + message.field + '_label').addClass('text-danger');
                                $('#' + message.field + '_error').html(message.error);
                                $('.email_error').html(message.error);
                            } else if (response.status === "error") {
                                // toastr.error(message.error);
                                console.log("err 0")
                            } else {
                                // toastr.error('Something went wrong', 'Please try again after sometime.');
                                console.log("err 1")
                            }
                        });
                    } else {
                        toastr.error(xhr.responseJSON.message);
                        $('#submit-button-loader').addClass('d-none');
                        $('#forgotPassword').prop('disabled', false);
                        console.log("err 2")

                    }
                } else {
                    // toastr.error('Something went wrong', 'Please try again after sometime.');
                    console.log("err 3")
                }
            },
        });
    });


    $(document).on("click", "#sendOtp-button", function (e) {
        e.preventDefault();
        var values = $("input[name='code[]']").map(function(){return $(this).val();}).get();
        let code = values.join('');
        let email = $("#otp_email").val();
        // var formData = new FormData($('#otp_form')[0]);
        var options = {
            closeButton: true,
            debug: false,
            positionClass: "toast-bottom-right",
            onclick: null
        };
        $.ajax({
            url:window.origin+"/api/v1/auth/user/user-verify",
            type: 'POST',
            dataType: "json",
            data:{"code":code,"email":email},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            beforeSend: function () {
                $('#sendOtp-button').prop('disabled', true);
                $('#submit-button-loader').removeClass('d-none');
                $('#submit-icon').addClass('d-none');
            },
            success: function (res) {
                console.log(res)
                if (res.status === "success") {
                    toastr.success("You OTP Matched...");
                    $("#otp").addClass('d-none')
                    $("#changePassword").removeClass('d-none')
                }
                // setTimeout(location.reload.bind(location), 1000);
            },
            error: function (err) {
                console.log("err", err.responseJSON);
                var data = err.responseJSON
                if (data.status === 'error') {
                    toastr.error(data.message);
                } else if (data.status === "validate_error") {
                    toastr.error(data.data[0].error);
                }
            }
        });
    });

    $(document).on("click", "#resend", function (e) {
        e.preventDefault();
        var email = $("#otp_email").val();
        console.log(email);
        $.ajax({
            url:window.origin+"/api/v1/auth/user/resend-code",
            type: 'POST',
            dataType: "json",
            data: {
                "email" : email,
            },
            success: function (res) {
                console.log(res)
                if (res.status === "success") {
                    toastr.success("Otp Send Your Email Again......");
                }
                // setTimeout(location.reload.bind(location), 1000);
            },
            error: function (err) {
                console.log("err", err);
            }
        });

    });

    $(document).on("click", "#recoverPass", function (e) {
        e.preventDefault();
        var formData = new FormData($('#recoverPassword')[0]);

        var options = {
            closeButton: true,
            debug: false,
            positionClass: "toast-bottom-right",
            onclick: null
        };
        $.ajax({
            url:window.origin+"/api/v1/auth/user/change-password",
            type: 'POST',
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            // beforeSend: function () {
            //     $('#forgotPassword').prop('disabled', true);
            //     $('#submit-button-loader').removeClass('d-none');
            //     $('#submit-icon').addClass('d-none');
            // },
            success: function (res) {
                console.log(res)
                if (res.status === "success") {
                    if (res.status === "success") {
                        toastr.success(res.message);
                        $("#changePassword").addClass('d-none')
                        $("#loginredirect").removeClass('d-none')
                    }
                    toastr.success(res.message);
                    // setInterval(() => {
                    //     window.location.href = "http://127.0.0.1:8000/login"
                    // }, 1000);

                }
                // setTimeout(location.reload.bind(location), 1000);
            },
            error: function (err) {
                console.log("err", err.responseJSON);
                var data = err.responseJSON
                if (data.status === 'error') {
                    toastr.error(data.message);
                } else if (data.status === "validate_error") {
                    toastr.error(data.data[0].error);
                }
            }
        });
    });

    function clearError(input) {
        $('#' + input.id).removeClass('is-invalid');
        $('#' + input.id + '_label').removeClass('text-danger');
        $('#' + input.id + '_icon').removeClass('text-danger');
        $('#' + input.id + '_icon_border').removeClass('field-error');
        $('#' + input.id + '_error').html('');
    }

</script>
<script>
    let in1 = document.getElementById('otc-1'),
        ins = document.querySelectorAll('input[type="number"]'),
        splitNumber = function (e) {
            let data = e.data || e.target
                .value; // Chrome doesn't get the e.data, it's always empty, fallback to value then.
            if (!data) return; // Shouldn't happen, just in case.
            if (data.length === 1) return; // Here is a normal behavior, not a paste action.
            popuNext(e.target, data);
            //for (i = 0; i < data.length; i++ ) { ins[i].value = data[i]; }
        },
        popuNext = function (el, data) {
            el.value = data[0]; // Apply first item to first input
            data = data.substring(1); // remove the first char.
            if (el.nextElementSibling && data.length) {
                // Do the same with the next element and next data
                popuNext(el.nextElementSibling, data);
            }
        };
    ins.forEach(function (input) {
        input.addEventListener('keyup', function (e) {
            // Break if Shift, Tab, CMD, Option, Control.
            if (e.keyCode === 16 || e.keyCode == 9 || e.keyCode == 224 || e.keyCode == 18 || e
                .keyCode == 17) {
                return;
            }
            // On Backspace or left arrow, go to the previous field.
            if ((e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this
                .previousElementSibling.tagName === "INPUT") {
                this.previousElementSibling.select();
            } else if (e.keyCode !== 8 && this.nextElementSibling) {
                this.nextElementSibling.select();
            }
            // If the target is populated to quickly, value length can be > 1
            if (e.target.value.length > 1) {
                splitNumber(e);
            }
        });
        input.addEventListener('focus', function (e) {
            // If the focus element is the first one, do nothing
            if (this === in1) return;
            // If value of input 1 is empty, focus it.
            if (in1.value == '') {
                in1.focus();
            }
            // If value of a previous input is empty, focus it.
            // To remove if you don't wanna force user respecting the fields order.
            if (this.previousElementSibling.value == '') {
                this.previousElementSibling.focus();
            }
        });
    });
    in1.addEventListener('input', splitNumber);

</script>
</body>

</html>
