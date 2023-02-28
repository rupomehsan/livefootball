@extends('layouts.admin.index')
@section('content')
    <main id="main" class="main">
        <div class="row align-items-center">
            <div class="heading-part d-flex align-items-center">
                <div class="underline mx-2"></div>
                <h1 class="pagetitle">Notification</h1>

            </div>
            <div class="d-flex">
                <div class="manage-notification">
                    <a href="{{url('admin/notification/create')}}"><span class="iconify" data-icon="akar-icons:circle-plus-fill"></span> Send Notification</a>
                </div>
                <div class="manage-notification">
                    <a href="{{url('admin/notification/manage-notification')}}" class="darkChoclate"><span class="iconify" data-icon="eva:settings-2-fill"></span>
                      Notification  Settings</a>
                </div>
            </div>
{{--            <div class="col-lg-3 col-6 mb-2">--}}

{{--                <a class="btn primary-color-btn " href="{{url('admin/notification/create')}}"><i class="bi bi-plus-circle-fill me-3"></i>Add--}}
{{--                    Notification</a>--}}
{{--            </div>--}}

{{--            <div class="col-lg-6 col-8 text-lg-end ">--}}
{{--                <a class="btn btn-outline-secondary " href="{{url('admin/notification/manage-notification')}}">Manage Notification</a>--}}
            </div>
        </div>


        <section class="section mt-5">
            <table class="table table-borderless mt-5">
                <thead>
                <tr>
{{--                    <th scope="col">Serial</th>--}}
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Notification Time</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <tbody id='notification_list'></tbody>
            </table>
        </section>

    </main>
@endsection
@push('custom-js')
    <script>
        let url = "/api/v1/notification/get-all";
        let headers = [
            {title: 'Title', field: 'title'},
            {title: 'Description', field: 'description'},
            {title: 'Notification Time', field: 'created_at'},
            {title: 'Action', field: 'action'},
        ];
        let actions = [
            {label: 'Delete', url: "/api/v1/notification/delete/:id"},
        ]
        getTableData(url, "notification_list", headers, actions);

        let page = "{{request()->segment(2)}}";
        // alert(page)
        pageRestricted(page);
    </script>
@endpush
