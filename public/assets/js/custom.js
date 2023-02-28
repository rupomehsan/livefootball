/**
 * Submit Form (AJAX)
 */
function formSubmit(type, btn, form, headers = null) {
    var dmeoUser = JSON.parse(localStorage.getItem('adminData'))
    // alert(dmeoUser.email)
    if (dmeoUser.email !== "demoadmin@livefootball.com") {
    let url = form.attr('action');
    // alert(url);
    let form_data = JSON.stringify(form.serializeJSON());
    formData = JSON.parse(form_data);
    $('#preloader').removeClass('d-none')
    $.ajax({
        type: type, url: url, data: formData, headers: headers, beforeSend: function () {
            $('#' + btn).prop('disabled', true);
        }, success: function (response) {
            if (response.status === 'success') {
                $('#preloader').addClass('d-none')
                toastr.success(response.message);
                if(response.data){
                     if(response.data.role==="user"){
                         localStorage.setItem("userInformation",JSON.stringify(response.data.user))
                     }else if(response.data.role==="admin"){
                         localStorage.setItem("adminInformation",JSON.stringify(response.data.user))
                     }
                }
                // form[0].reset();
                const myTimeout = setTimeout(redirectPage, 1000);
                // setTimeout(returnPage(page), 10000);
            }
        }, error: function (xhr, resp, text) {
            // console.log(xhr)
            // on error, tell the failed
            if (xhr && xhr.responseText) {
                $('#preloader').addClass('d-none')
                let response = JSON.parse(xhr.responseText);
                if (response.status === 'validate_error') {
                    // $('#preloader').addClass('d-none')

                    $.each(response.message, function (index, message) {
                        if (message.field && message.field !== 'global') {
                            $('#' + message.field).addClass('is-invalid');
                            $('#' + message.field + '_label').addClass('text-danger');
                            $('.' + message.field + '_error').html(message.error);
                        } else if (message.error) {
                            // $('#preloader').addClass('d-none')
                            // toastr.error(message.error);
                            console.log("err 0")
                        } else {
                            // toastr.error('Something went wrong', 'Please try again after sometime.');
                            console.log("err 1")
                            $('#preloader').addClass('d-none')
                        }
                    });
                } else {
                    // toastr.error('Something went wrong', 'Please try again after sometime.');
                    console.log("err 2")
                    $('#preloader').addClass('d-none')
                }
            } else {
                $('#preloader').addClass('d-none')
                // toastr.error('Something went wrong', 'Please try again after sometime.');
                console.log("err 3")
            }
        }, complete: function (xhr, status) {
            $('#' + btn).prop('disabled', false);
        }
    });
    } else {
        toastr.error('Sorry You Are Demo Use')
    }


}

function deleteItem(url) {
    let baseUrl = window.origin + url
    // alert(baseUrl)
    var dmeoUser = JSON.parse(localStorage.getItem('adminData'))
    // alert(dmeoUser.email)
    if (dmeoUser.email !== "demoadmin@livefootball.com") {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseUrl,
                type: 'DELETE',
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    Swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                    setInterval(function () {
                        location.reload();
                    }, 1000)

                }, error: function (xhr, resp, text) {
                    console.log(xhr);
                    // on error, tell the failed
                },
            });
        }
    })
    } else {
        toastr.error('Sorry You Are Demo Use')
    }

}

/**
 * GET Single Data for Edit
 */
