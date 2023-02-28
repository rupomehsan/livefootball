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
                <h1 class="pagetitle">Schedule</h1>
            </div>
            <div>
                <div class="manage-notification">
                    <a href="{{url('admin/tournament/schedule')}}/{{$pagetId}}">
                        All Schedule</a>
                </div>
            </div>
        </div>
        <div class="main_content">
            <form action="{{url('api/v1/tournament/schedule/create')}}/{{$pagetId}}" id="form" method="post" enctype="multipart/form-data">
            <div>
                <!-- add match -->
                <div class="row align-items-center ">
                    <div class="col-lg-4">
                        <h6>
                                <div class="form-group">
                                    <label for="">Adding Match No :</label>
                                    <input type="number" class="form-control" name="match_no"
                                           style="width: 70px;display:inline-block">
                                </div>
                            <div class="text-danger mb-4 match_no_error" id=""></div>
                        </h6>
                    </div>
                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center">
                                    <span class="mx-2">Group:</span>
                                    <select name="group_id" id="group_id" class="form-select input-sm">

                                    </select>

                                </div>
                                <div class="text-danger mb-4 group_id_error" id=""></div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end add match -->

                <!-- select team -->
                <div class="my-5">
                    <div class="row align-items-end">
                        <div class="col-lg-3">
                            <label for="" class="form-label">Select First Team</label>
                            <select name="first_team" id="first_team" class="form-select">
                                <option selected="" disabled="">Select First Team</option>
                            </select>
                            <div class="text-danger mb-4 first_team_error" id=""></div>
                        </div>
                        <div class="col-lg-1">
                            <h6 class="text-center bg-danger rounded-circle w-50 p-2">
                                vs
                            </h6>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <label for="" class="form-label">Select Second Team</label>
                            <select name="second_team" id="second_team" class="form-select">
                                <option selected="" disabled="">Select Second Team</option>

                            </select>
                            <div class="text-danger mb-4 second_team_error" id=""></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="image my-3" id="image">
                            <label for="image">Select Image</label> <br>
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input type="hidden" name="image" id="imageUrl">
                                    <input id="image" class="file-upload-input file-uploader" type='file'
                                           onchange="readURL(this);"
                                           accept="image/*"/>
                                    <div class="drag-text text-center">
                                       
                                        <span>Upload Image Or Drag Here</span>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image"/>
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">
                                            <span class="iconify" data-icon="akar-icons:cross"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
</div>
                        </div>
                    </div>
                </div>
                <!-- end select team -->
            </div>

            <!-- match vanue -->
            <div>
                <div class="d-flex align-items-center mb-4">
                    <div class="dash"></div>
                    <h6 class="mb-0 text-danger">Match Vanue</h6>
                </div>


                <div class="row">
                    <div class="col-lg-3">
                        <label for="" class="form-label">Stadium</label>
                        <input type="text" class="form-control" name="stadium" placeholder="Enter Stadium">
                        <div class="text-danger mb-4 stadium_error" id=""></div>
                    </div>

                    <div class="col-lg-3">
                        <label for="" class="form-label">Select Date</label>
                        <input type="date" name="date" class="form-control">
                        <div class="text-danger mb-4 date_error" id=""></div>
                    </div>

                    <div class="col-lg-3">
                        <label for="" class="form-label">Select time</label>
                        <input type="time" name="time" class="form-control">
                        <div class="text-danger mb-4 time_error" id=""></div>
                    </div>

                </div>
            </div>
            <!-- end match vanue -->
            <!-- add btn -->
            <button id="submit-button" type="submit" class="btn btn-primary waves-effect my-3 mb-3">
                Create
            </button>
            <!-- end add btn -->
            </form>
        </div>
    </main>

    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>
        var id = "{{request()->segment(5)}}";
        $.ajax({
            url: window.origin + '/api/v1/tournament/get-all-group-by-tournament-id/' + id,
            type: 'GET',
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    $("#group_id").append(`
                       <option  value="" disabled selected>Select Group</option>
                     `)
                    res.data.forEach(function (item) {
                        $("#group_id").append(`
                       <option  value="${item.id}">${item.group_name}</option>
                     `)
                    })
                }
            },
            error: function (xhr, resp, text) {
                console.log(xhr);
                // on error, tell the failed
            },
        });


        $("#group_id").change(function () {
            $.ajax({
                url: window.origin + '/api/v1/tournament/get-all-team-by-group-and-tournament-id/' + $(this).val(),
                type: 'GET',
                dataType: "json",
                success: function (res) {
                    if (res.status === "success") {
                        $("#first_team").empty()
                        $("#first_team").append(`
                       <option  value="" disabled selected>Select Team</option>
                     `)
                        $("#second_team").empty()
                        $("#second_team").append(`
                       <option  value="" disabled selected>Select Team</option>
                     `)


                        res.data.forEach(function (item) {
                            $("#first_team").append(`
                       <option  value="${item.team_id}">${item.team.team_name}</option>
                     `)
                            $("#second_team").append(`
                       <option  value="${item.team_id}">${item.team.team_name}</option>
                     `)
                        })


                    }
                },
                error: function (xhr, resp, text) {
                    console.log(xhr);
                    // on error, tell the failed
                },
            });
        });

        function redirectPage() {
            window.location.href = window.origin + "/admin/tournament/schedule/"+"{{$pagetId}}";
        }

        var url = "/api/v1/setting/show";
        getEditData(url);
        $('#form').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("post", "submit-button", form);
        })

        $(document).on("change", ".file-uploader", function (e) {
            e.preventDefault();
            var file = e.target.files[0];
            let formData = new FormData()
            formData.append('file', file);
            formData.append('folder', 'setting');
            var showurl = window.origin + '/api/v1/setting/file-upload';
            // alert(showurl);
            var options = {
                closeButton: true,
                debug: false,
                positionClass: "toast-bottom-right",
                onclick: null
            };
             $('#preloader').removeClass('d-none')
            $.ajax({
                url: showurl,
                type: 'POST',
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': localStorage.getItem('token'),
                },
                data: formData,
                success: function (res) {
                    console.log(res);
                    toastr.success('File Upload successfully');
                    $("#imageUrl").val(res.data);
                     $('#preloader').addClass('d-none')
                },
                error: function (jqXhr, ajaxOptions, thrownError) {
                    console.log(jqXhr)
                    toastr.error('Error', 'Something went wrong', options);
                }
            });
        });

        let page = "{{request()->segment(2)}}";
        // alert(page)
        pageRestricted(page);
    </script>
@endpush


