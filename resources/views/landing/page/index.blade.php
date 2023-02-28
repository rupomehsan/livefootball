@extends('layouts.landing.index')
@section('content')

    <div id="homepage_add" class="mt-100">
        <div class="container text-center">
            <a href="" class="addLink" target="_blank">
                <img  src="admin/uploads/e6188a321a1.png" class="homepage_add_img addImage"
                      alt="advertisement image">
            </a>
        </div>
    </div>
    <!-- ======= End  Home Adds Content Section ======= -->
    <!-- ======= End  Home Adds Content Section ======= -->
    <div id="page" class="mt-5 container">
         <div class="row text-center">

                 <h3 class="pageTitle"></h3>
             <hr>
                 <p class="padeDescription"></p>
         </div>
    </div>
@endsection

@push('custom-js')
    <script>
        var pageName = "{{request()->segment(2)}}";
        $.ajax({
            type: "GET",
            url: window.origin+"/api/v1/setting/get",
            dataType: "json",
            // async: false,
            success: function (res) {
                if (res.status === "success") {
                  if(pageName==="about-us"){
                      $(".pageTitle").text("About Us")
                      $(".padeDescription").html(res.data.description)
                  }else if(pageName==="terms-condition"){
                      $(".pageTitle").text("Terms & Condition")
                      $(".padeDescription").html(res.data.terms_policy)
                  }else if(pageName==="privacy-policy"){
                      $(".pageTitle").text("Privacy Policy")
                      $(".padeDescription").html(res.data.privacy_policy)
                  }
                }
            },
            error: function (err) {
                console.log(err)
            }
        });

    </script>
@endpush
