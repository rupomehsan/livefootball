@extends('layouts.landing.index')
@section('content')
<div id="liveDetails">


</div>
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
<div id="team_squad" class="mt-5">


</div>
@endsection

@push('custom-js')
    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
    <script>
                var pageId = "{{request()->segment(2)}}";
                var getSchedule = "/api/v1/tournament/get-match-schedule-by-id/"+pageId
                getScheduleById(getSchedule)
                function getScheduleById(url) {
                    let baseUrl = window.origin + url
                    // alert(baseUrl)
                    $.ajax({
                        type: 'GET',
                        url: baseUrl,
                        dataType: 'json',
                        success: function (res) {
                            if(res.data!==null){
                            if (res.status === 'success') {
                                var url = res.data.link.replace('watch?v=','embed/')
                                var youtube = `  <div id='player'><iframe src="${url}" title="YouTube video player" style="width: 100%; height: 600px" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>`
                                var m3u8    = ` <div id='player'> <video-js id="my_video_1" class="vjs-default-skin" controls preload="auto" style="width: 100%; min-height: 600px; height: 100%"></video-js></div>`
                                // alert(url)
                              $("#liveDetails").append(`
                               ${(res.data.link_type==="youtube")? youtube : m3u8}
                              `)

                                $("#team_squad").append(`
                                   <div class="container">
                                        <div>
                                            <h4>${res.data.first_team.team_name} Vs ${res.data.second_team.team_name}</h4>
                                            <span>${res.data.schedule.on_date},${tConvert(res.data.schedule.time)}(Match ${res.data.schedule.match_no})</span>
                                        </div>

                                        <div class="d-flex align-items-center my-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" width="40" height="40" preserveAspectRatio="xMidYMid meet" viewBox="0 0 128 128" data-icon="noto:stadium" data-width="40"><path fill="#546F7B" d="M43.53 5.3c0-1.08.6-1.48 1.75-1.48s37.61-.14 38.22-.14c.6 0 1.28.6 1.21 1.41c-.07.81.07 12.23 0 12.83c-.07.6-.4 1.28-1.28 1.34c-.87.07-37.68.2-38.42.2s-1.34-.87-1.41-1.68s-.07-11.81-.07-12.48z"></path><path fill="#546F7B" d="M48.7 18.66h4.77v5.24H48.7zm26.47.21h4.54v5.08h-4.54z"></path><path fill="#C9C8C7" d="M47.49 6.71h33.65v9.07H47.49z"></path><path fill="#2385F8" d="M92.83 27.13s.13-16.93.13-17.6s.54-1.28 1.48-1.01s2.55 1.14 5.37 2.02s5.97 1.95 6.26 2.33c.46.61-1.96 2.24-5.46 4.12c-3.18 1.71-4.77 2.75-4.77 2.75l-.2 8.46l-2.42.87l-.39-1.94z"></path><path fill="#4BC5FC" d="M109.76 35.79V19.2c0-.87 1.01-1.34 1.75-1.14c.74.2 2.15 1.07 4.63 2.08c2.17.88 6.1 1.91 6.05 2.62c-.08 1.01-3.26 2.31-5.11 3.5c-1.88 1.21-4.7 2.55-4.7 2.55v10.48l-2.62-3.5z"></path><path fill="#2385F8" d="M36.08 26.24V8.29c0-.88-1.18-.92-2.1-.76c-.99.18-2.48 1.34-4.82 1.86s-5.67.84-6.17 1.7c-.3.52 1.52 2.81 4.09 4.09s6.49 3.22 6.49 3.22v8.71l2.51-.87z"></path><path fill="#4BC5FC" d="M19.25 33.14s-.06-14.79-.06-15.08c0-.29-.7-.76-1.75-.35c-1.05.41-10.78 3.52-10.93 4.21c-.27 1.28 5.13 3.19 6.42 3.77s3.75 1.72 3.75 1.72v8.3l2.57-2.57z"></path><path fill="#EE3E23" d="M5.19 53.86c-.74-6.65 7.2-33.04 58.32-32.5c54.15.58 58.96 29.02 58.67 32.34c-.2 2.31-.62 24.12-.62 24.12S63.94 95.87 63.94 95.29c0-.58-51.98-17.04-51.98-17.04S5.75 58.89 5.19 53.86z"></path><path fill="#AE111F" d="M62.62 21.36s.62-.02 1.49 0s1.53.04 1.53.04l.07 37.57l-3.1-.07c-.01.01.12-37.43.01-37.54zm38.32 7L82.43 61.25l2.55.96l18.49-32.62zm21.37 25.79l-22.86 16.8l.69 2.48l21.97-15.91c-.01.01.33-4.26.2-3.37zM25.94 27.87l16.62 34.41l1.73-2.34l-15.88-33.13zM5.51 49.98l23.84 20.56l-1.38 2L5.16 53.26s-.01-.96.07-1.69c.09-.74.28-1.59.28-1.59z"></path><path fill="#B7D016" d="M25.37 78.34s-.29-2.96.39-5.61c1.16-4.55 9.48-17.61 38.8-17.13c29.12.48 37.64 12.58 37.73 18.87c.1 6.29-3.39 6.19-3.39 6.19l-36.86 9.38l-18.8-6l-17.87-5.7z"></path><path fill="#FFF" d="M85.88 67.98c0-.83-.67-1.49-1.5-1.49H43.26c-.83 0-1.5.67-1.5 1.5l-.03 16.06l3 .01l.03-14.56h17.82V86h2V69.5h18.31l.09 14.38l3-.02l-.1-15.88z"></path><path fill="#B0B0B0" d="M5.38 50.47s-.96 2.08-.9 6.58c.03 1.83 0 32.73 0 32.73l8.97 13.69l15.69 11.02l24.65 7.47H73.2l17.55-2.61l19.79-12.51l12.32-14.94s-.03-35.99-.07-36.54c-.32-4.39-1.19-5.56-1.19-5.56s4.43 14.72-19 26.61c-8.89 4.51-22.92 8.12-39.07 7.94c-23.84-.26-38.15-7.66-44.93-13.15C4.11 59.46 5.38 50.47 5.38 50.47z"></path><path fill="#858585" d="M4.54 93.71s5.22 12.28 21.61 21.53c8.92 5.03 21.27 9.45 37.58 9.86c14.73.37 29.17-3.91 37.93-9.24c16.19-9.86 21.5-22.63 21.5-22.63l-.05-6.23s-12.76 32.64-58.91 33.03c-15.46.13-28.43-4.09-37.88-9.97c-14.95-9.31-21.86-21.97-21.86-21.97l.08 5.62z"></path><path fill="#858585" d="M4.65 64.35S15.1 90.6 63.68 90.92c46.18.3 59.23-24.49 59.23-24.49l-.08-5.38s-11.67 27.36-59.04 26.97C14.08 87.62 4.5 58.59 4.5 58.59l.15 5.76z"></path><path fill="#2F2F2F" d="M29.21 116.93c-.32-.5.24-24.17.24-25.22c0-1.49 1.23-4.21 4.99-2.98c3.52 1.15 4.3 4.52 4.3 6.46s.18 23.5.18 24.03s.15 1.75-.79 1.5c-.42-.12-3.1-.87-4.85-1.64c-1.13-.52-3.75-1.66-4.07-2.15zm-18.69-14.21c-.13-.52-.09-19.59-.09-20.83c0-2.46 2.14-4.34 4.67-2.85c2.53 1.49 3.82 4.21 3.89 7.84c.06 3.63.09 22.25.15 22.77c.06.52-.25.88-.84.45c-.17-.12-3.44-2.53-4.8-3.89c-1.36-1.35-2.98-3.49-2.98-3.49zm78.37 18.77c-.64-.46-.39-23.3-.39-24.86s.46-6.5 5.06-7.32c5.06-.91 4.54 4.41 4.6 6.16c.06 1.56.31 21.69.15 22.2c-.08.26-2.37 1.31-4.63 2.26c-1.88.78-4.65 1.65-4.79 1.56zm19.63-10.43c-.45-.08-.07-21.86.02-24.12c.1-2.33 1.15-6.48 4.45-7.69c3.18-1.17 4.16.72 4.16 3.77c0 1.88-.21 19.53-.27 19.98c-.04.28-1.39 1.73-3.21 3.6c-1.92 1.98-4.93 4.5-5.15 4.46z"></path><path fill="#FF7879" d="M13.54 47.21c-.07.71 3.44 3.76 3.87 3.72s3-2.79 3-3.36s-3.52-3.68-3.75-3.64c-.54.1-3.08 2.8-3.12 3.28zm15.95 5.24c.03.54 2.28 4.71 3.12 4.68c1.05-.04 3.84-2.22 3.78-2.73s-2.43-4.38-3.15-4.47c-.71-.08-3.78 1.93-3.75 2.52zM18.6 35.98c.02.38 2.51 4.02 2.96 3.98c.45-.04 3.23-1.99 3.29-2.51c.06-.59-2.27-3.93-2.84-4.06c-.57-.13-3.45 1.86-3.41 2.59zm18.94 2.63c-.03.29 1.99 5.15 2.6 5.11c.85-.06 3.76-1.08 3.84-1.6c.08-.53-1.89-5.37-2.25-5.41s-4.15 1.5-4.19 1.9zm7.34-7.66c-.13.54.96 3.42 1.22 3.93c.32.65.89 1.1 1.99.81c.83-.22 2.68-.89 2.76-1.58c.08-.69-1.5-4.46-1.99-4.71s-3.82.9-3.98 1.55zm9.25 3.41c.37.23 4.37-.11 4.5-.41c.32-.73-.12-5.19-.57-5.52c-.45-.32-4.31-.01-4.5.37c-.57 1.13-.08 5.15.57 5.56zM49.1 46.69c-.49.46 1.09 5.01 1.71 5.31c.72.35 4.06-.88 4.26-1.3c.24-.54-1.39-4.98-1.85-5.12c-.9-.26-3.52.56-4.12 1.11zm21.01-14.54c-.91.7-.91 5.54-.46 6.33c.37.65 4.11.74 4.66.23c.31-.29.79-5.68.46-6.19c-.32-.51-4.06-.84-4.66-.37zm9.32-4.9c-.55.55-1.2 5.86-.83 6.28c.56.63 4.02 1.02 4.57.69c.55-.32 1.62-5.59 1.34-6.37c-.27-.78-4.45-1.22-5.08-.6zm.88 20.05c-.69.23-2.51 5.72-2.4 6.19c.28 1.2 3.97 2.17 4.71 1.75c.43-.24 2.31-5.63 2.22-6.1c-.1-.45-3.8-2.08-4.53-1.84zm25.35-9.2c-1.06.17-3.74 4.53-3.74 5.22c0 .69 2.86 2.63 3.42 2.54c.55-.09 3.79-5.08 3.79-5.45c0-.37-2.59-2.45-3.47-2.31zm.1 16.35c-.83 0-4.85 4.06-4.85 4.66c0 .6 2.31 2.82 3.09 2.91s4.89-4.11 4.94-4.85c.05-.73-2.35-2.72-3.18-2.72z"></path><path fill="#2F2F2F" d="M51.45 124.05c-.41-.41.05-16.67.12-19.35c.08-3.25 2.36-11.78 12.42-11.94c10.07-.16 12.99 9.1 12.99 12.1s.17 18.89-.2 19.38c-.16.22-5.24 1.1-13.04 1.02c-7.4-.08-11.88-.81-12.29-1.21z"></path></svg>
                                            <span class="mx-3">${res.data.schedule.group.group_name},
                                                        ${res.data.schedule.tournament.name}        </span>
                                        </div>


                                        <div class="row my-5">
                                            <div class="col-lg-5 col-md-7">
                                                <ul class="nav nav-tabs justify-content-between" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">
                                                            ${res.data.first_team.team_name}                       </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                                                           ${res.data.second_team.team_name}                   </button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                        <div class="m-3">
                                                            <h6 style="color: #c82333">${res.data.first_team_couch}</h6>
                                                            <span class="text-secondary">Couch Name</span>
                                                        </div>
                                                        <div class="m-3">
                                                            <h6>${res.data.first_team_captain}</h6>
                                                            <span class="text-secondary">Captain</span>
                                                        </div>
                                                        <div class="m-3">
                                                            <h6>${res.data.first_team_keeper}</h6>
                                                            <span class="text-secondary">Wicket Keeper</span>
                                                        </div>
                                                       <div id="firstAllPlayers"></div>

                                                    </div>
                                                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                        <div class="m-3">
                                                            <h6 style="color: #c82333">${res.data.second_team_couch}</h6>
                                                            <span class="text-secondary">Couch Name</span>
                                                        </div>
                                                        <div class="m-3">
                                                            <h6>${res.data.second_team_captain}</h6>
                                                            <span class="text-secondary">Captain</span>
                                                        </div>
                                                        <div class="m-3">
                                                            <h6>${res.data.second_team_keeper}</h6>
                                                            <span class="text-secondary">Wicket Keeper</span>
                                                        </div>
                                                       <div id="secondAllPlayers"></div>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-5">
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

                                var advertisementData = localStorage.getItem("web_adds")
                                if(advertisementData){
                                    var data = JSON.parse(advertisementData)
                                    if(data.cs_add_type==="on"){
                                        $("#addImage").attr("src",data.cs_header.image)
                                        $("#siteBannerAddsImage").attr("src",data.cs_invideo.image)
                                        $("#addLink").attr("href",data.cs_invideo.link)
                                        $("#siteBannerAddsLink").attr("href",data.cs_invideo.link)
                                    }else{
                                        $("#addImage").attr("src",data.header.image)
                                        $("#siteBannerAddsImage").attr("src",data.in_video.image)
                                        $("#addLink").attr("href",data.header.link)
                                        $("#siteBannerAddsLink").attr("href",data.in_video.link)
                                    }
                                }

                                res.data.first_team_squad.forEach(function(player){
                                    $("#firstAllPlayers").append(` <div class="m-3"><h6>${player.name}</h6><span class="text-secondary">${(player.role)==="null"?"N/A":player.role}</span> </div>`)
                                })
                                res.data.second_team_squad.forEach(function(player){
                                    $("#secondAllPlayers").append(` <div class="m-3"><h6>${player.name}</h6><span class="text-secondary">${(player.role)==="null"?"N/A":player.role}</span> </div>`)
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


                                var player = videojs('my_video_1', {
                                    // controls: true,
                                    autoplay: true,
                                    preload: 'auto',
                                    controlBar: {
                                        playToggle: true,
                                        captionsButton: true,
                                        chaptersButton: true,
                                        subtitlesButton: true,
                                        remainingTimeDisplay: true,
                                        progressControl: {
                                            seekBar: true
                                        },
                                        fullscreenToggle: true,
                                        playbackRateMenuButton: false,
                                    },
                                });
                                player.src({
                                    src: res.data.link,
                                    // type: 'application/x-mpegURL',
                                    handleManifestRedirects: true
                                });


                            }
                            }else{
                                $("#liveDetails").append(`

                                  <div class="container d-flex justify-content-center" style="margin-top: 10%"><h3>Match not update yet....</h3></div>

                                `)
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }

            </script>
@endpush
