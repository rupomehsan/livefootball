<?php
$pageId = request()->segment(4)
?>
@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main setting">
        <div class="heading-part d-flex align-items-center">
            <div class="underline mx-2"></div>
            <h1 class="pagetitle">Touranment</h1>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{url('admin/tournament/group')}}/{{$pageId}}" class="series_details_title border-bottom border-danger mb-2">Teams &amp; Groups</a>
                <a href="{{url('admin/tournament/schedule')}}/{{$pageId}}" class="mx-4 ">Schedule</a>
            </div>
            <div class="d-flex">
                <div class="manage-notification">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#ModalLoginForm">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em"
                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                             data-icon="akar-icons:circle-plus-fill">
                            <path fill="currentColor" fill-rule="evenodd"
                                  d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3Z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Add Group</a>
                </div>
            </div>

        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Group</h5>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="form" method="POST" action="{{url('api/v1/tournament/group/create')}}">
                            <input type="hidden" name="tournament_id" value="{{$pageId}}">
                            <div class="form-group">
                                <label class="control-label">Group Name</label>
                                <div>
                                    <input type="text" class="form-control input-lg" id="group_name" name="group_name" value="">
                                </div>
                                <div class="text-danger mb-4 group_name_error" id=""></div>
                            </div>
                            <div class="form-group">
                                <button id="submit-button" type="submit" class="btn btn-primary primary-btn  waves-effect mb-3">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- ===== Create Settings Section ===== -->
        <section class="section mt-5">
            <!-- create form -->
            <div class="row" id="groupAndTeams">

            </div>
        </section>
        <!-- ===== End Create Settings Section ===== -->
    </main>

    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>
        var pageId = "{{request()->segment(4)}}"
        function redirectPage() {
            window.location.href =  window.origin + "/admin/tournament/group/"+pageId
        }

        var getAllGrpTeam = "/api/v1/tournament/get-all-team-by-tournament/"+pageId
        getAllTeamByTournamentAndGroupId(getAllGrpTeam,"groupAndTeams")
        $('#form').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("post", "submit-button", form);
        })

    </script>
@endpush


