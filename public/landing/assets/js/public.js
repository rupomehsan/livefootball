// get All TeamsAnd Todays Match
// getAllTeamsAnd Todays Match
function getAllTeamsAndTodaysMatch(url) {
    let baseUrl = window.origin + url
// alert(baseUrl)
    $.ajax({
        type: 'GET',
        url: baseUrl,
        dataType: 'json',
        success: function (res) {
// console.log(res)
            if (res.status === 'success') {
// $(".customer-logos").empty()
                if (res.data.length !== 0) {
                    res.data.forEach((item) => {
                        $(".customer-logos").append(`
                        <a href="${window.origin}/team/${item.id}">
                           <div class="slide">
                              <img class="${liveMatch(item.id)}" src="${item.image}">
                              <div class="liveTeam ${live(item.id)}">
                                 <div class="text-effect">
                                    <span>L</span>
                                    <span>I</span>
                                    <span>V</span>
                                    <span>E</span>
                                 </div>
                              </div>
                           </div>
                        </a>
                        `)
                    })
                } else {
                    $("#allTeams").append(`
                        <div class="container alert alert-danger">Team not create yet....</div>
                        `)
                }
                if (res.todayMatch.length !== 0) {
                    res.todayMatch.forEach(function (item) {
                        $("#top_banner").append(`
                                        <div class="item livePosition" style="background-image:url('${item.image}');" >
                                        <div class="blood_overlay"></div>
                                           <img
                                              src="${item.image}"
                                              class="banner_img"
                                              alt="img-1"
                                              />
                                           <div class="homepage_banner_overlay">
                                              <a href="${window.origin}/live-details/${item.id}">
                                              <button class="homepage_banner_btn">
                                              <i class="fas fa-play"></i>
                                              </button>
                                              </a>
                                           </div>
                                           <div class="homepage_banner_content d-flex align-items-center">
                                              <h4>${item.first_team.team_name} vs ${item.second_team.team_name}</h4>
                                              <div class="live">
                                                 <span class="live_icon">live</span>
                                                 <div class="video__icon">
                                                    <div class="circle--outer"></div>
                                                    <div class="circle--inner"></div>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                        `)
                    })
                } else {
                    $("#top_banner").append(`
                    <div class="alert alert-danger container mt-5">
                    No Match Today......
                    <div>
                    `)
                }
                if (res.todayMatch.length !== 0) {
                    res.todayMatch.forEach(function (item) {
                        $("#todayAllMatches").append(`
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2" >
                                   <a href="live-details/${item.id}">
                                      <div class="card p-2" style="position:relative">
                                         <div class="live">
                                            <span class="live_icon">live</span>
                                            <div class="video__icon">
                                               <div class="circle--outer"></div>
                                               <div class="circle--inner"></div>
                                            </div>
                                         </div>
                                         <div class="card_img_box">
                                            <img class="card_img" src="${item.image}" alt="">
                                         </div>
                                         <div class="card-body" >
                                            <div class="">
                                               <div class="group-tema-name match-no">Match ${item.match_no}</div>
                                               <div class="date-time">Match Start at ${tConvert(item.time)}</div>
                                            </div>
                                            <div class="tourmnament-name">
                                               <p>${item.group.group_name} , ${item.tournament.name}</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                               <div class="text-center">
                                                  <img src="${item.first_team.image}" class="teamLogo" alt="" >
                                                  <h6 class="my-2">${item.first_team.team_name}</h6>
                                               </div>
                                               <div>
                                                  <h2 class="today_match_vs">VS</h2>
                                               </div>
                                               <div class="text-center">
                                                  <img src="${item.second_team.image}" class="teamLogo" alt="">
                                                  <h6 class="my-2">${item.second_team.team_name}</h6>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </a>
                                </div>
                                `)
                    })
                } else {
                    $("#todayAllMatches").append(`
                    <div class="alert alert-danger container mt-5">
                    No Match Today......
                    <div>
                    `)
                }

                function live(id) {
                    var display = ''
                    res.todayMatch.forEach(function (item) {
                        if (item.first_team_id == id || item.second_team_id == id) {
                            display = "d-block"
                        } else {
                            display = "d-none"
                        }
                    })
                    return display
                }

                function liveMatch(id) {
                    var border = ''
                    res.todayMatch.forEach(function (item) {
                        if (item.first_team_id == id || item.second_team_id == id) {
                            border = "border"
                        }
                    })
                    return border
                }

                $('.customer-logos').slick({
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    autoplay: true,
                    autoplaySpeed: 2500,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4
                        }
                    }, {
                        breakpoint: 520,
                        settings: {
                            slidesToShow: 3
                        }
                    }]
                });

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

                $('#top_banner').owlCarousel({
                    loop: true,
//   margin: 10,
//   nav: true,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        600: {
                            items: 1,
                        },
                        1000: {
                            items: 1,
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

// get AllUpcomingMatch
// getAllUpcomingMatch
function getAllUpcomingMatch() {
    $.ajax({
        type: 'GET',
        url: window.origin + "/api/v1/tournament/get-all-upcoming-match",
        dataType: 'json',
        success: function (res) {
            console.log("upcomingmatch", res)
            if (res.status === 'success') {
                
                var CustomType = localStorage.getItem("custom_type")
                var countData = 0;
                var image = '';
                var link = '';
                if (CustomType === "on") {
                    var csUpcoming = localStorage.getItem("custom_upcoming_matches")
                    var data = JSON.parse(csUpcoming)
                    countData = data.show_per_video_category
                    image = data.image
                    link = data.ad_link
                } else {
                    var upcomingMatches = localStorage.getItem("upcoming_matches")
                    var data = JSON.parse(upcomingMatches)
                    countData = data.show_per_video_category
                    image = data.image
                    link = data.ad_link
                }
                var i = 0
                if (res.data.length !== 0) {
                   
                    res.data.forEach((item) => {
                        if ((i % countData) === 0) {            
                            $("#homepage_upcoming_carousel").append(`
                            <div class="item my-3">
                               <a href="${link ?? ''}">
                               <img src="${window.origin}/uploads/ad/${image}" class="upcomming-match-image" alt="image" height="311px">
                               </a>
                            </div>
                            `)
                        }
                        $("#homepage_upcoming_carousel").append(`
<div class="item my-3">
   <a href="${window.origin}/upcoming-match/${item.id}">
      <div class="card">
         <div class="upcoming_card_img_box">
            <img src="${item.image}" class="card-img-top" alt="...">
         </div>
         <div class="group-tema-name match-no px-3">Match ${item.match_no}</div>
         <div class="date-time px-3"> ${item.on_date}, ${tConvert(item.time)}</div>
         <div class="card-body">
            <div class="tourmnament-name">
               <p> ${item.group.group_name} , ${item.tournament.name}</p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
               <div class="text-center">
                  <img src="${item.first_team.image}"
                     class="teamLogo" alt=""/>
                  <h6 class="my-2">${item.first_team.team_name}</h6>
               </div>
               <div>
                  <h6 class="today_match_vs">VS</h6>
               </div>
               <div class="text-center">
                  <img src="${item.second_team.image}"
                     class="teamLogo" alt=""/>
                  <h6 class="my-2">${item.second_team.team_name}</h6>
               </div>
            </div>
         </div>
      </div>
   </a>
</div>
`)

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

                        i++
                    })
                } else {
                    $("#homepage_upcoming_carousel").empty()
                    $("#homepage_upcoming_carousel").after(`
<div class="alert alert-danger">
No upcoming matches.....
`)
                }
            }
            $('#homepage_upcoming_carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        },
        error: function (err) {
            console.log(err);
        }
    })
}

// get getAllTournaments
// getAllTournaments
function getAllTournaments(url, id) {
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        success: function (res) {
            // console.log("tr", res)
            if (res.status === 'success') {
                // console.log("asdfasdfasdf", res)
                if (res.data.length !== 0) {
                    res.data.forEach((item) => {
                        $('#' + id).append(`
                               <div class="col-lg-4 mt-2">
                                            <a href="${window.origin}/fixture/details/${item.id}">
                                                <div class="series_name_box">
                                                    <img src="${item.image}" class="img-fluid" alt="">
                                                    <h6 class="text-center mx-3 mb-0">${item.name}</h6>
                                                </div>
                                            </a>
                                        </div>
                    `)
                    })
                }
            } else {
                // alert("hi")
                $("#" + id).append(`
                    <div class="alert alert-danger col-6">Tournament Not Create Yet...<div>
                    `)
            }

        },
        error: function (err) {
            console.log(err);
        }
    })
}


function getAllTournamentsPoint(url, id) {
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        success: function (res) {
            // console.log("tr", res)
            if (res.status === 'success') {
                // console.log("asdfasdfasdf", res)
                if (res.data.length !== 0) {
                    if (id === "pointTableTournament") {
                        res.data.forEach(function (item) {
                            $("#" + id).append(`
                                                     <li><a class="dropdown-item" onclick="getPointTableByTournamentId('${item.id}')"  href="${window.origin}/point-table-details/${item.id}">${item.name}</a></li>
                                                    `)
                        })
                    }
                    res.data.forEach(function (item) {
                        $("#pointTableBottom").append(`
                                                     <div class="col-lg-4 mt-2">
                                                        <a href="${window.origin}/point-table-details/${item.id}">
                                                            <div class="series_name_box">
                                                                <img src="${item.image}" class="img-fluid" alt="">
                                                                <h6 class="text-center mx-3 mb-0">${item.name}</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    `)
                    })

                }
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}


function getAllTeamPointByTournamentId(url, id) {
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        success: function (res) {
            // console.log("tr", res)
            if (res.status === 'success') {
                console.log("asdfasdfasdf", res)
                if (res.setPointTable[0]) {
                    $("#tournamentName").text(res.setPointTable[0].tournament.name)
                }
                if (res.summery) {
                    $("#TournamentSummery").append(`

                              <div class="d-flex justify-content-start align-items-center">
                        <div class="tournament-image">
                            <img src="${res.setPointTable[0].tournament.image ?? ''}" height="100" width="200" alt="tournament">
                        </div>
                        <div class=" mx-3">
                            <p class="tournament-name">
                                ${res.setPointTable[0].tournament.name ?? ""}
                            </p>
                        </div>
                        <div class=" mx-3">
                            Total Match : <br><p class="tournament-total-match"> ${res.summery.totalMatch}</p>
                        </div>
                        <div class="tournament-total-played mx-3">
                           Total Played : <br>
                                 <p class="tournament-total-played">${res.summery.totalPlayed}</p>
                        </div>
                        <div class="tournament-remaining-match mx-3">
                            <p>Remaining Matches : <br>
                                ${res.summery.remainingMatches}</p>
                        </div>
                    </div>

                    `)
                }
                if (id === "pointTableTournament") {
                    res.data.forEach(function (item) {
                        $("#" + id).append(`
                                                     <li><a class="dropdown-item" onclick="getPointTableByTournamentId('${item.id}')"  href="${window.origin}/point-table-details/${item.id}">${item.name}</a></li>
                                                    `)
                    })
                }
                res.setPointTable.forEach(function (item) {
                    $("#pointTable").append(`
                                      <table>
                                       <thead>
                                            <tr class="mtb">
                                                <th scope="col" class="text-danger">
                                                    <div class="d-flex align-items-center">
                                                        <div class="dash"></div>
                                                        <h6 class="text-danger mb-0">${item.group_name}</h6>
                                                    </div>
                                                </th>
                                                <th scope="col">Match</th>
                                                <th scope="col">Won</th>
                                                <th scope="col">Lost</th>
                                                <th scope="col">Draw</th>
                                                <th scope="col">Point</th>
                                                <th scope="col">Goal</th>

                                            </tr>
                                            </thead>
                                            <tbody id="groupTeam${item.id}">

                                            </tbody>
                                            </table>
                                   `)
                    item.group_team.forEach(function (item2) {
                        $.ajax({
                            url: window.origin + "/api/v1/get-point-table-data-by-tournament-team-id",
                            method: "get",
                            dataType: "json",
                            data: {
                                "teamId": item2.team_id,
                                "tournamentId": item2.tournament_id,
                            },
                            success: function (res) {
                                if (res.data !== null) {
                                    $("#groupTeam" + item.id).append(`
                                             <tr id="teamPoint${item2.team_id}">
                                                        <th scope="row">${item2.team.team_name}</th>
                                                        <td id="match${item2.team_id}">${res.data.match_play}</td>
                                                        <td id="win${item2.team_id}">${res.data.win}</td>
                                                        <td id="loss${item2.team_id}">${res.data.loss}</td>
                                                        <td id="tied${item2.team_id}">${res.data.tied}</td>
                                                        <td id="point${item2.team_id}">${res.data.point}</td>
                                                        <td id="net_run${item2.team_id}">${res.data.goal}</td>

                                                    </tr>
                                            `)
                                } else {
                                    $("#groupTeam" + item.id).append(`
                                                      <tr id="teamPoint${item2.team_id}">
                                                        <th scope="row">${item2.team.team_name}</th>
                                                      <td>00</td>
                                                      <td>00</td>
                                                      <td>00</td>
                                                      <td>00</td>
                                                      <td>00</td>
                                                      <td>00</td>

                                                       </tr>
                                                    `)
                                }
                            },
                            error: function (err) {
                                console.log(err)
                            }
                        })
                    })
                })
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}
