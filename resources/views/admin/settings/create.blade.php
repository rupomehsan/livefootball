@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main settings">
        <div class="heading-part d-flex align-items-center">
            <div class="underline mx-2"></div>
            <h1 class="pagetitle">Site Settings</h1>

        </div>


        <!-- ===== Create Settings Section ===== -->
        <section class="section mt-5">
            <!-- create form -->
            <form action="{{url('api/v1/setting/store')}}" id="form" name="form" novalidate>
                <!-- basic settings -->
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <!-- System Name -->
                        <div class="customInput ">
                            <input type="text" placeholder=" " id="system_name" name="system_name"
                                   class="form-control"/>
                            <label for="system_name">Site Name  *</label>
                        </div>
                        <div class="text-danger mb-4" id="system_name_error"></div>

                        <div class="customInput ">
                            <input type="text" placeholder=" " id="facebook" name="facebook"
                                   class="form-control form-control-lg  bg-white"/>
                            <label class="form-label" for="facebook">Facebook  </label>
                        </div>
                        <div class="text-danger mb-4" id="facebook_error"></div>

                        <!-- Instagram  -->
                        <div class="customInput ">
                            <input type="text" placeholder=" " id="instagram" name="instagram"
                                   class="form-control form-control-lg  bg-white"/>
                            <label class="form-label" for="instagram">Instagram </label>
                        </div>
                        <div class="text-danger mb-4" id="instagram_error"></div>
                        <!-- email  -->
                        <div class="customInput ">
                            <input type="text" placeholder=" " id="mail_address" name="mail_address"
                                   class="form-control form-control-lg  bg-white"/>
                            <label class="form-label" for="mail_address">Mail address </label>
                        </div>
                        <div class="text-danger mb-4" id="mail_address_error"> </div>

                        <div class="col-lg-12 col-12">
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
                                <div class="file-upload-content-edit d-none">
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

                    <div class="col-lg-6 col-12">

                        <!-- Facebook  -->

                            <div class="customInput ">
                                <input type="text" placeholder=" " id="copyright" name="copyright"
                                       class="form-control form-control-lg  bg-white"/>
                                <label class="form-label" for="copyright">Copyright  *</label>
                            </div>
                            <div class="text-danger mb-4" id="copyright_error"></div>
                        <!-- Twitter  -->
                        <div class="customInput ">
                            <input type="text" placeholder=" " id="youtube" name="youtube"
                                   class="form-control form-control-lg  bg-white"/>
                            <label class="form-label" for="youtube">Youtube  </label>
                        </div>
                        <div class="text-danger mb-4" id="youtube_error"></div>
                        <!-- Twitter  -->
                        <div class="customInput ">
                            <input type="text" placeholder=" " id="twitter" name="twitter"
                                   class="form-control form-control-lg  bg-white"/>
                            <label class="form-label" for="twitter">Twitter  </label>
                        </div>
                        <div class="text-danger mb-4" id="twitter_error"></div>

                        <!-- Developed By -->
                        <div class="customInput ">
                            <input type="text" placeholder=" " id="developed_by" name="developed_by"
                                   class="form-control form-control-lg  bg-white"/>
                            <label class="form-label" for="developed_by">Developed By *</label>
                        </div>
                        <div class="text-danger mb-4" id="developed_by_error"> </div>


                    </div>
                </div>

                <div class="row mt-5">
                </div>
                <!-- Description -->
                <div class="my-3">
                      <label for="image" class="my-3">About Us</label>
                    <textarea name="description" id="description" placeholder="About Us"></textarea>
                </div>
                <!-- Privacy Policy -->
                <div class="my-3">
                       <label for="image" class="my-3">Privacy & Policy</label>
                    <textarea name="privacy_policy" id="privacy_policy" placeholder="Privacy & Policy" class="mb-3"></textarea>
                </div>

                <!-- Terms & Policy -->
                <div class="my-3">
                       <label for="image" class="my-3">Terms & Conditions</label>
                    <textarea name="terms_policy" id="terms_policy" placeholder="Terms & Conditions"></textarea>
                </div>
                <button id="submit-button" type="submit" class="btn btn-primary primary-btn  waves-effect mb-3">
                    Save
                </button>

               
            </form>

        </section>
        <!-- ===== End Create Settings Section ===== -->
    </main>
    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>
        function redirectPage() {
            window.location.href =  window.origin + "/admin/setting"
            
        }
        /* editor */
        let descriptionEditor;
        ClassicEditor.create(document.querySelector('#description'))
            .then(editor => {
                window.editor = editor;
                descriptionEditor = editor;
            });

        let privacyEditor;
        ClassicEditor.create(document.querySelector('#privacy_policy'))
            .then(editor => {
                window.editor = editor;
                privacyEditor = editor;
            });

        let termsEditor;
        ClassicEditor.create(document.querySelector('#terms_policy'))
            .then(editor => {
                window.editor = editor;
                termsEditor = editor;
            });

        var url = "/api/v1/setting/show";
        getEditData(url);
        
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
                    'Authorization' : localStorage.getItem('token'),
                },
                data: formData,
                success: function(res) {
                    console.log(res);
                    toastr.success('File Upload successfully');
                          $('#preloader').addClass('d-none')
                    $("#imageUrl").val(res.data);
                    
                    $(".file-upload-content-edit").removeClass("d-none")
                    
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

