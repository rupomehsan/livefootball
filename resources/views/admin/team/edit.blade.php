

@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main setting">
        <div class="heading-part d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="underline mx-2"></div>
                <h1 class="pagetitle">Add Team</h1>
            </div>

            <div class="manage-notification">
                <a href="{{url('admin/team')}}">
                    All Team</a>

            </div>
        </div>
<?php
    $pageId = request()->segment(4);
?>
        <!-- ===== Create Settings Section ===== -->
        <div class="main_content">
            <!-- add team -->
            <form action="{{url('api/v1/team/update')}}/{{$pageId}}" id="form" enctype="multipart/form-data">
                <div class="my-5">

                    <div class="d-flex text-end mb-3">

                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label" for="">Team Name <span class="required">*</span> </label>
                                <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Enter Team Name">
                            </div>
                            <div class="text-danger mb-4" id="team_name_error"></div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label" for="">Couch Name <span class="required">*</span> </label>
                                <input type="text" class="form-control" id="couch_name" name="couch_name" placeholder="Enter Couch Name">
                            </div>
                            <div class="text-danger mb-4" id="couch_name_error"></div>
                        </div>
                        <div class="col-lg-6">
                            <label for="image" class="mb-2">Logo * </label>
                            <div class="file-upload-edit">
                                <div class="image-upload-wrap-edit">
                                    <input type="hidden" name="image" id="imageUrl">
                                    <input value="" name="image" class="file-upload-input-edit file-uploader" type='file' onchange="readURLEdit(this);" accept="image/*" />
                                    <div class="drag-text-edit text-center">
                                        {{--<span class="iconify" data-icon="bx:bx-image-alt"></span> <br>--}}
                                        <span>Upload Image Or Drag Here</span>
                                    </div>
                                </div>
                                <div class="file-upload-content-edit">
                                    <img class="file-upload-image-edit" src="" alt="" />
                                    <div class="image-title-wrap-edit">
                                        <button type="button" onclick="removeUploadEdit()" class="remove-image-edit">
                                            <span class="iconify" data-icon="akar-icons:cross"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end add team -->
                <!-- add player -->
                <div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="dash"></div>
                        <h6 class="text-danger mb-0">Add Players</h6>
                    </div>
                  <div id="players"></div>


                </div>
                <!-- end add player -->

                <!-- description -->
                <div class="row my-3">
                    <div class="col-lg-5">
                        <!-- Description -->
                        <div class="my-3">
                            <textarea name="description" id="description" placeholder="Team Description"></textarea>
                        </div>
                    </div>
                </div>
                <!-- end description -->

                <!-- add btn -->
                <button id="submit-button" type="submit" class="btn btn-primary primary-btn  waves-effect mb-3">
                    Update
                </button>

            </form>

            <!-- end add btn -->
        </div>
        <!-- ===== End Create Settings Section ===== -->
    </main>
    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>
        $(document).ready(function () {
            var id = "{{request()->segment(4)}}";
            // alert(id)
            var url = "/api/v1/team/edit/" + id;
            getEditData(url)
        })
        function redirectPage() {
            window.location.href = window.origin + "/admin/team"
        }

        /* editor */
        let descriptionEditor;
        ClassicEditor.create(document.querySelector('#description'))
            .then(editor => {
                window.editor = editor;
                descriptionEditor = editor;
            });

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


