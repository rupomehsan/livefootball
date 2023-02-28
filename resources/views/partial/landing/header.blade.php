<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title id="siteTitle">Site Title</title>
    <!-- boostrap cdn css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <!-- owl-corousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet"/>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('landing/assets/css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/assets/css/owl.theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/assets/css/responsive.css')}}"/>
    <!-- <link rel="stylesheet" href="./assets/css/account.css" /> -->
</head>
<body>
<!-- navigation -->
<div id="Wrapper" class="">
    <div id="popupAdsPannel" class="nothing" style="height:0px;opacity:0;">
        <button id="closePopup">
            <i class="fas fa-times"></i>
        </button>
        <a href="" id="csPopupLink">
            <img id="csPopupImage" src="" alt="" title="" style="width: 100%; height: 100%"/>
        </a>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top scroll-color">
    <div class="container-fluid mx-5">
        <a href="{{url('/')}}" class="navbar-brand">
            <img class="siteLogo" src="{{asset('assets/img/avatar.png')}}" style="border-radius: 50%" height="50" alt="logo">
            <span class="siteName">SiteName</span>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        $currentControllerName = Request::segment(1);
//        dd($currentControllerName);
        ?>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">
                        <div class="sidebar-icon-bg">
                        </div>
                        <span class="title {{ $currentControllerName == '' ? 'active' : '' }}">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  "
                       href="{{url('/fixtures')}}">
                        <div class="sidebar-icon-bg">

                        </div>
                        <span class="title {{ $currentControllerName == 'fixtures' ? 'active' : '' }}">Fixtures</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{url('/live')}}">
                        <div class="sidebar-icon-bg"></div>
                        <span class="title {{ $currentControllerName == 'live' ? 'active' : '' }}">Live</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link  "
                       href="{{url('/highlights')}}">
                        <div class="sidebar-icon-bg">

                        </div>
                        <span class="title {{ $currentControllerName == 'highlights' ? 'active' : '' }}">Highlights</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link"
                       href="{{url('/point-table')}}">
                        <div class="sidebar-icon-bg">

                        </div>
                        <span class="title {{ $currentControllerName == 'point-table' ? 'active' : '' }}">Point Table</span>
                    </a>
                </li>

                <li class="nav-item" id="favoritList">
                    <a class="nav-link login" style="cursor: pointer"><i class="far fa-heart"></i></a>
                </li>

                <li class="nav-item">
                    <a class="" id="loginmenu"
                       href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#ModalForm">

                    </a>
                    <a class="" id="logoutmenu" href="javascript:void(0)">

                    </a>
                </li>

            </div>
        </div>
    </div>
</nav>