function getEditData(url) {
    var baseUrl = window.origin + url
    // alert(baseUrl)
    $.ajax({
        type: 'GET', url: baseUrl, success: function (response) {
            if (response.status === 'success') {
                console.log("editdata", response);
                Object.entries(response.data[0]).forEach((item) => {
                    //for all input filed
                    // console.log("itemsssss",item)
                    $('#' + item[0]).val(item[1]);
                    if (item[0] === "image") {

                        $('.file-upload-image-edit').attr('src', item[1])
                        $('.file-upload-image').attr('src', item[1])
                         $(".file-upload-content-edit").removeClass("d-none")
                    }
                    // console.log("data",item)
                    //for admin access input filed
                    if (item[0] === 'access') {
                        console.log("data", item[1])
                        if (item[1] !== '') {
                            let data = JSON.parse(item[1])
                            data.forEach(val => {
                                $(`input[name='access[]'][value='${val}']`).attr('checked', true)
                            })
                        }
                    }
                    //for editor
                    if (item[0] === 'description') {
                        descriptionEditor.setData(item[1])
                    } else if (item[0] === 'privacy_policy') {
                        privacyEditor.setData(item[1])
                    } else if (item[0] === 'terms_policy') {
                        termsEditor.setData(item[1])
                    }
                    //for submit button to update button
                    if (item[0] === 'host' || item[0] === 'api_key') {
                        $('.submit-btn').text('Update')
                        $('.smtpBtn').text('Update')
                        $('.smtp-card-title').text('Add SMTP')
                    }
                    //for user access role id hide show
                    if (item[0] === 'user_role_id') {
                        if (item[1] === 1) {
                            $('#access_control').hide();
                        } else {
                            $('#access_control').show();
                        }
                    }
                    //
                    // if (item[0] === 'app_version' || item[0] === 'app_id') {
                    //     $('#submit-button').text('Update')
                    //     // $('.smtp-card-title').text('Edit SMTP')
                    // }
                    //
                    // if (item[0] === 'description') {
                    //     descriptionEditor.setData(item[1])
                    // } else if (item[0] === 'privacy_policy') {
                    //     privacyEditor.setData(item[1])
                    // } else if (item[0] === 'cookies_policy') {
                    //     cookiesEditor.setData(item[1])
                    // } else if (item[0] === 'terms_policy') {
                    //     termsEditor.setData(item[1])
                    // } else if (item[0] === 'radio_description') {
                    //     radioEditor.setData(item[1])
                    // } else if (item[0] === 'package_description') {
                    //     packageEditor.setData(item[1])
                    // }
                    //

                    //

                    if (item[0] === 'players') {
                        $("#players").empty()
                        item[1].forEach(function (data, index) {

                            $("#players").append(`
                             <div class="row">
                             <div class="col-lg-3 mt-2">
                                    <input type="text" class="form-control" name="players[name][${index}]" placeholder="player ${index} name" value="${data.name}">
                                </div>
                                <div class="col-lg-2 mt-2">
                                    <select class="form-select" name="players[role][${index}]">
                                        <option selected="" value="">Select Player Role</option>
                                        <option ${(data.role === "Defender") ? "selected" : ""} value="Defender" selected>Defender</option>
                                        <option ${(data.role === "Midfielder") ? "selected" : ""} value="Midfielder">Midfielder</option>
                                        <option ${(data.role === "Forward") ? "selected" : ""} value="Forward">Forward</option>
                                        <option ${(data.role === "Goalkeeper") ? "selected" : ""} value="Goalkeeper">Goalkeeper</option>

                                    </select>
                                </div>
                                </div>
                          `)
                        })

                    }


                })


                $(document).ready(function(){
                    getdata()

                function getdata() {
                    var id = $("#group_id").val()
                    $.ajax({
                        url: window.origin + '/api/v1/tournament/get-all-team-by-group-and-tournament-id/' + id,
                        type: 'GET',
                        dataType: "json",
                        success: function (res) {
                            console.log("fffff", res)
                            if (res.status === "success") {
                                $("#first_team_id").empty()
                                $("#first_team_id").append(`
                                       <option  value="" disabled selected>Select Team</option>
                                     `)
                                $("#second_team_id").empty()
                                $("#second_team_id").append(`
                                       <option  value="" disabled selected>Select Team</option>
                                     `)
                                res.data.forEach(function (item) {
                                    console.log("test", item)
                                    $("#first_team_id").append(`
                                       <option ${(response.data[0].first_team_id === item.team_id) ? "selected" : ""}  value="${item.team_id}">${item.team.team_name}</option>
                                     `)
                                    $("#second_team_id").append(`
                                       <option ${(response.data[0].second_team_id === item.team_id) ? "selected" : ""}  value="${item.team_id}">${item.team.team_name}</option>
                                     `)
                                })
                            }
                        },
                        error: function (xhr, resp, text) {
                            console.log(xhr);
                            // on error, tell the failed
                        },
                    });
                }
            })



            }
        }, error: function (xhr, resp, text) {
            console.log(xhr, resp)
        }
    });
}

/**
 * Generate Table Data
 */
