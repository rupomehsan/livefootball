<hr>
<div class="footer">


    <div class="container">
        <div class="row justify-content-between ">
            <div class="col-md-3 footerLink">
                <h6 class="font-weight-bold footerHeading">About <span class="siteName"></span></h6>
                <a href="{{url('page/about-us')}}" class="d-block">About Us</a>
                <a href="{{url('page/terms-condition')}}" class="d-block">Terms & Condition</a>
                <a href="{{url('page/privacy-policy')}}" class="d-block">Privacy Policy</a>
            </div>
            <div class="col-md-9 text-lg-end text-md-end text-sm-start ">
                <h6 class="footerHeading">Don’t Forget to Follow Us</h6>

                <div>
                    <ul class="d-flex footer-nav justify-content-lg-end justify-content-md-end  justify-content-sm-start ">
                        <li class="foterSocial">
                            <a href="" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        </li class="foterSocial">
                        <li class="foterSocial">
                            <a href="" class="youtube"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li class="foterSocial">
                            <a href="" class="instagram"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="foterSocial">
                            <a href="" class="twitter"><i class="fab fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>
                <p>Email Us: <span class="siteEmail"></span></p>
            </div>
        </div>

    </div>
    <div style="border-top: 1px dotted white;"></div>
    <div class="container" >
        <div class="row align-items-center justify-content-sm-start">
            <div class="col-md-6 text-sm-start">
                <img class="siteLogo" src="{{asset('assets/img/avatar.png')}}"
                     style="border-radius: 50%;margin:10px 0px;" height="50" alt="logo">
            </div>
            <div class="col-md-6 text-lg-end text-sm-start">
                <p>© <span class="siteName"></span> <?= date('Y') ?>. All rights reserved</p>
            </div>
        </div>
    </div>
</div>


<!-- jqurry -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- owl-carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- boostrap cdn js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/3.2.1/jquery.serializejson.min.js"></script>
<!-- <script src="https://unpkg.com/video.js/dist/video.js"></script>
<script src="https://unpkg.com/@videojs/http-streaming/dist/videojs-http-streaming.js"></script> -->

<!--  <script>-->
<!--    var player = videojs('my_video_1', {-->
<!--      // controls: true,-->
<!--      autoplay: true,-->
<!--      preload: 'auto',-->
<!---->
<!--      controlBar: {-->
<!--        playToggle: true,-->
<!--        captionsButton: true,-->
<!--        chaptersButton: true,-->
<!--        subtitlesButton: true,-->
<!--        remainingTimeDisplay: true,-->
<!--        progressControl: {-->
<!--          seekBar: true-->
<!--        },-->
<!--        fullscreenToggle: true,-->
<!--        playbackRateMenuButton: false,-->
<!--      },-->
<!---->
<!---->
<!--    });-->
<!--    player.src({-->
<!--      // src: 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8',-->
<!--      type: 'application/x-mpegURL',-->
<!--      handleManifestRedirects: true-->
<!--    });-->
<!---->
<!--  </script>-->

<!-- custom js -->

<!-- one signal Files-->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "27cc369f-4903-41eb-8e36-e51cc64638ba",
      safari_web_id: "web.onesignal.auto.0908e376-c893-48cd-92f7-007572df5c49",
      notifyButton: {
        enable: true,
      },
    });
  });
 </script>
