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
    <div id="all_match_schedule" class="my-5">
        <div class="container">
            <div class="my-3">
                <h4 class="text-danger">All Match Schedule</h4>
            </div>
            <div class="row" id="scheduleTournament">


            </div>
        </div>
    </div>
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
                var trmId = "{{request()->segment(3)}}"
                getGroupByTournament(trmId)

                function getGroupByTournament(id) {
                    $.ajax({
                        type: 'GET',
                        url: window.origin+"/api/v1/tournament/get-schedule-by-tournament-id/" + id,
                        dataType: 'json',
                        success: function (res) {
// console.log("asdfa;lsdfj", res)
                            if (res.status === 'success') {
                                if (res.data.length !== 0) {
                                    var data = res.data
                                    let tournamentGroup = data.reduce((r, a) => {
                                        r[a.group_id] = [...r[a.group_id] || [], a];
                                        return r;
                                    }, {});
                                    const cartEntries = Object.entries(tournamentGroup);
                                    console.log("data", cartEntries)
                                    cartEntries.forEach(function (item) {
                                        $("#scheduleTournament").append(`
<h6 class="text-danger my-3">${item[1][0].group.group_name}</h6>
<div class="row" id="matchSchedule${item[0]}">
</div>
`)
                                        item[1].forEach(function (item2) {
                                            $("#matchSchedule" + item[0]).append(`
<div class="col-lg-4 col-sm-12 my-2 ">
   <div class="card schedule">
      <div class="card-body ">
         <span>${item2.on_date},${tConvert(item2.time)}</span>
         <span>(Match  ${item2.match_no} )</span>
         <p class="title"> ${item2.group.group_name},
            ${item2.tournament.name}
         </p>
         <div class="d-flex my-2 align-items-center">
            <img src="${item2.first_team.image}" class="today_match_img" alt="">
            <h6 class="text-capitalize mx-2">${item2.first_team.team_name}</h6>
         </div>
         <div class="d-flex my-2 align-items-center">
            <img src="${item2.second_team.image}" class="today_match_img" alt="">
            <h6 class="text-capitalize mx-2">${item2.second_team.team_name}</h6>
         </div>
         <div>
            <span class="">Match yet to began</span>
         </div>
      </div>
   </div>
</div>
`)
                                        })
                                    })
                                    function tConvert(time) {
// Check correct time format and split into components
                                        time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
                                        if (time.length > 1) { // If time format correct
                                            time = time.slice(1);  // Remove full string match value
                                            time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                                            time[0] = +time[0] % 12 || 12; // Adjust hours
                                        }
                                        return time.join(''); // return adjusted time or original string
                                    }
                                }else{
                                    $("#scheduleTournament").append(`
<div class="row alert alert-danger col-md-6">
Schedule Not Create Yet.....
<div>
`)
                                }
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }
                // get All TeamsAnd Todays Match
                // getAllTeamsAndTodaysMatch
                var getTeams = "/api/v1/team/get-all"
                getAllTeamsAndTodaysMatch(getTeams)

                // get AllUpcomingMatch
                // getAllUpcomingMatch
                getAllUpcomingMatch()

            </script>
    @endpush
