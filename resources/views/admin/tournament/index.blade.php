
@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main setting">
        <div class="heading-part d-flex align-items-center">
            <div class="underline mx-2"></div>
            <h1 class="pagetitle">Tournament</h1>
        </div>
        <div>
            <div class="manage-notification">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#ModalLoginForm" onclick="resetForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em"
                         preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                         data-icon="akar-icons:circle-plus-fill">
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3Z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Add New Tournament</a>
            </div>
        </div>
        <!-- Modal HTML Markup -->
        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add a Tournament</h5>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" id="form" action="{{url('api/v1/tournament/create')}}">
                            <input type="hidden" name="id" id="tournamentId" value="">
                            <div class="form-group">
                                <label class="control-label">Tournament Name</label>
                                <div>
                                    <input type="text" class="form-control input-lg" id="name" name="name" value="">
                                </div>
                                <div class="text-danger mb-4 name_error" id=""></div>
                            </div>
                        
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
                                    <div id="tounamentImage">

                                    </div>
                                    <div class="file-upload-content" >
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">
                                                <span class="iconify" data-icon="akar-icons:cross"></span>
                                            </button>
                                        </div>
                                    </div>

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
            <div class="row" id="tournamnetShow">


            </div>

        </section>
        <!-- ===== End Create Settings Section ===== -->
    </main>
    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>
        function redirectPage() {
            window.location.href =  window.origin + "/admin/tournament"
        }

        var getAll = "/api/v1/tournament/get-all"
        getAllTournaments(getAll,"tournamnetShow",trmId=null)

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