function generateTable(id, headers, data, actions = []) {
    let container = document.getElementById(id)
    container.innerHTML = "";
    console.log(headers);
    data.forEach(function (item) {
        let tableRow = document.createElement('tr')

        headers.forEach((header) => {
            Object.keys(item).forEach((key) => {
                if (key === header.field) {
                    let tableData = document.createElement('td')

                    if (key === 'image') {
                        if (item[key] !== null) {
                            let imageUrls = item[key].split('/')
                            let imageUrl = ''
                            imageUrls.forEach((item, i) => {
                                if (i > 0) imageUrl += '/' + item
                            })

                            let imageTag = document.createElement('img')
                            imageTag.setAttribute('src', imageUrl)
                            imageTag.setAttribute('style', "width: 60px; height: 60px;")
                            tableData.appendChild(imageTag)
                        } else {
                            let imageTag = document.createElement('img')
                            imageTag.setAttribute('src', '/assets/img/default.png')
                            imageTag.setAttribute('style', "width: 60px; height: 60px;")
                            tableData.appendChild(imageTag)
                        }
                    } else {
                        tableData.innerHTML = item[key]
                    }

                    tableRow.appendChild(tableData)
                }
            })

            if (header.field === 'action' && actions.length) {
                let tableData = document.createElement('td')

                actions.forEach((actionItem) => {
                    let actionBtn = document.createElement('button')
                    actionBtn.textContent = actionItem.label

                    if (actionItem.label.toLowerCase() === 'edit') {
                        actionBtn.setAttribute('class', 'btn btn-outline-secondary me-1')

                        actionBtn.addEventListener('click', function () {
                            window.location.href = actionItem.url.replace(':id', item.id)
                            // console.log(item.id)
                            // actionItem.url.replace(':id', item.id)
                            // getEditData(actionItem.url.replace(':id', item.id))
                        })
                    } else if (actionItem.label.toLowerCase() === 'delete') {
                        actionBtn.setAttribute('class', 'btn btn-outline-secondary')

                        actionBtn.addEventListener('click', function () {
                            deleteItem(actionItem.url.replace(':id', item.id))
                            // console.log(item.id)
                        })
                    }

                    tableData.appendChild(actionBtn)
                })

                tableRow.appendChild(tableData)
            }
        })

        container.appendChild(tableRow)
    })
}

/**
 * GET Table Data
 */
function getTableData(url, id, headers, actions = []) {
    $.ajax({
        type: 'GET', url: url, success: function (response) {
            if (response.status === 'success') {
                let data = response.data

                generateTable(id, headers, data, actions)
            }
        }, error: function (xhr, resp, text) {
            console.log(xhr, resp)
        }
    });
}

/**
 * Approval   Data
 */

function approvalData(url, id, properties) {
    var dmeoUser = JSON.parse(localStorage.getItem('userData'))
    if (dmeoUser.email !== "demoadmin@motivation.com") {
        $("#preloader").removeClass('d-none');
        $.ajax({
            url: url, type: "POST", dataType: "json", headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, data: {
                id: id, status: properties,
            }, success: function (res) {
                console.log(res)
                if (res) {
                    toastr.success(res.message);
                    $("#preloader").addClass('d-none');
                }
            }, error: function (jqXhr, ajaxOptions, thrownError) {
                if (jqXhr.status == 422 && jqXhr.responseJSON.status == "error") {
                    toastr.error(jqXhr.responseJSON.message)
                    $("#preloader").addClass('d-none');
                }
            }
        }); //ajax
    } else {
        toastr.error('Sorry You Are Demo Use')
    }
}

