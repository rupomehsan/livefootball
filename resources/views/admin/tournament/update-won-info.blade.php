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
            <form action="{{url('api/v1/tournament/match-woninfo/update')}}/{{$pagetId}}" id="form" method="post"
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
                                <label for="" class="form-label my-3">Won Team</label>
                                <select class="form-select" name="won_team" id="won_team">

                                    <!-- <option value="3">Pakistan</option> -->
                                </select>
                            </div>
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label for="" class="form-label">Won By </label>
                                <input type="text" class="form-control" id="won_by" name="won_by" placeholder="won_by">
                            </div>
                        </div>
                    </div>
                    <!-- end select team -->
                </div>
                <!-- match vanue -->

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
                    if(res.data!==null){
                    $("#first_team").append(`
                     <option value="${res.data.first_team.id}" >${res.data.first_team.team_name}</option>
                   `)
                    $("#second_team").append(`
                     <option value="${res.data.second_team.id}" >${res.data.second_team.team_name}</option>
                   `)
                    $("#won_team").append(`
                     <option value="${res.data.first_team.id}" >${res.data.first_team.team_name}</option>
                     <option value="${res.data.second_team.id}" >${res.data.second_team.team_name}</option>
                   `)
                    }else{
                        $(".main_content").empty()
                        $(".main_content").append(`
                        <div class="alert alert-danger">Please Add Match Information First....</div>
                        `)
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


