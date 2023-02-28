@extends('layouts.admin.index')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="card p-5 border-0">
                        <div class="card-body ">
                            <div class="heading-part d-flex align-items-center">
                                <div class="underline mx-2"></div>
                                <h1 class="pagetitle">Add Notification</h1>
                            </div>
                            <form action="{{url('api/v1/notification/send-notification')}}" id="form" name="form" novalidate>
                                <!-- Notification Title -->
                                <div class="customInput mt-5">
                                    <input placeholder=" " id="title" name="title" class="form-control" type="text" onchange="clearError(this)">
                                    <label for="title">Title</label>
                                </div>
                                <div class="text-danger title_error" id=""> </div>
                                <!-- Notification Description -->
                                <div class="my-3">
                                    <textarea name="description" id="description" placeholder="Description" onchange="clearError(this)"></textarea>
                                </div>
                                <div class="text-danger description_error" id=""> </div>
                                <!-- Notification Image -->
                                <div class="image my-3" id="image">
                                    <label for="image">Select Image</label> <br>
                                    <div class="file-upload">
                                        <div class="image-upload-wrap">
                                            <input type="hidden" name="image" id="imageUrl">
                                            <input id="image" class="file-upload-input file-uploader" type='file' onchange="readURL(this);"
                                                   accept="image/*" />
                                            <div class="drag-text text-center">

                                                <span>Upload Image Or Drag Here</span>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">
                                                    <span class="iconify" data-icon="akar-icons:cross"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Select Blog For Notification -->
                                <select class="form-select py-3 mt-3" id="match_id" name="match_id">
                                    <option value="0">Select Match From Database</option>
                                </select>
                                <div class="text-danger match_id_error" id=""></div>
                                <!-- Notification External Link -->
                                <div class="customInput mt-4">
                                    <input placeholder=" " id="link" name="link" class="form-control" type="text" onchange="clearError(this)">
                                    <label for="link">External Link</label>
                                </div>
                                <div class="text-danger mb-4 link_error" id=""> </div>
                                <button id="submit-button" type="submit" class="btn btn-primary waves-effect mb-3">
                                    Send
                                </button>



                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
@push('custom-js')
    <script>
        function redirectPage() {
            window.location.href =  window.origin + "/admin/notification"
        }
        let descriptionEditor;
        ClassicEditor.create(document.querySelector('#description'))
            .then(editor => {
                window.editor = editor;
                descriptionEditor = editor;
            });

        /***
         * Form Submit
         * */
        $('#form').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("post", "submit-button", form);
        })
        /**
         * GET All Blogs
         * */
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: window.origin+"/api/v1/tournament/get-all-upcoming-match",
                success: function (response) {
                    if (response.status === 'success'){
                        response.data.forEach( item => {
                            $("#match_id").append(`
                    <option value="${item.id}">${item.first_team.team_name} VS ${item.second_team.team_name} ( ${item.on_date} )</option>
                 `)
                        })
                    }
                },
                error: function (xhr, resp, text) {
                    console.log(xhr, resp)
                }
            });
        })
        /**
         * Blog Select and Disable External Link
         * */
        $(document).on('change', '#match_id', function (e) {
            let value = $(this).val();
            if (value !== '0') {
                $('#link').prop('disabled', true);
            } else {
                $('#link').prop('disabled', false);
            }
        });

        /**
         * Press External Link and Disable Blog
         * */
        $("#link").keyup(function(){
            let value = $(this).val();

            if (value !== '') {
                $("#match_id").prop('disabled', true);
            } else {
                $('#match_id').prop('disabled', false);
            }

        });
        /**
         * Image upload
         * */
        $(document).on("change", ".file-uploader", function(e) {
            e.preventDefault();
            var file = e.target.files[0];
            let formData = new FormData()
            formData.append('file', file);
            formData.append('folder', 'notification');
            var showurl = window.origin + '/api/v1/notification/file-upload';
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
    </script>


@endpush