function fetchData(res) {
    res.data.forEach(function (item) {
        $('#fetchCategory').append(`
                               <div class="col-lg-4 col-12">
                                    <div class="card">
                                        <img src="${item.image}" class="card-img-top rounded-3 border"
                                             alt="">
                                              <input class="form-check-input select-input chkSelect" type="checkbox" name="chkSelect[]"  value="${item.id}">
                                             <div class="row mt-3">
                                                   <div class="col-md-6">
                                                     <p class="catName ml-3">${item.name}</p>
                                                     <p class="catName ml-3">${item.quotes_count} Quotes</p>
                                                     </div>
                                                  <div class="col-md-6">   <div class="switch">
                                            <label class="">
                                                <input class="form-check-input" data-id="${item.id}" name="category_status" type="checkbox"
                                                       id="approval" ${item.status === "active" ? 'checked' : ''}>
                                                <div class="slider round"></div>
                                            </label>
                                        </div></div>
                                          </div>

                                                                    <div class="content-actions m-2">

                                                <a href="/admin/category/edit/${item.id}" class="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ant-design" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024" data-icon="ant-design:edit-filled"><path fill="currentColor" d="M880 836H144c-17.7 0-32 14.3-32 32v36c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-36c0-17.7-14.3-32-32-32zm-622.3-84c2 0 4-.2 6-.5L431.9 722c2-.4 3.9-1.3 5.3-2.8l423.9-423.9a9.96 9.96 0 0 0 0-14.1L694.9 114.9c-1.9-1.9-4.4-2.9-7.1-2.9s-5.2 1-7.1 2.9L256.8 538.8c-1.5 1.5-2.4 3.3-2.8 5.3l-29.5 168.2a33.5 33.5 0 0 0 9.4 29.8c6.6 6.4 14.9 9.9 23.8 9.9z"></path></svg>
                                                    Edit
                                                </a>

                                                <button type="submit" title="" id="" onclick="deleteItem('/api/v1/category/delete/${item.id}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ant-design" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024" data-icon="ant-design:delete-filled"><path fill="currentColor" d="M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zm-200 0H360v-72h304v72z"></path></svg>
                                                    Delete
                                                </button>

                                        </div>
                                        </div>
                                        </div>

                                </div>
                        `)
    })
}


function editCategory(url) {


    $.ajax({
        url: url, method: 'GET', dataType: 'JSON', success: function (res) {
            if (res.status === "success") {
                $('#categoryEdit').empty()
                $('#categoryEdit').append(`

                `)
            }
        }, error: function (err) {
            console.log(err)
        },

    })
}





function clearError(input) {
    $('#' + input.id).removeClass('is-invalid');
    $('#' + input.id + '_label').removeClass('text-danger');
    $('#' + input.id + '_icon').removeClass('text-danger');
    $('#' + input.id + '_icon_border').removeClass('field-error');
    $('#' + input.id + '_error').html('');
}

