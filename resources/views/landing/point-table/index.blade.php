@extends('layouts.landing.index')
@section('content')


    <!-- =======  Home Adds Content Section ======= -->
    <!-- =======  Home Adds Content Section ======= -->
    <div id="homepage_add" class="mt-100">
        <div class="container text-center">
            <a href="" class="addLink" target="_blank">
                <img  src="admin/uploads/e6188a321a1.png" class="homepage_add_img addImage"
                      alt="advertisement image">
            </a>
        </div>
    </div>
    <!-- ======= End  Home Adds Content Section ======= -->
    <!-- ======= End  Home Adds Content Section ======= -->
    <div id="point_tbl_select_series">
        <!-- point table -->
        <!-- point table -->
        <section class="container my-5">
            <div class="point-table bg-secondary">
                <nav class="navbar navbar-expand-lg navbar-dark  point-table-bg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Select Tournament</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <b>  </b> Tournament Ongoing
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink" id="pointTableTournament">

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
        <!-- point table -->
        <!-- point table -->

        <div class="text-center">
            <h2 class="redClr">Point Table</h2>

        </div>

        <!-- fixtures -->
        <div id="fixtures" class="my-5">
            <div class="container left">
                <div class="row">
                    <div class="col-md-10">
                        <div class="my-3">
                            <h4 class="text-danger">Tournament Name</h4>
                        </div>
                        <div class="row" id="pointTableBottom">
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="adds_img">
                            <a href="" id="siteBannerAddsLink">
                                <img id="siteBannerAddsImage" src="admin/uploads/968a0e49ca2.jpg" class="" alt="Banner Adds">
                            </a>
                        </div>

                    </div>
                    <!-- grp a -->
                </div>
            </div>
        </div>
        <!-- end fixtures -->
    </div>

        @endsection

        @push('custom-js')
            <script>
                $(function(){
                    // getAllTournaments Match
                    // getAllTournaments
                    var getAll = "/api/v1/tournament/get-all"
                    getAllTournamentsPoint(getAll,"pointTableTournament",null)

                })
            </script>
    @endpush
