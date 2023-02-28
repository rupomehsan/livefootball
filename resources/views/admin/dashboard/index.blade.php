@extends('layouts.admin.index')
@section('content')

    <!-- ======= Main Content Section ======= -->
    <main id="main" class="main">
        <h6 class="py-3">👋 Hello!</h6>
        <h4 class="my-3">Welcome <span class="primary-color">Onboard</span></h4>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="home_content">
                    <div class="d-flex align-items-center mb-3">
                        <div class="dash"></div>
                        <h6 class="text-danger mb-0 pb-0">Today’s Match</h6>
                    </div>
                    <p>
                        We Have <span class="match_count fw-bolder">
                0 </span> Matches Today,
                        Stay Focused
                    </p>
                    <div class="row" id="todayMatchShow">

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="home_content">
                    <div class="d-flex align-items-center mb-3">
                        <div class="dash"></div>
                        <h6 class="text-danger mb-0 pb-0">Today’s Match Win Info</h6>
                    </div>

                    <p>
                        We Have <span class="match_count fw-bolder">
                0 </span> Matches Today,
                        Stay Focused Won Information
                    </p>


                    <div class="row" id="todayMatchWonInfo">

                    </div>
                </div>
            </div>
        </div>


    </main>
    <!-- ======= End Main Content Section ======= -->
@endsection
@push('custom-js')
    <script>
        $(document).ready(function () {
            var url = window.origin + "/api/v1/get-all-today-match"
            // alert(url)
            $.ajax({
                url: url,
                method: "get",
                dataType: "json",
                success: function (res) {
                    console.log(res)
                    if (res.status === "success") {
                        // $(".match_count").text(res.count)
                        if (res.data.length !== 0) {
                            $(".match_count").text(res.data.length)
                            res.data.forEach(function (item) {
                                $("#todayMatchShow").append(`
                              <div class="col-md-6">
                            <div class="card mx-2 mb-3">
                                <div class="card-body text-center">
                                    <h6>${item.on_date},
                                        <span class="matchTime">${tConvert(item.time)};</span> <br>
                                        (Match ${item.match_no})
                                    </h6>
                                    <div class="
                                              d-flex
                                              justify-content-between
                                              align-items-center
                                              my-4
                                            ">
                                        <div class="teamimage">
                                            <img class="ml-2" src="${item.first_team.image}" alt="" height="60" width="100">
                                        </div>
                                        <h6>VS</h6>
                                        <div class="teamimage">
                                            <img class="ml-2" src="${item.second_team.image}" alt="" height="60" width="100">
                                        </div>
                                    </div>
                                    <div class="team_name">
                                        <p style="width:45%;display:inline-block;text-align:left;">${item.first_team.team_name}</p>
                                        <p style="width:45%;display:inline-block;text-align:right;">${item.second_team.team_name}</p>
                                    </div>
                                    <p>Match Start In :</p>
                                    <h6 id="demo${item.id}"></h6>

                                          <div class="editLink${item.id}">
                                    </div>
                                        </div>
                                        </div>
                                        </div>
                            `)




                                if (item.status == 0) {
                                    $(".editLink" + item.id).append(`
                               <a href="${window.origin}/admin/match/link/edit/${item.id}" class="btn btn-dark my-3">Add Matchinfo</a>
                               `)
                                } else {
                                    $(".editLink" + item.id).append(`
                               <a href="${window.origin}/admin/match/link/update/${item.id}" class="btn btn-dark my-3">Update Matchinfo</a>
                               `)
                                }

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
                            })
                            res.data.forEach(function (item) {
                                $("#todayMatchWonInfo").append(`
                              <div class="col-md-6">
                            <div class="card mx-2 mb-3">
                                <div class="card-body text-center">
                                    <h6>${item.on_date},
                                        <span class="matchTime">${tConvert(item.time)};</span> <br>
                                        (Match ${item.match_no})
                                    </h6>

                                    <div class="
                                          d-flex
                                          justify-content-between
                                          align-items-center
                                          my-4
                                        ">
                                        <div class="teamimage">
                                            <img class="ml-2" src="${item.first_team.image}" alt="" height="60" width="100">
                                        </div>
                                        <h6>VS</h6>
                                        <div class="teamimage">
                                            <img class="ml-2" src="${item.second_team.image}" alt="" height="60" width="100">
                                        </div>
                                    </div>
                                    <div class="team_name">
                                        <p style="width:45%;display:inline-block;text-align:left;">${item.first_team.team_name}</p>
                                        <p style="width:45%;display:inline-block;text-align:right;">${item.second_team.team_name}</p>
                                    </div>
<!--                                    <p>Match Start In :</p>-->
                                    <h6 id="demo${item.id}"></h6>

                                   <a href="${window.origin}/admin/match/woninfo/update/${item.id}" class="btn btn-dark my-3">Update Won info</a>

                                    </div>
                                    </div>
                                    </div>
                                    `)


                                var time = item.time;
                                var date = item.date;
                                var coundown = date + ' ' + time;
                                var countDownDate = new Date(coundown).getTime();
                                // alert(countDownDate);
                                var x = setInterval(function () {
                                    var now = new Date().getTime();
                                    var distance = countDownDate - now;
                                    var days = Math.floor((distance / (1000 * 60 * 60 * 24)));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                    document.getElementById("demo" + item.id).innerHTML = +hours + ' Hours ' + minutes + ' Minute ' + seconds + "s";
                                    if (distance < 0) {
                                        clearInterval(x);
                                        document.getElementById("demo" + item.id).innerHTML = "Expired";
                                    }
                                }, 1000)


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
                            })
                        } else {
                            $("#todayMatchShow").append(`
                            <div class="col-6 alert alert-danger">No Match Today..<div>
                            `)
                            $("#todayMatchWonInfo").append(`
                            <div class="col-6 alert alert-danger">No Match Today..<div>
                            `)
                        }
                    }
                },
                error: function (err) {
                    console.log(err)
                },
            });
        })
        let page = "{{request()->segment(2)}}"
        // alert(page)
        pageRestricted(page)
    </script>

@endpush