<script src="{{asset('landing/assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('landing/assets/js/public.js')}}"></script>
<script src="{{asset('assets/js/authentication.js')}}"></script>
<script src="{{asset('assets/js/modal-authentication.js')}}"></script>
<script>


    $(document).ready(function () {
        var userData = localStorage.getItem('userInformation')
        if (userData) {
            $('#logoutmenu').append(`
            <div class="sidebar-icon-bg mt-2"></div>
                        <span class="title auth-btn">Logout</span>
            `)
        } else {

            $('#loginmenu').append(`
            <div class="sidebar-icon-bg mt-2"></div>
                        <span class="title auth-btn">Login</span>
            `)
        }

        $('#logoutmenu').click(function () {
            localStorage.removeItem('userInformation');
            window.location.href = "{{url('/')}}"
        })
        $("#loginmenu").click(function(){
            $(".text-danger").text('')
            // $("#LoginForm").removeClass('d-none')
            // $("#SignUpForm").addClass('d-none')
            // $("#forgotPasswordForm").addClass('d-none')
            // $("#verifyCodeForm").addClass('d-none')

        })

        $('#favoritList').click(function () {
            var userData = localStorage.getItem('userInformation')
            if (userData) {
                window.location.href = window.origin+"/favourite"
            } else {
                toastr.error("Please login your account to see your favorite list")
            }
        })


        $.ajax({
            type: "GET",
            url: window.origin+"/api/v1/setting/get",
            dataType: "json",
            // async: false,
            success: function (res) {
                if (res.status === "success") {
                    $('#siteTitle').text(res.data.system_name)
                    $('.siteName').text(res.data.system_name)
                    $('.siteEmail').text(res.data.mail_address)
                    $('.siteLogo').attr('src', res.data.image)
                    $('.facebook').attr('href', res.data.facebook)
                    $('.instagram').attr('href', res.data.instagram)
                    $('.twitter').attr('href', res.data.twitter)
                    $('.youtube').attr('href', res.data.youtube)
                }

            },
            error: function (err) {
                console.log(err)
            }
        });

        $.ajax({
            type: "GET",
            url: window.origin+"/api/v1/advertisement/get-all",
            dataType: "json",
            // async: false,
            success: function (res) {
                if (res.status === "success") {
                    // console.log("addds", res)
                        res.data.forEach(function (item) {


                            if (item.ad_type === 'custom_popup' && item.status === "on") {
                                $('#csPopupImage').attr('src', window.origin + "/uploads/ad/" + item.image)
                                $('#csPopupLink').attr('href', item.ad_link)
                            } else if (item.ad_type === 'popup' && item.status === "on") {
                                $('#csPopupImage').attr('src', window.origin + "/uploads/ad/" + item.image)
                                $('#csPopupLink').attr('href', item.ad_link)

                            }

                            if (item.ad_type === 'custom_header' && item.status === "on") {
                                $(".addImage").attr("src", window.origin + "/uploads/ad/" + item.image)
                                $(".addLink").attr("href", item.ad_link)
                            } else if (item.ad_type === 'header' && item.status === "on") {
                                $(".addImage").attr("src",  window.origin + "/uploads/ad/" + item.image)
                                $(".addLink").attr("href", item.ad_link)
                            }

                            if (item.ad_type === "custom_site_banner" && item.status === "on") {
                                $("#siteBannerAddsImage").attr("src", window.origin + "/uploads/ad/" + item.image)
                                $("#siteBannerAddsLink").attr("href", item.ad_link)
                            } else if (item.ad_type === "site_banner" && item.status === "on") {
                                $("#siteBannerAddsImage").attr("src",  window.origin + "/uploads/ad/" + item.image)
                                $("#siteBannerAddsLink").attr("href", item.ad_link)
                            }

                            if(item.ad_type === "custom_popup"){
                                localStorage.setItem("custom_type",item.status)
                                localStorage.setItem("cs_add_per_click",item.show_per_video_category)
                            }
                            if(item.ad_type==="popup"){
                                localStorage.setItem("gg_popup_add_per_click",item.show_per_video_category)
                            }


                            if(item.ad_type==="upcoming_matches"){
                                localStorage.setItem("upcoming_matches",JSON.stringify(item))
                            }

                            if(item.ad_type==="custom_upcoming_matches"){
                                localStorage.setItem("custom_upcoming_matches",JSON.stringify(item))
                            }


                        })
                }
            },
            error: function (err) {
                console.log(err)
            }
        });
    })


    $(document).on("click", "button, a", function () {
        var data = localStorage.getItem("custom_type") ?? null;
        if (data === 'on') {
            var clickCounter = parseInt(localStorage.getItem("clickCounter")) || 0;
            var adsData = parseInt(localStorage.getItem("cs_add_per_click")) || 0;
            // alert(adsData);
            if (clickCounter >= adsData) {
                clickCounter = 0;
                parseInt(localStorage.setItem("clickCounter", 0));
            }
            clickCounter += 1;
            parseInt(localStorage.setItem("clickCounter", clickCounter));
        } else if (data === 'off') {
            var clickCounter = parseInt(localStorage.getItem("clickCounter")) || 0;
            var adsData = parseInt(localStorage.getItem("gg_popup_add_per_click")) || 0;
            // alert(adsData);
            if (clickCounter >= adsData) {
                clickCounter = 0;
                parseInt(localStorage.setItem("clickCounter", 0));
            }
            clickCounter += 1;
            parseInt(localStorage.setItem("clickCounter", clickCounter));
        }
    });

    var clickCounter = parseInt(localStorage.getItem("clickCounter")) || 0;
    var csAdsData = parseInt(localStorage.getItem("cs_add_per_click")) || 0;
    var adsData = parseInt(localStorage.getItem("gg_popup_add_per_click")) || 0;

    if(localStorage.getItem("custom_type") ==="on"){
        if (clickCounter === csAdsData) {
            $('#popupAdsPannel').addClass('popup-ads-pannel');
            $('#Wrapper').addClass('wrapper');
        }
    }else if(localStorage.getItem("custom_type")==="off"){
        if (clickCounter === adsData) {
            $('#popupAdsPannel').addClass('popup-ads-pannel');
            $('#Wrapper').addClass('wrapper');
        }
    }

    $('#closePopup').click(function () {
        $('#popupAdsPannel').removeClass('popup-ads-pannel');
        $('#Wrapper').removeClass('wrapper');
    })




</script>
@stack('custom-js')
</body>
</html>



