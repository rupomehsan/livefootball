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
                <img src="{{asset('admin/uploads/e6188a321a1.png')}}" class="homepage_add_img addImage"
                     alt="advertisement image">
            </a>
        </div>
    </div>
    <!-- ======= End  Home Adds Content Section ======= -->
    <!-- ======= End  Home Adds Content Section ======= -->

    <!-- ======= Today’s All Match ======= -->
    <!-- ======= Today’s All Match ======= -->
    <div id="homepage_upcoming">
        <div class="container">
            <div class="my-3">
                <h4 class="text-danger">Favourite Matches</h4>
            </div>
            <div id="homepage_upcoming_carousel" class="owl-carousel owl-theme">
            </div>
        </div>
        <!-- ======= End Today’s All Match Section ======= -->
        <!-- ======= End Today’s All Match Section ======= -->
        <!-- =======  Home Adds Content Section ======= -->
        <!-- =======  Home Adds Content Section ======= -->
        <div id="homepage_add" class="my-1">
            <div class="container text-center">
                <a href="" class="addLink" target="_blank">
                    <img src="{{asset('admin/uploads/e6188a321a1.png')}}" class="homepage_add_img addImage"
                         alt="advertisement image">
                </a>
            </div>
        </div>
        <!-- ======= End  Home Adds Content Section ======= -->
        <!-- ======= End  Home Adds Content Section ======= -->
        <!-- =======All Teams Section ======= -->
        <!-- ======= All Teams Section ======= -->

        <!-- homepage teams -->
        <div id="teams">
            <div class="container">
                <div class="my-3">
                    <h4 class="text-danger">Teams</h4>
                </div>
                <section class="customer-logos slider">

                </section>


            </div>
        </div>
        <!-- end  homepage teams -->
        <!-- ======= End Today’s All Match Section ======= -->
        <!-- ======= End Today’s All Match Section ======= -->

        <!-- ======= Upcoming Matches Section ======= -->
        <!-- ======= Upcoming Matches Section ======= -->
        <!-- homepage upcoming matches -->
    {{--    <div id="homepage_upcoming">--}}
    {{--        <div class="container">--}}
    {{--            <div class="my-3">--}}
    {{--                <h4 class="text-danger">Upcoming Matches</h4>--}}
    {{--            </div>--}}
    {{--            <div id="homepage_upcoming_carousel" class="owl-carousel owl-theme">--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <!-- end homepage upcoming matches -->
        <!-- ======= End Upcoming Matches Section ======= -->
        <!-- ======= End Upcoming Matches Section ======= -->

        @endsection

        @push('custom-js')
            <script>
                var getTeams = "/api/v1/team/get-all"
                getAllTeamsAndTodaysMatch(getTeams)


                getAllFavoriteMatch()

                function getAllFavoriteMatch() {
                    var userData = JSON.parse(localStorage.getItem("userInformation"))
                    $.ajax({
                        type: 'GET',
                        url: window.origin + "/api/v1/get-all-favourite-match",
                        dataType: 'json',
                        data: {"userId": userData.id},
                        success: function (res) {
                            // console.log(res)
                            if (res.status === 'success') {
                                // $(".customer-logos").empty()
                                if (res.data.length !== 0) {
                                    res.data.forEach((item) => {
                                        $("#homepage_upcoming_carousel").append(`
                         <div class="item my-3" style="position:relative;">
                            <i class="fa fa-heart prvHrt exist" onclick="addToFavorite('${item.schedule.id}')" aria-hidden="true"> </i>
                                                          <a href="{{url('live-details')}}/${item.schedule_id}">
                                                                                <div class="card">
                                                                                    <div class="upcoming_card_img_box">
                                                                                        <img src="${item.schedule.image}" class="card-img-top" alt="...">
                                                                                    </div>

                                                                                           <div class="group-tema-name match-no px-3">Match ${item.schedule.match_no}</div>
         <div class="date-time px-3">  Match ended at  ${item.created_at.slice(11, item.created_at.lastIndexOf("."))}  ${item.on_date}</div>


                                                                                    <div class="card-body">

                                                                                        <div><p>${item.match_won_info.team.team_name} won by ${item.match_won_info.won_by}</p></div>
                                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                                            <div class="text-center">
                                                                                                <img src="${item.schedule.first_team.image}"
                                                                                                     class="teamLogo" alt=""/>
                                                                                                <h6 class="my-2">${item.schedule.first_team.team_name}</h6>
                                                                                            </div>
                                                                                            <div>
                                                                                                <h6 class="today_match_vs">VS</h6>
                                                                                            </div>
                                                                                            <div class="text-center">
                                                                                                <img src="${item.schedule.second_team.image}"
                                                                                                     class="teamLogo" alt=""/>
                                                                                                <h6 class="my-2">${item.schedule.second_team.team_name}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                              `)

                                    })
                                } else {
                                    $("#homepage_upcoming_carousel").empty()
                                    $("#homepage_upcoming_carousel").after(`
                                    <div>Favourite list not create yet....</div>
                                    `)
                                }
                                $('#homepage_upcoming_carousel').owlCarousel({
                                    loop: true,
                                    margin: 10,
                                    nav: true,
                                    dots: false,

                                    //   autoplay: true,
                                    responsive: {
                                        0: {
                                            items: 1,
                                        },
                                        600: {
                                            items: 2,
                                        },
                                        1000: {
                                            items: 3,
                                        },
                                        1200: {
                                            items: 3,
                                        },
                                    },
                                });
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }

                function addToFavorite(id) {

                    var userInfo = JSON.parse(localStorage.getItem("userInformation"))
                    // alert( userInfo.id)
                    if (userInfo) {
                        $.ajax({
                            type: 'post',
                            url: window.origin+"/api/v1/add-to-favourite-list",
                            data: {
                                "userId": userInfo.id,
                                "matchId": id,
                            },
                            dataType: 'json',
                            success: function (res) {
                                // console.log(res)
                                if (res.status === 'success') {
                                    toastr.success(res.message)
                                }
                                getAllFavoriteMatch()
                            },
                            error: function (err) {
                                console.log(err);
                            }
                        })
                    } else {
                        toastr.error("Please logged in added to the favourite list.....")
                    }
                }
            </script>
    @endpush
