@extends('layouts.admin.index')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-lg-6 col-12">
                <h1 class="pagetitle">Subscription</h1>
            </div>
            <div class="col-lg-6 col-12">
                <div class="d-flex flex-column align-items-end">
                    <form action="" id="search-form" name="search-form" novalidate>
                        <span class="iconify search_icon" id="search_icon" data-icon="codicon:search" data-width="20"
                              data-height="20"></span>
                        <input type="search" id="search_input" name="search" class="search_input"
                               placeholder="Search..">
                    </form>
                </div>
            </div>
        </div>

        <section class="section mt-5">
            <!-- ===== Manage Admin Nav Tab  ===== -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="subscriptionTabBtn" data-bs-toggle="tab" data-bs-target="#subscriptionTabContent"
                            type="button"
                            role="tab" aria-controls="home" aria-selected="true">Subscription
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="packageTabBtn" data-bs-toggle="tab"
                            data-bs-target="#packageTabContent"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Packages
                    </button>
                </li>
            </ul>
            <!-- ===== End Manage Admin Nav Tab  ===== -->

            <!-- ===== Manage Admin Tab Content ===== -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="subscriptionTabContent" role="tabpanel">
                    <table class="table table-borderless mt-5">
                        <thead>
                        <tr>
                            <th scope="col">Subscriber</th>
                            <th scope="col">Name</th>
                            <th scope="col">Subscription Started</th>
{{--                            <th scope="col">Subscription Ended</th>--}}
{{--                            <th scope="col">Action</th>--}}
                        </tr>
                        </thead>

                        <tbody id='subscription_list'>
                        <td>hello</td>
                        <td>hello</td>
                        <td>hello</td>
                        <td>hello</td>
{{--                        <td>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <a href=""--}}
{{--                                       class="btn btn-outline-secondary primary-btn-outline form-control">EDIT</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <button class="btn btn-outline-secondary primary-btn-outline form-control">DELETE--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </td>--}}
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="packageTabContent" role="tabpanel">
                <div class="row mt-5" id="package_list">
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-between my-3">
                                    <div class="col-lg-8 col-6 col-sm-6">
                                        <h6>Basic Pack</h6>

                                        <ul>
                                            <li>Premium Features</li>
                                            <li>AD FREE</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-5 col-sm-6">
                                        <div class="form-check form-switch">
                                            <label class="switch">
                                                <input type="checkbox" ${item.status === 'Active' ? 'checked' : ''} data-id=${item.id} id='enableStatus${item.id}' onchange="statusHandler('enableStatus${item.id}', '/api/v1/category/status.php');">
                                                <div class="slider round"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- ===== End Manage Admin Tab Content ===== -->

        </section>

    </main>
@endsection
@push('custom-js')
    <script>
        let page = "{{request()->segment(2)}}";
        // alert(page)
        pageRestricted(page);
    </script>
    <script>
        /**
         * GET All Subscriptions
         **/
        let url = "/api/v1/subscription/get-all";
        let headers = [
            {title: 'Subscriber', field: 'id'},
            {title: 'package Name', field: 'packageName'},
            {title: 'Purchase Date', field: 'purchaseTime'},
        ];
        getTableData(url, "subscription_list", headers);
        /**
         * GET All Subscriptions Packages
         **/
        $(document).ready(function (){
            $.ajax({
                url: "/api/v1/subscription/package/get-all",
                type: 'GET',
                dataType: "JSON",
                success: function (res){
                    $("#package_list").empty()
                    res.data.forEach(item =>{

                        $("#package_list").append(`
                    <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between my-3">
                                <div class="col-lg-8 col-6 col-sm-6">
dsfg
                                    <h6>${item.name}</h6>
                                    <ul>
                                        <li>${item.price}</li>
                                        <li>${item.subscriptionPeriod}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    `)
                    })
                },
                error: function (err){
                    console.log(err)
                }
            })
        })
    </script>
@endpush
