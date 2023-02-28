<?php
$pagetId = request()->segment(5)
?>
@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main setting">
        <div class="heading-part d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="underline mx-2"></div>
                <h1 class="pagetitle">Update Match Information</h1>
            </div>
        </div>
        <div class="main_content">
            <form action="{{url('api/v1/tournament/match-link/update')}}/{{$pagetId}}" id="form" method="post"
                  enctype="multipart/form-data">
                <div>
                    <!-- select team -->
                    <div class="my-5">
                        <div class="row align-items-end">
                            <div class="col-lg-3">
                                <label for="" class="form-label"> First Team</label>
                                <select name="first_team" id="first_team" class="form-select">

                                </select>
                            </div>
                            <div class="col-lg-1">
                                <h6 class="text-center bg-danger rounded-circle w-50 p-2">
                                    vs
                                </h6>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label for="" class="form-label"> Second Team</label>
                                <select name="second_team" id="second_team" class="form-select">

                                </select>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-lg-3">
                                <label for="" class="form-label my-3">Match Link Type</label>
                                <select class="form-select" name="link_type" id="link_type">

                                    <!-- <option value="3">Pakistan</option> -->
                                </select>
                            </div>
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label for="" class="form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="Enter match link">
                            </div>
                        </div>
                    </div>
                    <!-- end select team -->
                </div>
                <!-- match vanue -->
                <div class="row justify-content-start mt-5">
                    <div class="col-lg-4" id="firstTeamDetails">

                    </div>

                    <div class="col-lg-4" id="secondTeamDetails">

                    </div>

                </div>

                <!-- end match vanue -->
                <!-- add btn -->
                <button id="submit-button" type="submit" class="btn btn-primary waves-effect my-3 mb-3">
                    Update
                </button>
                <!-- end add btn -->
            </form>
        </div>
    </main>

    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>
        function redirectPage() {
            window.location.href = window.origin + "/admin/dashboard";
        }


        var id = "{{request()->segment(5)}}";
        $.ajax({
            url: window.origin + '/api/v1/tournament/get-match-information/' + id,
            type: 'GET',
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    console.log("res",res)
                    $("#link_type").append(`
                                    <option ${(res.data.link_type==="youtube")?"selected":""} value="youtube">Youtube</option>
                                    <option ${(res.data.link_type==="mp4")?"selected":""} value="mp4">MP4</option>
                                    <option ${(res.data.link_type==="m3u8")?"selected":""} value="m3u8">M3U8</option>
                    `)
                    $("#link").val(res.data.link)
                    // first team squad
                    // first team squad
                    // first team squad
                    $("#first_team").append(`
                     <option value="${res.data.first_team.id}" >${res.data.first_team.team_name}</option>
                   `)
                    $("#firstTeamDetails").append(`
                    <div class="d-flex align-items-center text-dark mb-4">
                            <div class="dash bg-dark"></div>
                            <h6 class="mb-0">${res.data.first_team.team_name}</h6>
                        </div>
                        <label for="">Couch name</label>
                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="Link Here" name="first_team_couch"
                                   value="${res.data.first_team_couch}">
                        </div>
                        <label for="" class="mt-2">Select Captain</label>
                        <select name="first_team_captain" id="first_team_captain" class="form-control mt-2">
                        </select>
                        <label for="" class="mt-2">Select Wicketkeeper</label>
                        <select name="first_team_goal_keeper" id="first_team_goal_keeper" class="form-control mt-3">
                        </select>
                         <div id="firstTeamPlayersList">
                        </div>
                    `)

                    res.data.first_team.players.forEach(function (playersData) {
                        $("#first_team_captain").append(`
                          <option ${(res.data.first_team_captain===playersData.name)?"selected":""} value="${playersData.name}">${playersData.name}<option>
                    `)
                    })

                    res.data.first_team.players.forEach(function (playersData) {
                        $("#first_team_goal_keeper").append(`
                          <option ${(res.data.first_team_keeper===playersData.name)?"selected":""} value="${playersData.name}">${playersData.name}<option>
                    `)
                    })

                    res.data.first_team.players.forEach(function (playersData) {
                        $("#firstTeamPlayersList").append(`
                            <div class="
                      d-flex
                      justify-content-start
                      align-items-center
                      my-3
                    ">
                           <input  ${Firstchecked(playersData.name)}  type="checkbox" class="mt-0" name="first_squad[]" value='{"name":"${playersData.name}","role":"${playersData.role}"}'>
                            <h6 class="mx-4">${playersData.name}</h6>
                            <p>${(playersData.role)!==null?playersData.role:"No role selected"}</p>
                        </div>
                    `)
                    })

                    function Firstchecked(name){
                        var status = '';
                        // res.data.first_team.players.forEach(function(firstPlayerInfo){
                            res.data.first_team_squad.forEach(function(squad){
                                if(name===squad.name){
                                    // console.log(squad.name)
                                   status="checked";
                                }
                            })
                        // })
                        return status;
                    }
                    // second team squad
                    // second team squad
                    // second team squad

                    $("#second_team").append(`
                     <option value="${res.data.second_team.id}" >${res.data.second_team.team_name}</option>
                   `)
                    $("#secondTeamDetails").append(`
                    <div class="d-flex align-items-center text-dark mb-4">
                            <div class="dash bg-dark"></div>
                            <h6 class="mb-0">${res.data.second_team.team_name}</h6>
                        </div>
                        <label for="">Couch name</label>
                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="Link Here" name="second_team_couch"
                                   value="${res.data.second_team_couch}">
                        </div>
                        <label for="" class="mt-2">Select Captain</label>
                        <select name="second_team_captain" id="second_team_captain" class="form-control mt-2">

                        </select>

                        <label for="" class="mt-2">Select Wicketkeeper</label>
                        <select name="second_team_goal_keeper" id="second_team_goal_keeper" class="form-control mt-3">

                        </select>

                         <div id="secondTeamPlayersList">

                            </div>
                    `)
                    res.data.second_team.players.forEach(function (playersData) {
                        $("#second_team_captain").append(`
                          <option ${(res.data.second_team_captain===playersData.name)?"selected":""} value="${playersData.name}">${playersData.name}<option>
                    `)
                    })
                    res.data.second_team.players.forEach(function (playersData) {
                        $("#second_team_goal_keeper").append(`
                          <option ${(res.data.second_team_keeper===playersData.name)?"selected":""} value="${playersData.name}">${playersData.name}<option>
                    `)
                    })
                    res.data.second_team.players.forEach(function (playersData) {
                        $("#secondTeamPlayersList").append(`
                            <div class="
                              d-flex
                              justify-content-start
                              align-items-center
                              my-3
                            ">
                            <input ${secondTeam(playersData.name)} type="checkbox" class="mt-0" name="second_squad[]" value='{"name":"${playersData.name}","role":"${playersData.role}"}'>
                            <h6 class="mx-4">${playersData.name}</h6>
                             <p>${(playersData.role)!==null?playersData.role:"No role selected"}</p>
                        </div>
                    `)
                    })

                    function secondTeam(name){
                        var status = '';
                            res.data.second_team_squad.forEach(function(squad){
                                if(name===squad.name){
                                    status="checked";
                                }
                            })
                        return status;
                    }

                }
            },
            error: function (xhr, resp, text) {
                console.log(xhr);
                // on error, tell the failed
            },
        });
        let page = "{{request()->segment(2)}}";
        // alert(page)
        $('#form').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("post", "submit-button", form);
        })
        pageRestricted(page);
    </script>
@endpush


