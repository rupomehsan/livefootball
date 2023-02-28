<?php
$pageId = request()->segment(4)
?>
@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main setting">
        <div class="heading-part d-flex align-items-center">
            <div class="underline mx-2"></div>
            <h1 class="pagetitle"></h1>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{url('admin/tournament/group')}}/{{$pageId}}" class="series_details_title  mb-2">Teams &amp;
                    Groups</a>
                <a href="{{url('admin/tournament/schedule')}}/{{$pageId}}" class="mx-4 border-bottom border-danger">Schedule</a>
            </div>
            <div class="d-flex">
                <div class="manage-notification">
                    <a href="{{url('admin/tournament/schedule/create')}}/{{$pageId}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em"
                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                             data-icon="akar-icons:circle-plus-fill">
                            <path fill="currentColor" fill-rule="evenodd"
                                  d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3Z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Add Schedule</a>
                </div>
            </div>
        </div>
        <!-- ===== Create Settings Section ===== -->
        <section class="section mt-5">
            <div class="my-2">
                <div id="scheduleTournament">
                </div>
            </div>

        </section>
        <!-- ===== End Create Settings Section ===== -->
    </main>

    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>
        function redirectPage() {
            window.location.href = window.origin + "/admin/setting"
        }

        getGroupByTournament({{$pageId}})

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
                                    $(".pagetitle").text(item2.tournament.name)
                                    $("#matchSchedule" + item[0]).append(`

                                     <div class="col-lg-4 col-md-4 col-sm-10 col-10 teamdotted my-3">

                                                    <div id="schedule_card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <p class="">${item2.on_date},${item2.time} (Match
                                                                    ${item2.match_no} )</p>
                                                                <p class="text-secondary mb-2">
                                                                    Group ${item2.group.group_name},
                                                                    ${item2.tournament.name}
                                                                </p>
                                                                <h5>${item2.first_team.team_name} VS ${item2.second_team.team_name}</h5>
                                                                <span class="text-secondary">Match yet to began</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="dots-menu btn-group">
                                                    <a data-toggle="dropdown" class=""><span class="iconify" data-icon="charm:menu-kebab" data-width="30"></a>
                                                    <!-- <span class="glyphicon glyphicon-option-vertical"> </span>-->
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{url('admin/tournament/schedule/edit')}}/${item2.tournament_id}/${item2.id}"><span class="iconify" data-icon="bx:edit"></span> Edit</a></li>
                                                        <li class="delete-row">
                                                            <a href="javascript:void(0)" onclick="deleteSingleItem('/api/v1/tournament/schedule/delete/${item2.id}')"><span class="iconify" data-icon="ant-design:delete-filled"></span> Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                `)
                                })
                            })
                        }else{
                            $("#scheduleTournament").append(`
                            <div class="row alert alert-danger col-md-6">Schedule Not Create Yet.....<div>
                            `)
                        }
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            })
        }

        let page = "{{request()->segment(2)}}";
        // alert(page)
        pageRestricted(page);
    </script>
@endpush


