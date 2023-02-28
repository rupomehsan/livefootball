@extends('layouts.admin.index')
@section('content')
    <!-- ======= Main Content Section ======= -->
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card p-5 border-0">

                        <div class="card-body ">
                            <div class="row">
                                <div class="heading-part d-flex align-items-center">
                                    <div class="underline mx-2"></div>
                                    <h1 class="pagetitle">Change Profile</h1>
                                </div>


                            </div>

                            <form action="{{url('api/v1/manage-admin/profile/update')}}" id="form" name="form" novalidate>

                                <!-- Name -->
                                <div class="customInput mt-5">

                                    <input type="hidden" id="id" name="id" class="form-control">
                                    <input placeholder=" " id="name" name="name" class="form-control" type="text">
                                    <label for="name">Name</label>
                                </div>
                                <div class="text-danger" id="name_error"></div>
{{--                                <!-- Email -->--}}
{{--                                <div class="customInput mt-3">--}}
{{--                                    <input placeholder=" " id="email" name="email" class="form-control" type="email">--}}
{{--                                    <label for="email">Email</label>--}}
{{--                                </div>--}}
{{--                                <div class="text-danger" id="email_error">error msg</div>--}}
                                <!-- Phone -->
                                <div class="customInput mt-3">
                                    <input placeholder=" " id="phone" name="phone" class="form-control" type="tel">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="text-danger" id="phone_error"></div>
                                 <div class="col-lg-12">
                                            <label for="image" class="my-3">Logo * </label>
                                            <div class="file-upload-edit">
                                                <div class="image-upload-wrap-edit">
                                                    <input type="hidden" name="image" id="imageUrl">
                                                    <input value="" name="image" class="file-upload-input-edit file-uploader" type='file' onchange="readURLEdit(this);" accept="image/*" />
                                                    <div class="drag-text-edit text-center">
                                                        {{--                                            <span class="iconify" data-icon="bx:bx-image-alt"></span> <br>--}}
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
                                <button id="submit-button" type="submit" class="btn btn-primary waves-effect my-3">
                                    Update
                                </button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </main>
    <!-- ======= End Main Content Section ======= -->


@endsection

@push('custom-js')
    <script>
        function redirectPage() {
            window.location.href = window.origin + "/admin/profile"
        }
        $(document).ready(function (){
            let userData = JSON.parse(localStorage.getItem('adminData')) || null
            console.log(userData)
            $.ajax({
                type: 'GET',
                url: window.origin+"/api/v1/admin/fetch-me/"+userData.id,
                dataType: 'json',
                success: function (res) {
                    if (res.status === 'success') {
                        $('#name').val(res.data.name)
                        $('#id').val(res.data.id)
                        $('#phone').val(res.data.phone)
                        $('.file-upload-image-edit').attr('src',res.data.image)
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            })
        })


        $('#form').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("patch", "submit-button", form);
        })
        $(document).on("change", ".file-uploader", function(e) {
            e.preventDefault();
            var file = e.target.files[0];
            let formData = new FormData()
            formData.append('file', file);
            formData.append('folder', 'admin');
            var showurl = window.origin + '/api/v1/admin/file-upload';
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
                     $('#preloader').addClass('d-none')
                }
            });
        });
    </script>
@endpush
