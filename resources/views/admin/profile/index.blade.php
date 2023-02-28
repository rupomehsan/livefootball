
@extends('layouts.admin.index')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="heading-part d-flex align-items-center">
                <div class="underline mx-2"></div>
                <h1 class="pagetitle">Profile Setting</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-12 my-3" id="myData">


            </div>
        </div>
    </main>
@endsection

@push('custom-js')
    <script>
        /**
         * GET All Blogs
         * **/
        $(document).ready(function () {
            var getAdminData = JSON.parse(localStorage.getItem('adminData'))
            if(getAdminData){
                $.ajax({
                    type: 'GET',
                    url: window.origin+"/api/v1/admin/fetch-me/"+getAdminData.id,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status === 'success') {
                            $("#myData").append(`
                                     <div class="row justify-content-between profile-left">
                                        <div class="col-md-6 ">
                                            <div class="content">
                                                <p class="cs-heading">Name : ${res.data.name}</p>
                                                <p>Email : ${res.data.email}</p>
                                                <p>Phone : ${res.data.phone}</p>
                                            </div>

                                            <div class="button d-flex">
                                                <a href="${window.origin}/admin/manage-admin/profile" class="btn btn-primary"> Edit Profile</a>
                                                <a href="${window.origin}/admin/manage-admin/change-password" class="btn btn-primary mx-2">Change Password</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <img src="${res.data.image}" alt="" height="100" width="100">
                                        </div>
                                    </div>
                                    `)
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            }

        })





    </script>
@endpush


