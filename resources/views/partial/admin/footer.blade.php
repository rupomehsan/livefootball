<!-- cdn JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('assets/vendor/ckeditor5-build-classic/ckeditor.js')}}"></script>
{{--<script src="{{asset('assets/vendor/MDB5-STANDARD-UI-KIT-Free-3.10.2/js/mdb.min.js')}}"></script>--}}
<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- one signal Files-->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
    $.ajax({
        type: 'GET',
        url: window.origin+"/api/v1/manage-notification/show",
        dataType: 'json',
        success: function (res) {
            if (res.status === 'success') {
                window.OneSignal = window.OneSignal || [];
                OneSignal.push(function() {
                    OneSignal.init({
                        appId: res.data[0].app_id,
                        safari_web_id: "web.onesignal.auto.13f7d09c-87f4-478e-9a86-b96c3b883b5b",
                        notifyButton: {
                            enable: true,
                        },
                        allowLocalhostAsSecureOrigin: true,
                    });
                });
            }
        },
        error: function (err) {
            console.log(err);
        }
    })

</script>
<!-- CDN JS Files-->
<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
<!--<script src="assets/vendor/iconify.min.js_3.2.0/iconify.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/3.2.1/jquery.serializejson.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{--dropdown search--}}
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<!-- Template Main JS File -->
{{--<script src="{{asset('assets/js/toastr.js')}}"></script>--}}
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    $(document).ready(function () {
        let token = localStorage.getItem('token') || null
        // console.log(token);
        if (!token) {
            window.location.href = window.origin+"/login";
        }
        let userData = JSON.parse(localStorage.getItem('adminData'))
        $.ajax({
            type: 'GET',
            url: window.origin+"/api/v1/admin/fetch-me/"+userData.id,
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {

                    $('#userName').text(res.data.name)
                    $('#userImage').attr('src',res.data.image)
                }
            },
            error: function (err) {
                console.log(err);
            }
        })

        $.ajax({
            type: "GET",
            url: window.origin+"/api/v1/setting/get",
            dataType: "json",
            // async: false,
            success: function (res) {
                if (res.status === "success") {
                    $('#siteTitle').text(res.data.system_name)
                    $('#favicon').attr("href",res.data.image)
                }
                console.log("settings", res)
            },
            error: function (err) {
                console.log(err)
            }
        });



    })
    $('#signOut').click(function () {
        localStorage.removeItem('token')
        localStorage.removeItem('adminData')
        window.location.href = window.origin+"/login";
    })
</script>
<script type="text/javascript">
    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(50).fadeOut(100); // will fade out the white DIV that covers the website.
        $('body').delay(50).css({'overflow':'visible'});
    })
</script>
@stack('custom-js')
</body>
</html>
