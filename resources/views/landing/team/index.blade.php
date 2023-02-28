@extends('layouts.landing.index')
@section('content')

    <!-- ======= Main Slider Content Section ======= -->
    <!-- ======= Main Slider Content Section ======= -->
    <div id="homepage_banner">
        <div id="top_banner" class="owl-carousel owl-theme">

        </div>
    </div>
    <!-- ======= End Main Slider Content Section ======= -->
    <!-- ======= End Main Slider Content Section ======= -->

    <!-- =======  Home Adds Content Section ======= -->
    <!-- =======  Home Adds Content Section ======= -->
    <div id="homepage_add" class="my-1">
        <div class="container text-center">
            <a href="" class="addLink" target="_blank">
                <img  src="admin/uploads/e6188a321a1.png" class="homepage_add_img addImage"
                      alt="advertisement image">
            </a>
        </div>
    </div>
    <!-- ======= End  Home Adds Content Section ======= -->
    <!-- ======= End  Home Adds Content Section ======= -->


    <!-- ======= Today’s All Match ======= -->
    <!-- ======= Today’s All Match ======= -->
    <div id="team_squad">

    </div>
    <!-- ======= End Today’s All Match Section ======= -->
    <!-- ======= End Today’s All Match Section ======= -->

        @endsection
        @push('custom-js')
            <script>
                var getTeams = "/api/v1/team/get-all"
                getAllTeamsAndTodaysMatch(getTeams)


               var teamId = "{{request()->segment(2)}}";
                var singleTeamUrl = "/api/v1/team/edit/"+teamId
                getSingleTeams(singleTeamUrl)
                function getSingleTeams(url) {
                    let baseUrl = window.origin + url
                    // alert(baseUrl)
                    $.ajax({
                        type: 'GET',
                        url: baseUrl,
                        dataType: 'json',
                        success: function (res) {
                            // console.log(res)
                            if (res.status === 'success') {
                               $("#team_squad").append(`
                                <div class="container">
                                        <div>
                                            <h4 class="mb-4">${res.data[0].team_name}</h4>
                                            <p class="content">${res.data[0].description}</p>
                                        </div>
                                        <div class="row my-5">
                                            <div class="col-lg-5">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                                            <h4>SQUAD</h4>
                                                        </button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                       <div id="players"></div>




                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- homepage add -->


                                                <div id="homepage_add" class="my-5 adds_img">
                                                    <div class="text-end">
                                                        <a href="" id="siteBannerAddsLink">
                                                                <img id="siteBannerAddsImage" src="admin/uploads/968a0e49ca2.jpg" class="" alt="Banner Adds">
                                                            </a>
                                                    </div>
                                                </div>

                                                <!-- end homepage add -->

                                            </div>
                                        </div>
                                    </div>
                                                           `)

                                res.data[0].players.forEach(function(player){
                                    $("#players").append(`
                                     <div class="m-3">
                                        <h6>${player.name}</h6>
                                        <span class="text-secondary">${(player.role)==null?"N/A":player.role}</span>
                                     </div>
                                    `)
                                })

                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }

            </script>
    @endpush
