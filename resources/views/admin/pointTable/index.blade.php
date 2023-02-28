
@extends('layouts.admin.index')
@section('content')
    <!-- ===== Main Section ===== -->
    <main id="main" class="main setting">
        <div class="heading-part d-flex align-items-center">
            <div class="underline mx-2"></div>
            <h1 class="pagetitle">Point Table   <span class="tournamentName mx-3"></span></h1>

        </div>


        <!-- ===== Create Settings Section ===== -->
        <section class="section mt-5">
            <div class="point-table">
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
        <section>
            <div class="row">
                <div class="col-md-9">
                    <div class="my-5 point_tbl">
                        <table class="table" id="pointTable">
{{--                               <div class="alert alert-danger">Tournament Not Create Yet...</div>--}}
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- ===== End Create Settings Section ===== -->
    </main>
    <!-- ===== Emd Main Section ===== -->
@endsection
@push('custom-js')
    <script>

        $(function(){
            var getAll = "/api/v1/tournament/get-all"
            getAllTournaments(getAll,"pointTableTournament",null)
        })


        function updateHandler(id,tournamentId) {
            var dmeoUser = JSON.parse(localStorage.getItem('adminData'))
            if (dmeoUser.email !== "admin@livefootball.com") {
            var teamId = id;
            var matchPlayed = $(`#matchPlayed${id}`).val();
            var win = $(`#won${id}`).val();
            var loss = $(`#loss${id}`).val();
            var tied = $(`#tied${id}`).val();
            var goal = $(`#goal${id}`).val();
            var point = $(`#point${id}`).val();

            $('#preloader').removeClass('d-none');
            $.ajax({
                type: "POST",
                data: {
                    "matchPlayed": matchPlayed,
                    "win": win,
                    "loss": loss,
                    "goal": goal,
                    "point": point,
                    "tied": tied,
                    "teamId": id,
                    "tournamentId": tournamentId
                },
                url: "/api/v1/update-set-point-table",
                dataType: "json",
                async: false,
                success: function (res) {
                    if (res) {
                        toastr.success(res.message)

                        setTimeout(reload,1000)
                        function reload(){
                            window.location.reload()
                        }
                    }
                },
                error: function (err) {
                    console.log(err)
                    $('#preloader').addClass('d-none')
                }
            });
            } else {
                toastr.error('Sorry You Are Demo Use')
            }
        }

        function createHandler(id,seriesId) {
            // alert(id,seriesId)
            var teamId = id;
            var matchPlayed = $(`#matchPlayed${id}`).val();
            var win = $(`#won${id}`).val();
            var loss = $(`#loss${id}`).val();
            var goal = $(`#goal${id}`).val();
            var point = $(`#point${id}`).val();
            var tied = $(`#tied${id}`).val();
            $('#preloader').removeClass('d-none')
            $.ajax({
                type: "POST",
                data: {
                    "matchPlayed": matchPlayed,
                    "win": win,
                    "loss": loss,
                    "goal": goal,
                    "point": point,
                    "tied": tied,
                    "teamId": id,
                    "seriesId": seriesId,
                },
                url: window.origin+"/api/v1/point-table-create",
                success: function (res) {
                    if (res.status==="success") {
                        toastr.success(res.message)
                        $('#preloader').addClass('d-none')
                        setTimeout(reload,1000)
                        function reload(){
                            window.location.reload()
                        }
                    }
                },
                error: function (err) {
                    console.log(err)
                    $('#preloader').addClass('d-none')
                }
            });

        }

        function teamPointCreate(id,seriesId) {
            var tableHeading = $(`#teamPoint${id} th`).text()
            $('#teamPoint' + id).empty()
            $('#teamPoint' + id).append(`
          <th scope="row">${tableHeading}</th>
          <td><input class="form-control form-control-sm" type="number" id="matchPlayed${id}" value="" /></td>
          <td><input class="form-control form-control-sm" type="number" id="won${id}" value=""/></td>
          <td><input class="form-control form-control-sm" type="number" id="loss${id}" value=""/></td>
          <td><input class="form-control form-control-sm" type="number" id="tied${id}" value=""/></td>
          <td><input class="form-control form-control-sm" type="number" id="point${id}" value=""/></td>
          <td><input class="form-control form-control-sm" type="number" id="goal${id}" value=""/></td>
          <td>
            <button class="btn btn-dark btn-sm" onClick="createHandler(${id},${seriesId})">

              Save
            </button>
          </td>
        `)
        }

    </script>
@endpush


