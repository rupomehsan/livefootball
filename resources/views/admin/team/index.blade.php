@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main setting">
        <div class="heading-part d-flex align-items-center">
            <div class="underline mx-2"></div>
            <h1 class="pagetitle">Add Team</h1>
        </div>
        <div>
            <div class="manage-notification">
                <a href="{{url('admin/team/create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em"
                         preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                         data-icon="akar-icons:circle-plus-fill">
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3Z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Add New Team</a>
            </div>
        </div>

        <!-- ===== Create Settings Section ===== -->
        <div class="main_content">
            <div class="row" id="teamShow">



            </div>
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
       var getTeams = "/api/v1/team/get-all"
        getAllTeams(getTeams,"teamShow")
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


