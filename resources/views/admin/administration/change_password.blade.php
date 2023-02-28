@extends('layouts.admin.index')
@section('content')
    < <!-- ======= Main Content Section ======= -->
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card p-3 border-0">

                        <div class="card-body ">
                            <div class="heading-part d-flex align-items-center">
                                <div class="underline mx-2"></div>
                                <h1 class="pagetitle">Change Password</h1>
                            </div>

                            <form action="{{url('api/v1/manage-admin/profile/change-password')}}" id="form" name="form" novalidate>
                                <!-- Current Password -->
                                <div class=" mt-5">
{{--                                    <input type="hidden" id="id" name="id">--}}
{{--                                    <input placeholder="Current Password" id="current_password" name="current_password" class="form-control" type="password">--}}
{{--                                    <span class="iconify password" data-icon="bi:eye-slash-fill"></span>--}}
{{--                                    <label for="current_password"></label>--}}
                                </div>
                                <div class="customInput mt-5">
                                    <input type="hidden" id="id" name="id">
                                    <span class="iconify password" data-icon="bi:eye-slash-fill" onclick="eyes('current_password')" ></span>
                                    <input placeholder=" " id="current_password" name="current_password" class="form-control" type="password">
                                    <label for="title">Current Password</label>
                                </div>
                                <div class="text-danger" id="current_password_error"></div>
                                <!-- New Password -->
                                <div class="customInput mt-3">
                                    <span class="iconify password" data-icon="bi:eye-slash-fill" onclick="eyes('new_password')"></span>
                                    <input placeholder=" " id="new_password" name="new_password" class="form-control" type="password">
                                    <label for="new_password">New Password</label>
                                </div>
                                <div class="text-danger" id="new_password_error"></div>
                                <!-- Confirm Password -->
                                <div class="customInput mt-3">
                                    <span class="iconify password" data-icon="bi:eye-slash-fill" onclick="eyes('password_confirmation')"></span>
                                    <input placeholder=" " id="password_confirmation" name="password_confirmation" class="form-control" type="password">

                                    <label for="password_confirmation">Confirm Password</label>
                                </div>
                                <div class="text-danger" id="password_confirmation_error"></div>

                                <button id="submit-button" type="submit" class="btn btn-primary waves-effect mt-3">
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
    @endsection()
@push('custom-js')
    <script>
        function redirectPage() {
            window.location.href =  window.origin + "/admin/profile"
        }
        function eyes(id){
            if($("#"+id).attr("type")==="password"){
                $("#"+id).attr("type","text")
            }else{
                $("#"+id).attr("type","password")
            }
        }

        $(document).ready(function(){
            let userData = JSON.parse(localStorage.getItem('adminData')) || null
            if(userData){
                $('#id').val(userData.id)
            }
        })


        $('#form').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            formSubmit("patch", "submit-button", form);
        })
    </script>
@endpush