<!-- Modal Form -->
<div class="modal fade authenticationForm" id="ModalForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="LoginForm">
            <!-- Login Form -->
            <form action="{{url('api/v1/user/login')}}" id="loginForm" enctype="multipart/form-data">
                <div class="modal-header py-3 d-flex justify-content-center">
                    <h3 class="modal-title">Login </h3>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <div class="mb-3" id="userName">
                        <label for="Username" class="py-3">Email<span class="text-danger">*</span></label>
                        <input type="Email" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="text-danger email_error" id=""></div>
                    <div class="mb-3" id="userPassword">

                        <label for="Password" class="py-3">Password<span class="text-danger">*</span></label>
                        <div class="password-hide-show">  <span class="iconify password-icon" data-icon="el:eye-close"></span> </div>
                        <input type="password" name="password" class="form-control " id="password" placeholder="Enter Password">
                    </div>
                    <div class="text-danger password_error" id=""></div>
                    <div class="mb-3" id="">
                        <input class="form-check-input" type="checkbox" value="" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                        <a href="javascript:void(0)" id="forgotPassword" class="float-end">Forgot Password</a>
                    </div>
                </div>
                <div class="modal-footer pt-4">
                    <button id="submit-button" type="submit" class="btn btn-success mx-auto w-100">
                       <span id="submit-button-loader" class="spinner-border submit-button-loader spinner-border-sm d-none"
                             role="status" aria-hidden="true"></span> Login
                    </button>
                </div>
                <div id="mdlFooter">
                    <p class="text-center">Don’t have an account ?  <span id="signUp" class="btn btn-success btn-sm mx-3">Signup</span></p>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="SignUpForm">
            <!-- Login Form -->
            <form action="{{url('api/v1/user/signup')}}" id="signUpform" enctype="multipart/form-data">
                <div class="modal-header py-3 d-flex justify-content-center">
                    <h3 class="modal-title">SignUp </h3>
                </div>
                <div class="modal-body">
                    <div class="mb-3" >
                        <label for="Username" class="py-3">Username<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Username">
                    </div>
                    <div class="text-danger name_error" id=""></div>
                    <div class="mb-3" >
                        <label for="email" class="py-3">Email<span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="text-danger email_error" id=""></div>
                    <div class="mb-3" >
                        <label for="Password" class="py-3">Password<span class="text-danger">*</span></label>
                        <div class="password-hide-show">  <span class="iconify password-icon" data-icon="el:eye-close"></span> </div>
                        <input type="password" name="password" class="form-control password" id="password" placeholder="Enter Password">
                    </div>
                    <div class="text-danger password_error" id=""></div>
                    <div class="mb-3" >
                        <label for="password" class="py-3">Confirm Password<span class="text-danger">*</span></label>
                        <div class="password-hide-show">  <span class="iconify con-password-icon" data-icon="el:eye-close"></span> </div>
                        <input type="password" name="con-password" class="form-control con-password" id="con-password" placeholder="Enter Confirm Password">
                    </div>
                    <div class="text-danger con-password_error" id=""></div>
                    <div class="mb-3 d-flex justify-content-between" id="">
                        <div>
                        <input class="form-check-input" type="checkbox" value="" id="remember" >
                        <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <span class="float-right "><a href="/" class="text-secondary">Skip Now</a></span>
                    </div>
                </div>
                <div class="modal-footer pt-4">
                    <button id="submit-button-signup" type="submit" class="btn btn-success mx-auto w-100">
                        <span id="submit-button-loader" class="spinner-border submit-button-loader spinner-border-sm d-none"
                              role="status" aria-hidden="true"></span>  Signup
                    </button>
                </div>
                <div id="mdlFooter">
                    <p class="text-center">Have An Account?  <span id="Login" class="btn btn-success btn-sm">Login</span></p>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="forgotPasswordForm">
            <!-- Login Form -->
            <form action="{{url('api/v1/auth/user/forgot-password')}}" id="resetPassformUser" enctype="multipart/form-data">
                <div class="modal-header py-3 d-flex justify-content-center">
                    <h3 class="modal-title">Forgot a Password? </h3>
                </div>
                <div class="modal-body">
                    <div class="mb-3" >
                        <label for="email" class="py-3">Email<span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" id="" placeholder="Enter your email">
                    </div>
                </div>
                <div class="text-danger email_error" id=""></div>
                <div class="modal-footer pt-4">
                    <button id="submit-button-forgot" type="submit" class="btn btn-success mx-auto w-100">
                       <span id="submit-button-loader" class="spinner-border submit-button-loader spinner-border-sm d-none"
                             role="status" aria-hidden="true"></span>  Send
                    </button>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="verifyCodeForm">
            <!-- Login Form -->
            <form action="{{url('api/v1/auth/user/user-verify')}}" id="UserVarifyForm" enctype="multipart/form-data">
                <div class="modal-header py-3 d-flex justify-content-center">
                    <h6 class="modal-title">Please check your email <b class="requestEmail"></b> </h6>
                </div>
                <div class="modal-body">
                    <div class="mb-3" >
                        <input type="hidden" name="email" class="requestEmail">
                        <label for="email" class="py-3">Enter Verification Code <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control" id="code" placeholder="Enter your verification code">
                    </div>
                    <div class="text-danger code_error" id=""></div>
                </div>
                <div class="modal-footer pt-4">
                    <button id="submit-button-verify" type="submit" class="btn btn-success mx-auto w-100">
                       <span id="submit-button-loader" class="spinner-border submit-button-loader spinner-border-sm d-none"
                             role="status" aria-hidden="true"></span>   Send
                    </button>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="createNewPasswordForm">
            <!-- Login Form -->
            <form action="{{url('api/v1/auth/user/change-password')}}" id="ChangePasswordForm" enctype="multipart/form-data">
                <div class="modal-header py-3 d-flex justify-content-center">
                    <h5 class="modal-title">Create new password</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3" >
                        <input type="hidden" name="email" class="requestEmail">
                        <label for="email" class="py-3">Enter new password <span class="text-danger">*</span></label>
                        <div class="password-hide-show">  <span class="iconify new-password-icon" data-icon="el:eye-close"></span> </div>
                        <input type="text" name="new_password" class="form-control new_password" id="new-password" placeholder="Enter your new password">
                    </div>
                    <div class="text-danger new_password_error" id=""></div>
                    <div class="mb-3" >
                        <label for="email" class="py-3">Confirm new password <span class="text-danger">*</span></label>
                        <div class="password-hide-show">  <span class="iconify con-new-password-icon" data-icon="el:eye-close"></span> </div>
                        <input type="text" name="con_new_password" class="form-control con_new_password" id="con-new-password" placeholder="Enter confirm password">
                    </div>
                    <div class="text-danger con_new_password_error" id=""></div>
                </div>
                <div class="modal-footer pt-4">
                    <button id="submit-button-new-pass" type="submit" class="btn btn-success mx-auto w-100">
                       <span id="submit-button-loader" class="spinner-border submit-button-loader spinner-border-sm d-none"
                             role="status" aria-hidden="true"></span>   Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
