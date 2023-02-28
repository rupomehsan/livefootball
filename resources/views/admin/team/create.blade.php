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

        <!-- ===== Create Settings Section ===== -->
        <div class="main_content">
            <!-- add team -->
            <form action="{{url('api/v1/team/create')}}" id="form" enctype="multipart/form-data">
            <div class="my-5">

                <div class="d-flex text-end mb-3">

                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="">Team Name <span class="required">*</span> </label>
                            <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Enter Team Name">
                        </div>
                        <div class="text-danger mb-4 team_name_error" id=""></div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label" for="">Couch Name <span class="required">*</span> </label>
                            <input type="text" class="form-control" id="couch_name" name="couch_name" placeholder="Enter Couch Name">
                        </div>
                        <div class="text-danger mb-4 couch_name_error" id=""></div>
                    </div>
                    <div class="col-lg-6" id="teamImage">
                         <div class="form-group">
                                <label for="image" class="mb-2">Image * </label> <br>
                                <div class="file-upload">
                                    <div class="image-upload-wrap">
                                        <input type="hidden" name="image" id="imageUrl">
                                        <input id="image" class="file-upload-input file-uploader" type='file' onchange="readURL(this);"
                                               accept="image/*" />
                                        <div class="drag-text text-center">
                                            <span>Upload Image Or Drag Here</span>
                                        </div>
                                    </div>
                                    <div id="tounamentImage" style="position: relative">

                                    </div>
                                    <div class="file-upload-content" >
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">
                                                <span class="iconify" data-icon="entypo:circle-with-cross" data-width="30"></span>
                                            </button>
                                        </div>
                                    </div>

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
             <?php
                for ($i=0;$i<15;$i++){?>
                <div class="row align-items-end">
                    <div class="col-lg-3 mt-2">
                        <input type="text" class="form-control" name="players[name][<?=$i?>]" placeholder="player <?= $i+1?> name" value="player <?= $i+1?>">
                    </div>
                    <div class="col-lg-2 mt-2">
                        <select class="form-select" name="players[role][<?= $i?>]">
                            <option selected="" value="">Select Player Role</option>
                            <option value="Defender" selected>Defender</option>
                            <option value="Midfielder">Midfielder</option>
                            <option value="Forward">Forward</option>
                            <option value="Goalkeeper">Goalkeeper</option>
                        </select>
                    </div>
                </div>
               <?php }?>
            </div>
            <!-- end add player -->

            <!-- description -->
            <div class="row my-3">
                <div class="col-lg-5">
                    <!-- Description -->
                    <div class="my-3">
                        <textarea name="description" id="description" placeholder="Team Description"></textarea>
                        <div class="text-danger mb-4 description_error" id=""></div>
                    </div>
                </div>
            </div>
            <!-- end description -->

            <!-- add btn -->
            <button id="submit-button" type="submit" class="btn btn-primary primary-btn  waves-effect mb-3">
                Create
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


         $(document).on("change", ".file-uploader", function(e) {
            e.preventDefault();
            var file = e.target.files[0];
            let formData = new FormData()
            formData.append('file', file);
            formData.append('folder', 'setting');
            var showurl = window.origin + '/api/v1/tournament/file-upload';
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
                    'Authorization' : localStorage.getItem('token'),
                },
                data: formData,
                success: function(res) {
                    console.log(res);
                    toastr.success('File Upload successfully');
                    $("#imageUrl").val(res.data);
                      $('#preloader').addClass('d-none')
                },
                error: function(jqXhr, ajaxOptions, thrownError) {
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