// get category
function getCategory(url, id) {
    let baseUrl = window.origin + url
    // alert(baseUrl)
    $.ajax({
        type: 'GET',
        url: baseUrl,
        dataType: 'json',
        success: function (res) {
            console.log(res)
            if (res.status === 'success') {
                res.data.forEach((item) => {
                    $('#' + id).append(`
                            <option value="${item.id}">${item.name}</option>
                    `)
                })
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}

//team ********
function getAllTeams(url, id) {
    let baseUrl = window.origin + url
    // alert(baseUrl)
    $.ajax({
        type: 'GET',
        url: baseUrl,
        dataType: 'json',
        success: function (res) {
            // console.log(res)
            if (res.status === 'success') {
                if (res.data.length !== 0) {
                    res.data.forEach((item) => {
                        $('#' + id).append(`
                           <div class="col-lg-3 col-md-6 mt-3">
                    <div class="row" class="teamdotted">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-10 teamdotted">
                            <a href="${window.origin}/admin/team/edit/${item.id}">
                                <div class="series_name_box">
                                    <img
                                        src="${item.image}"
                                        height="60" width="60" class="img-fluid " alt="">
                                    <span>${item.team_name}</span>
                                </div>
                            </a>
                             <div class="dots-menu btn-group">
                          <a data-toggle="dropdown" class=""><span class="iconify" data-icon="charm:menu-kebab" data-width="30"></span></a>
                          <!-- <span class="glyphicon glyphicon-option-vertical"> </span>-->
                          <ul class="dropdown-menu">
                            <li><a href="${window.origin}/admin/team/edit/${item.id}"><i class="fa fa-pencil"></i> <span class="iconify" data-icon="bx:edit"></span> Edit</a></li>
                            <li class="delete-row">
                              <a href="javascript:void(0)" onclick="deleteSingleItem('/api/v1/team/delete/${item.id}')"><i class="fa fa-trash-o"></i> <span class="iconify" data-icon="ant-design:delete-filled"></span> Delete</a>
                            </li>
                          </ul>
                        </div>
                        </div>
                    </div>
                </div>
                    `)
                    })
                } else {
                    $("#" + id).append(`
                    <div  class="alert alert-danger col-6">Team Not Create Yet....<div>
                    `)
                }

             if(id==="homepage_team"){
                    res.data.forEach((item) => {
                        $("#homepage_team").append(`
                            <div class="slide"><img src="${item.image}"></div>
                      `)
                    })
                }

            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}


function deleteSingleItem(url) {
    // alert(id)
    $.ajax({
        type: 'delete',
        url: window.origin + url,
        dataType: 'json',
        success: function (res) {
            console.log(res)
            if (res.status === 'success') {
                toastr.success(res.message)
                setTimeout(redirect, 1000)

                function redirect() {
                    window.location.reload()

                }
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}

function getAllTournaments(url, id) {
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        success: function (res) {
            // console.log("tr", res)
            if (res.status === 'success') {
                console.log("asdfasdfasdf", res)
                if (res.data.length !== 0) {
                    if (id === "pointTableTournament") {

                            res.data.forEach(function (item) {

                            $("#" + id).append(`
                         <li><a class="dropdown-item" onclick="getPointTableByTournamentId('${item.id}')"  href="javascript:void(0)">${item.name}</a></li>
                        `)
                        })
                    } else {
                        res.data.forEach((item) => {

                            $('#' + id).append(`
                           <div class="col-lg-3 col-md-6 mt-3">
                                <div class="row" class="teamdotted">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 teamdotted">
                                        <a href="${window.origin}/admin/tournament/group/${item.id}">
                                            <div class="series_name_box">
                                                <img
                                                    src="${item.image}"
                                                    height="60" width="60" class="img-fluid " alt="">
                                                <span>${item.name}</span>
                                            </div>
                                        </a>
                                         <div class="dots-menu btn-group">
                                      <a data-toggle="dropdown" class=""><span class="iconify" data-icon="charm:menu-kebab" data-width="30"></a>
                                      <!-- <span class="glyphicon glyphicon-option-vertical"> </span>-->
                                      <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)" onclick="getData('/api/v1/tournament/edit/${item.id}')" data-toggle="modal" data-target="#ModalLoginForm"><span class="iconify" data-icon="bx:edit"></span> Edit</a></li>
                                        <li class="delete-row">
                                          <a href="javascript:void(0)" onclick="deleteSingleItem('/api/v1/tournament/delete/${item.id}')"><span class="iconify" data-icon="ant-design:delete-filled"></span> Delete</a>
                                        </li>
                                      </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                `)
                        })
                    }
                } else {
                    // alert("hi")
                    $("#" + id).append(`
                    <div class="alert alert-danger col-12">Tournament Not Create Yet...<div>
                    `)
                }

                res.setPointTable.forEach(function (item) {
                    // $("#pointTable").empty()
                    console.log("tournamt",item)
                       $(".tournamentName").text(item.tournament.name)
                    $("#pointTable").append(`
                       <thead>
                            <tr class="mtb">
                                <th scope="col" class="text-danger">
                                    <div class="d-flex align-items-center">
                                        <div class="dash"></div>
                                        <h6 class="text-danger mb-0">${item.group_name}</h6>
                                    </div>
                                </th>
                                <th scope="col">Match</th>
                                <th scope="col">Won</th>
                                <th scope="col">Lost</th>
                                <th scope="col">Drow</th>
                                <th scope="col">Point</th>
                                <th scope="col" title="Net Run Rate">Goal </th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="groupTeam${item.id}">

                            </tbody>
                   `)


                    item.group_team.forEach(function (item2) {

                        $.ajax({
                            url: window.origin + "/api/v1/get-point-table-data-by-tournament-team-id",
                            method: "get",
                            dataType: "json",
                            data: {
                                "teamId": item2.team_id,
                                "tournamentId": item2.tournament_id,
                            },
                            success: function (res) {
                                if (res.data !== null) {
                                    $("#groupTeam" + item.id).append(`
                                         <tr id="teamPoint${item2.team_id}">
                                                    <th scope="row">${item2.team.team_name}</th>
                                                    <td id="match${item2.team_id}">${res.data.match_play}</td>
                                                    <td id="win${item2.team_id}">${res.data.win}</td>
                                                    <td id="loss${item2.team_id}">${res.data.loss}</td>
                                                    <td id="tied${item2.team_id}">${res.data.tied}</td>
                                                    <td id="point${item2.team_id}">${res.data.point}</td>
                                                    <td id="goal${item2.team_id}">${res.data.goal}</td>
                                                    <td>
                                                        <button class="btn btn-dark btn-sm" onclick="teamPointEdit('${item2.team_id}','${item2.tournament_id}')">
                                                            <span class="iconify" data-icon="ant-design:edit-filled" data-width="20"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                        `)
                                } else {
                                    $("#groupTeam" + item.id).append(`
                                      <tr id="teamPoint${item2.team_id}">
                                        <th scope="row">${item2.team.team_name}</th>
                                    <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                       <td>
                                        <button class="btn btn-dark btn-sm" onclick="teamPointCreate('${item2.team_id}','${item2.tournament_id}')">
                                           <span class="iconify" data-icon="ant-design:edit-filled" data-width="20"></span>
                                        </button>
                                      </td>
                                       </tr>
                                    `)
                                }
                            },
                            error: function (err) {
                                console.log(err)
                            }
                        })
                    })
                })
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}





function getData(url) {
    $.ajax({
        type: 'get',
        url: window.origin + url,
        dataType: 'json',
        success: function (res) {
            // console.log("tournamentttttt",res)
            if (res.status === 'success') {
                $("#name").val(res.data.name)
                $("#imageUrl").val(res.data.image)
                $("#tournamentId").val(res.data.id)
                $("#tounamentImage").empty()
                $("#tounamentImage").append(`
                    <button type="button" class="removeImage"  style="border: none;background: red;color:white">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="akar-icons:cross"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M20 20L4 4m16 0L4 20"></path></svg>
                                        </button>
                             <img
                                        src="${res.data.image}" class="img-fluid my-2" alt="">
                `)

                $(".image-upload-wrap").addClass("d-none")
                $("#submit-button").text("Update")
                $(".removeImage").click(function () {
                    $(".image-upload-wrap").removeClass("d-none")
                    $("#tounamentImage").empty()
                })
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}

function resetForm() {
    $("#name").val("")
    $("#tounamentImage").empty()
}

function getAllTeamByTournamentAndGroupId(url, id) {
    // alert(url)
    $.ajax({
        type: 'get',
        url: window.origin + url,
        dataType: 'json',
        success: function (res) {
            // console.log("mydaasdfasdfata", res)

            if (res.status === 'success') {
              $(".pagetitle").text(res.tournament.name)
                if(res.data.length!==0){
                    $(".pagetitle").text(res.data[0].tournament.name)

                res.data.forEach(function (item) {

                    $('#' + id).append(`
                  <div>
                  <div class="d-flex">
                        <h5 class="my-3 mx-3">${item.group_name}</h5>
                       <a href="${window.origin}/admin/group/team/update/${item.id}" type="btn " class="btn btn-primary btn-sm">Add Team</a>

                    </div>
                      <div class="row" id="gorupTeam${item.id}">
                        </div>
                     </div>
                `)

                    item.group_team.forEach(function (item2) {
                        // console.log("testtt",item2)
                        $("#gorupTeam" + item.id).append(`
                      <div class="col-lg-3 col-md-6 mt-3">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-10 teamdotted">

                                <div class="series_name_box">
                                    <img src="${item2.team.image}" height="60" width="60" class="img-fluid " alt="">
                                    <span>${item2.team.team_name}</span>
                                </div>

                             <div class="dots-menu btn-group">
                          <a data-toggle="dropdown" class=""><span class="iconify" data-icon="charm:menu-kebab" data-width="30"></a>
                          <!-- <span class="glyphicon glyphicon-option-vertical"> </span>-->
                          <ul class="dropdown-menu">
<!--                            <li><a href="javascript:void(0)" onclick="getData('/api/v1/tournament/edit/1')" data-toggle="modal" data-target="#ModalLoginForm"><i class="fa fa-pencil"></i> Edit</a></li>-->
<!--                          -->
                            <li class="delete-row">
                              <a href="javascript:void(0)" onclick="deleteSingleItem('/api/v1/tournament/group/team/delete/${item2.id}')"><span class="iconify" data-icon="ant-design:delete-filled"></span> Delete</a>
                            </li>
                          </ul>
                        </div>
                        </div>
                    </div>
                </div>
                    `)
                    })

                })
                }else{
                    $("#gorupTeam").append(`
                     <div class="alert alert-danger">No gorup create yet...</div>
                 `)
                }

            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}

function getPointTableByTournamentId(id) {
    // alert(id)
    $.ajax({
        type: 'get',
        url: "/api/v1/get-point-table-tournament-id/"+id,
        dataType: 'json',
        success: function (res) {
            console.log("tr", res)

            if (res.status === 'success') {
                if(res.setPointTable.length!==0){

                    $("#pointTable").empty()
                res.setPointTable.forEach(function (item) {
                      $(".tournamentName").text(item.tournament.name)
                    $("#pointTable").append(`
                       <thead>
                            <tr class="mtb">
                                <th scope="col" class="text-danger">
                                    <div class="d-flex align-items-center">
                                        <div class="dash"></div>
                                        <h6 class="text-danger mb-0">${item.group_name}</h6>
                                    </div>
                                </th>
                                <th scope="col">Match</th>
                                <th scope="col">Won</th>
                                <th scope="col">Lost</th>
                                <th scope="col">Drow</th>
                                <th scope="col">Point</th>
                                <th scope="col" title="Net Run Rate">Goal</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="groupTeam${item.id}">

                            </tbody>
                   `)


                    item.group_team.forEach(function (item2) {

                        $.ajax({
                            url: window.origin + "/api/v1/get-point-table-data-by-tournament-team-id",
                            method: "get",
                            dataType: "json",
                            data: {
                                "teamId": item2.team_id,
                                "tournamentId": item2.tournament_id,
                            },
                            success: function (res) {
                                if (res.data !== null) {
                                    $("#groupTeam" + item.id).append(`
                                         <tr id="teamPoint${item2.team_id}">
                                                    <th scope="row">${item2.team.team_name}</th>
                                                    <td id="match${item2.team_id}">${res.data.match_play}</td>
                                                    <td id="win${item2.team_id}">${(res.data.win!==null)?res.data.win:"00"}</td>
                                                    <td id="loss${item2.team_id}">${res.data.loss}</td>
                                                    <td id="tied${item2.team_id}">${res.data.tied}</td>
                                                    <td id="point${item2.team_id}">${res.data.point}</td>
                                                    <td id="goal${item2.team_id}">${res.data.goal}</td>
                                                    <td>
                                                        <button class="btn btn-dark btn-sm" onclick="teamPointEdit('${item2.team_id}','${item2.tournament_id}')">
                                                            <span class="iconify" data-icon="ant-design:edit-filled" data-width="20"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                        `)
                                } else {
                                    $("#groupTeam" + item.id).append(`
                                      <tr id="teamPoint${item2.team_id}">
                                        <th scope="row">${item2.team.team_name}</th>
                                    <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                      <td>00</td>
                                       <td>
                                        <button class="btn btn-dark btn-sm" onclick="teamPointCreate('${item2.team_id}','${item2.tournament_id}')">
                                           <span class="iconify" data-icon="ant-design:edit-filled" data-width="20"></span>
                                        </button>
                                      </td>
                                       </tr>
                                    `)
                                }
                            },
                            error: function (err) {
                                console.log(err)
                            }
                        })
                    })
                })
                }else{
                    $("#pointTable").empty()
                    $("#pointTable").append(`
                     <div class="alert alert-danger col-6">Please Create Group And Team First.....</div>
                     `)
                }
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
}



function teamPointEdit(id, tournamentId) {
    // alert(id)
    var tableHeading = $(`#teamPoint${id} th`).text()
    var match = $(`#match${id}`).text()
    var win = $(`#win${id}`).text()
    var loss = $(`#loss${id}`).text()
    var tied = $(`#tied${id}`).text()
    var goal = $(`#goal${id}`).text()

    var point = $(`#point${id}`).text()
    $('#teamPoint' + id).empty()
    $('#teamPoint' + id).append(`
          <th  scope="row">${tableHeading}</th>
          <td><input class="form-control form-control-sm" type="number" id="matchPlayed${id}" value="${match}" /></td>
          <td><input class="form-control form-control-sm" type="number" id="won${id}" value="${win}"/></td>
          <td><input class="form-control form-control-sm" type="number" id="loss${id}" value="${loss}"/></td>
          <td><input class="form-control form-control-sm" type="number" id="tied${id}" value="${tied}"/></td>
          <td><input class="form-control form-control-sm" type="number" id="point${id}" value="${point}"/></td>
          <td><input class="form-control form-control-sm" type="number" id="goal${id}" value="${goal}"/></td>
          <td>
            <button class="btn btn-dark btn-sm" onClick="updateHandler('${id}','${tournamentId}')">
              <i class="fas fa-check">update</i>
            </button>
          </td>
        `)
}
