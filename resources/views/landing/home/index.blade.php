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
    <div id="today_match" class="my-5">
        <div class="container">
            <div class="my-3">
                <h4 class="text-danger">Today’s All Match</h4>
            </div>
            <div class="row" id="todayAllMatches"></div>
        </div>
    </div>
    <!-- ======= End Today’s All Match Section ======= -->
    <!-- ======= End Today’s All Match Section ======= -->

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
    <!-- =======All Teams Section ======= -->
    <!-- ======= All Teams Section ======= -->

    <!-- homepage teams -->
    <div id="teams">
        <div class="container">
            <div class="my-3">
                <h4 class="text-danger">Teams</h4>
            </div>
            <section class="customer-logos slider" id="allTeams">

            </section>
        </div>
    </div>
    <!-- end  homepage teams -->
    <!-- ======= End Today’s All Match Section ======= -->
    <!-- ======= End Today’s All Match Section ======= -->
    <div id="homepage_add" class="my-1">
        <div class="container text-center">
            <a href="" class="addLink" target="_blank">
                <img  src="admin/uploads/e6188a321a1.png" class="homepage_add_img addImage"
                      alt="advertisement image">
            </a>
        </div>
    </div>
    <!-- ======= Upcoming Matches Section ======= -->
    <!-- ======= Upcoming Matches Section ======= -->
    <!-- homepage upcoming matches -->
    <div id="homepage_upcoming">
        <div class="container">
            <div class="my-3">
                <h4 class="text-danger">Upcoming Matches</h4>
            </div>
            <div id="homepage_upcoming_carousel" class="owl-carousel owl-theme">
            </div>
        </div>

        <!-- end homepage upcoming matches -->
        <!-- ======= End Upcoming Matches Section ======= -->
        <!-- ======= End Upcoming Matches Section ======= -->
        @endsection
        @push('custom-js')
            <script>
                // get All TeamsAnd Todays Match
                // getAllTeamsAndTodaysMatch
                var getTeams = "/api/v1/team/get-all"
                getAllTeamsAndTodaysMatch(getTeams)

                // get AllUpcomingMatch
                // getAllUpcomingMatch
                getAllUpcomingMatch()


            </script>
    @endpush
